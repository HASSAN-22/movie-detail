<?php


namespace Movie\App;

class Movie
{
    private $dom;
    private $detail;

    /**
     * Get web site html elements
     * @param string $url
     * @return $this
     */
    public function url(string $url){
        $this->dom = new Dom($url);
        return $this;
    }

    /**
     * @return $this
     */
    public function title(){
       $this->detail['title'] = $this->dom->find('h1[data-testid=hero-title-block__title]');
        return $this;
    }

    /**
     * @return $this
     */
    public function rating(){
        $this->detail['rating'] = [
            'contentRating'=>$this->dom->find('ul[data-testid=hero-title-block__metadata] > li', $this->isSeries() ? 2 : 1,'a'),
            'rating'=>$this->dom->find('span[class=sc-7ab21ed2-1 eUYAaq]'),
            'votes'=>$this->dom->find('div[class=sc-7ab21ed2-3 iDwwZL]'),
        ];
        return $this;
    }

    /**
     * @return $this
     */
    public function type(){
        $this->detail['type'] = $this->dom->find('ul[data-testid=hero-title-block__metadata]') != '' ? 'series' : 'movie';
        return $this;
    }

    /**
     * @return $this
     */
    public function year(){
        $this->detail['year'] = $this->dom->find('ul[data-testid=hero-title-block__metadata] > li > span');
        return $this;
    }

    /**
     * @return $this
     */
    public function time(){
        $this->detail['time'] = $this->dom->find('li[data-testid="title-techspec_runtime"] > div',0);
        return $this;
    }

    /**
     * @return $this
     */
    public function creatorOrdirector(){
        $this->detail['creator_or_director'] = $this->dom->findMulti('div[data-testid=title-pc-wide-screen] > ul > li',0,'','div > ul > li');
        return $this;
    }

    /**
     * @return $this
     */
    public function star(){
        $this->detail['stars'] = $this->dom->findMulti('div[data-testid=title-pc-wide-screen] > ul > li',$this->isSeries() ? 1 : 2,'','div > ul > li');
        return $this;
    }

    /**
     * @return $this
     */
    public function award(){
        $this->detail['awards'] = $this->dom->findMulti('li[data-testid=award_information] > div > ul > li');
        return $this;
    }

    /**
     * @return $this
     */
    public function genre(){
        $this->detail['genres'] = $this->dom->findMulti('div[data-testid=genres] a');
        return $this;
    }

    /**
     * @return $this
     */
    public function season(){
        $this->detail['seasons'] = $this->dom->find('label[for=browse-episodes-season]');
        return $this;
    }

    /**
     * @return $this
     */
    public function description(){
        $this->detail['description'] = $this->dom->find('span[class=sc-16ede01-2 qqCya]');
        return $this;
    }

    /**
     * @return $this
     */
    public function releaseDate(){
        $this->detail['releaseDate'] = $this->dom->findMulti('li[data-testid=title-details-releasedate] > div > ul > li');
        return $this;
    }

    /**
     * @return $this
     */
    public function country(){
        $this->detail['country'] = $this->dom->findMulti('li[data-testid=title-details-origin] > div > ul > li');
        return $this;
    }

    /**
     * @return $this
     */
    public function language(){
        $this->detail['language'] = $this->dom->findMulti('li[data-testid=title-details-languages] > div > ul > li');
        return $this;
    }

    /**
     * Get trailer with trailer poster
     * @return $this
     */
    public function trailer(){
        $this->detail['trailer'] =  [
          'links'=>$this->dom->findMulti('div[data-testid=feature-video-shoveler] > div > a','','href'),
          'posters'=>$this->dom->findMulti('div[data-testid=feature-video-shoveler] > div > div > img','','img'),
        ];
        return $this;
    }

    /**
     * @return $this
     */
    public function poster(){
        $this->detail['poster'] =  $this->dom->find('div[class=ipc-media ipc-media--poster-27x40 ipc-image-media-ratio--poster-27x40 ipc-media--baseAlt ipc-media--poster-l ipc-poster__poster-image ipc-media__img] > img', 0, 'img');;
        return $this;
    }

    /**
     * Get all detail of movie
     * @return mixed
     */
    public function all(){
        $this->title()->rating()->type()->year()->time()->creatorOrdirector()
            ->star()->award()->season()->description()->genre()->releaseDate()->country()->language()->trailer()->poster();
        return json_encode($this->detail,true);
    }

    /**
     * Magic methods are special methods which override PHP's default's action when certain actions are performed on an object
     * @return false|string
     */
    public function __toString()
    {
        return json_encode($this->detail,true);
    }

    /**
     * check the movie type
     * @return bool
     */
    private function isSeries(): bool
    {
        $this->type();
        return $this->detail['type'] == 'series';
    }
}
