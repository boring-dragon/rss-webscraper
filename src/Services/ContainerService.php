<?php

namespace RssScraper\Services;

use RssScraper\Container;

use RssScraper\Models\Data;
use RssScraper\Models\Extract;

class ContainerService
{
    /**
     * @method load()
     *
     * Load all the dependecies to the container
     * 
     * @return void
     */
    public static function load() : void
    {

        Container::bind('Data', Data::class);
        Container::bind('Extract', Extract::class);
    }
}
