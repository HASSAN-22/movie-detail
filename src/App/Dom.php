<?php

namespace Movie\App;

class Dom
{
    private $originDom;

    public function __construct(string $url){
        $dom = new \PHPHtmlParser\Dom();
        $this->originDom = $dom->loadFromUrl('https://www.imdb.com/title/'.$url);
    }

    /**
     * find data from multiple element
     * @param string $pattern
     * @param string $nth
     * @param string $tag
     * @param string $subPattern
     * @return array
     * @throws \PHPHtmlParser\Exceptions\ChildNotFoundException
     * @throws \PHPHtmlParser\Exceptions\NotLoadedException
     */
    public function findMulti(string $pattern,string $nth = '', string $tag = '', string $subPattern=''){
        $elements = $nth != '' ? $this->originDom->find($pattern,$nth) : $this->originDom->find($pattern);
        $result = [];
        $elements = $subPattern !== '' ? $elements->find($subPattern) : ($elements ?? []);
        foreach ($elements as $element){
            $result [] = $this->getElementData($element,$tag);
        }
        return $result;
    }

    /**
     * Find data from single element
     * @param string $pattern
     * @param int $nth
     * @param string $tag
     * @return array|mixed|string|string[]|null
     * @throws \PHPHtmlParser\Exceptions\ChildNotFoundException
     * @throws \PHPHtmlParser\Exceptions\NotLoadedException
     */
    public function find(string $pattern,int $nth = 0, string $tag = ''){
        $element = $this->originDom->find($pattern,$nth);
        return $this->getElementData($element,$tag);
    }

    /**
     * @param $element
     * @param $tag
     * @return array|mixed|string|string[]|void|null
     */
    private function getElementData($element,$tag){
        if($tag == 'img'){
            return $this->fixImageQuality($element);
        }elseif($tag == 'href'){
            if($this->hasALink($element)){
                return 'https://www.imdb.com/'.$element->getAttribute('href');
            }
        }else{
            return !is_null($element) ? $element->firstChild()->text() : null;
        }
    }

    /**
     * @param $element
     * @return array|string|string[]|null
     */
    private function fixImageQuality($element)
    {
        return preg_replace('/\._.*./i', '._V1_Ratio0.6762_AL_.jpg', $element->getAttribute('srcset'));
    }

    /**
     * Check the element to see if it has the link feature
     * @param $element
     * @return bool
     */
    private function hasALink($element): bool
    {
        return !is_null($element) and !is_null($element->getAttribute('href'));
    }
}
