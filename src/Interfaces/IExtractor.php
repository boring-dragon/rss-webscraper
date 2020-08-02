<?php

namespace RssScraper\Interfaces;

use DateTime;

interface IExtractor
{


    /**
     * extract
     *
     * @param  mixed $url
     * @param  mixed $date
     * @param  mixed $guid
     *
     * @return array
     */
    public function extract(string $url, DateTime $date = null, int $guid = null);
}
