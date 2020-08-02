<?php

namespace Jinas\RssScraper\Services\SiteService;

use Jinas\RssScraper\Interfaces\IService;

class ThiladhunService implements IService
{
    public static function dispatch($articles = [])
    {
        $articlesitems = array();

        $emihaaru = new \Jinas\RssScraper\Extractors\EThiladhun;

        foreach ($articles as $article) {
            $link = $article["link"];
            $date = $article["pubDate"];
            $articlesitems[] = $emihaaru->extract($link, $date);
        }

        return  $articlesitems;
    }
}
