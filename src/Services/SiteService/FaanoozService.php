<?php

namespace Jinas\RssScraper\Services\SiteService;

use Jinas\RssScraper\Interfaces\IService;

class FaanoozService implements IService
{
    public static function dispatch($articles = [])
    {
        $articlesitems = [];

        $emihaaru = new \Jinas\RssScraper\Extractors\EFaanooz();

        foreach ($articles as $article) {
            $link = $article['link'];
            $date = $article['pubDate'];
            $articlesitems[] = $emihaaru->extract($link, $date);
        }

        return $articlesitems;
    }
}
