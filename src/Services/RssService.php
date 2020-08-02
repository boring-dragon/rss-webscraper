<?php

namespace RssScraper\Services;

use RssScraper\Http\Scraper;
use RssScraper\Interfaces\IRssService;

class RssService implements IRssService
{
    protected $scraper;

    public function __construct()
    {
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
        $rss = $this->scraper->get(IRssService::SERVICES['mihaaru']['feed']);
        $articles = $rss["channel"]["item"];
        return \RssScraper\Services\SiteService\MihaaruService::dispatch($articles);
    }

    /**
     * cnm
     *
     * @return void
     */
    public function cnm()
    {
        $rss = $this->scraper->get(IRssService::SERVICES['cnm']['feed']);
        $articles = $rss["channel"]["item"];
        return \RssScraper\Services\SiteService\CnmService::dispatch($articles);
    }

    /**
     * thiladhun
     *
     * @return void
     */
    public function thiladhun()
    {
        $rss = $this->scraper->get(IRssService::SERVICES['thiladhun']['feed']);
        $articles = $rss["channel"]["item"];
        return \RssScraper\Services\SiteService\ThiladhunService::dispatch($articles);
    }

    /**
     * faanooz
     *
     * @return void
     */
    public function faanooz()
    {
        $rss = $this->scraper->get(IRssService::SERVICES['faanooz']['feed']);
        $articles = $rss["channel"]["item"];
        return \RssScraper\Services\SiteService\FaanoozService::dispatch($articles);
    }

    /**
     * addulive
     *
     * @return void
     */
    public function addulive()
    {
        return $this->scraper->get(IRssService::SERVICES['addulive']['feed']);
    }

    /**
     * vaguthu
     *
     * @return void
     */
    public function vaguthu()
    {
        return $this->scraper->get(IRssService::SERVICES['vaguthu']['feed']);
    }

    /**
     * psm
     *
     * @return void
     */
    public function psm()
    {
        return $this->scraper->get(IRssService::SERVICES['psm']['feed']);
    }

    /**
     * vnews
     *
     * @return void
     */
    public function vnews()
    {
        return $this->scraper->get(IRssService::SERVICES['vnews']['feed']);
    }

    /**
     * dhuvas
     *
     * @return void
     */
    public function dhuvas()
    {
        return $this->scraper->get(IRssService::SERVICES['dhuvas']['feed']);
    }

    /**
     * feshun
     *
     * @return void
     */
    public function feshun()
    {
        return $this->scraper->get(IRssService::SERVICES['feshun']['feed']);
    }

    /**
     * fenvaru
     *
     * @return void
     */
    public function fenvaru()
    {
        return $this->scraper->get(IRssService::SERVICES['fenvaru']['feed']);
    }

    
}
