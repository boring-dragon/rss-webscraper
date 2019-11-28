<?php

namespace RssScraper\Services;

use RssScraper\Utils\Util;
use RssScraper\Http\Scraper;
use RssScraper\Interfaces\IRssService;

class RssService extends Util implements IRssService
{
    public static $items = array();

    protected $scraper;

    public function __construct()
    {
        self::load('config');

        $scraper = new Scraper();
        $this->scraper = $scraper;
    }

    /**
     * mihaaru
     *
     * @return void
     */
    public function mihaaru()
    {

        $rss = $this->scraper->get(self::$items['mihaaru']);

        /* $title = $rss["channel"]["title"];
        $link = $rss["channel"]["link"];
        $version = $rss["@attributes"]["version"]; */
        $article_number = count($rss["channel"]["item"]);
        $articles = $rss["channel"]["item"];

        /* foreach ($articles as $article) {
            $link = $article["link"] . "\n";

            EMihaaru::extract($link);
        } */

        $article = $articles[0];

        $link = $article["link"];
        $date = $article["pubDate"];
        $guid = $article["guid"];

        $emihaaru = new \RssScraper\Extractors\EMihaaru;
        return $emihaaru->extract($link, $date, $guid);
    }

    /**
     * cnm
     *
     * @return void
     */
    public function cnm()
    {
        $rss = $this->scraper->get(self::$items['cnm']);

        $articles = $rss["channel"]["item"];

        $article = $articles[0];

        $link = $article["link"];
        $date = $article["pubDate"];

        $ecnm = new \RssScraper\Extractors\ECnm;
        return $ecnm->extract($link,$date);
    }

    /**
     * thiladhun
     *
     * @return void
     */
    public function thiladhun()
    {
        return $this->scraper->get(self::$items['thiladhun']);
    }

    /**
     * faanooz
     *
     * @return void
     */
    public function faanooz()
    {
        return $this->scraper->get(self::$items['faanooz']);
    }

    /**
     * addulive
     *
     * @return void
     */
    public function addulive()
    {
        return $this->scraper->get(self::$items['addulive']);
    }

    /**
     * vaguthu
     *
     * @return void
     */
    public function vaguthu()
    {
        return $this->scraper->get(self::$items['vaguthu']);
    }

    /**
     * psm
     *
     * @return void
     */
    public function psm()
    {
        return $this->scraper->get(self::$items['psm']);
    }

    /**
     * vnews
     *
     * @return void
     */
    public function vnews()
    {
        return $this->scraper->get(self::$items['vnews']);
    }

    /**
     * dhuvas
     *
     * @return void
     */
    public function dhuvas()
    {
        return $this->scraper->get(self::$items['dhuvas']);
    }

    /**
     * feshun
     *
     * @return void
     */
    public function feshun()
    {
        return $this->scraper->get(self::$items['feshun']);
    }

    /**
     * fenvaru
     *
     * @return void
     */
    public function fenvaru()
    {
        return $this->scraper->get(self::$items['fenvaru']);
    }
}
