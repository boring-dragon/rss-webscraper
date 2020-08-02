<?php

namespace Jinas\RssScraper\Http;

use Jinas\RssScraper\Interfaces\IScraper;
use Zttp\Zttp;

class Scraper implements IScraper
{
    public function get($url): array
    {
        $response = Zttp::get($url);

        if (!$response->isOk()) {
            throw new \Exception('Error getting the rss feed');
        }

        $xmlfile = $response->body();
        $ob = simplexml_load_string($xmlfile);
        $json = json_encode($ob);
        $Data = json_decode($json, true);

        return $Data;
    }
}
