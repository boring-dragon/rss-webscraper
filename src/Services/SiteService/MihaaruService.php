<?php
namespace RssScraper\Services\SiteService;

use RssScraper\Interfaces\IService;

class MihaaruService implements IService
{
    /**
     * dispatch
     *
     * @param  mixed $articles
     *
     * @return array
     */
    public static function dispatch(array $articles = [])
    {
        $articlesitems = array();

        $emihaaru = new \RssScraper\Extractors\EMihaaru;

        foreach ($articles as $article) {
            $link = $article["link"];
            $date = $article["pubDate"];
            $guid = $article["guid"];
            $articlesitems[] = $emihaaru->extract($link, $date, $guid);
        }

        return $articlesitems;
    }
}