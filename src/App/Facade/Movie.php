<?php

namespace Movie\App\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static Movie url(string $url)
 * @method static Movie title()
 * @method static Movie rating()
 * @method static Movie type()
 * @method static Movie year()
 * @method static Movie time()
 * @method static Movie creatorOrdirector()
 * @method static Movie star()
 * @method static Movie award()
 * @method static Movie genre()
 * @method static Movie season()
 * @method static Movie description()
 * @method static Movie releaseDate()
 * @method static Movie country()
 * @method static Movie language()
 * @method static Movie trailer()
 * @method static Movie poster()
 * @method static mixed all()
 *
 * @see \Illuminate\Validation\Factory
 */
class Movie extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Movie\\App\\Movie';
    }
}
