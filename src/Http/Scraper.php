<?php

namespace RssScraper\Http;

use RssScraper\Interfaces\IScraper;

class Scraper implements IScraper
{
    public function get($url)
    {
        $xmlfile = file_get_contents($url);
        $ob = simplexml_load_string($xmlfile);
        $json = json_encode($ob);
        $Data = json_decode($json, true);

        return $Data;
    }
}
