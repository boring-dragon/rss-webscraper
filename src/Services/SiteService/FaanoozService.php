<?php

namespace RssScraper\Services\SiteService;

use RssScraper\Interfaces\IService;

class FaanoozService implements IService
{
    public static function dispatch($articles = [])
    {
        $articlesitems = array();

        $emihaaru = new \RssScraper\Extractors\EFaanooz;

        foreach ($articles as $article) {
            $link = $article["link"];
            $date = $article["pubDate"];
            $articlesitems[] = $emihaaru->extract($link, $date);
        }

        return $articlesitems;
    }
}
