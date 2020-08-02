<?php

namespace Jinas\RssScraper\Services\SiteService;

use Jinas\RssScraper\Interfaces\IService;

class CnmService implements IService
{
    public static function dispatch($articles = [])
    {
        $articlesitems = [];

        $ecnm = new \Jinas\RssScraper\Extractors\ECnm();

        foreach ($articles as $article) {
            $link = str_replace('http://vfp.mv', 'https://cnm.mv', $article['link']);
            $date = $article['pubDate'];
            $articlesitems[] = $ecnm->extract($link, $date);
        }

        return $articlesitems;
    }
}
