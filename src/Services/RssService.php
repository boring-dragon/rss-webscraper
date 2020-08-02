<?php

namespace Jinas\RssScraper\Services;

use Jinas\RssScraper\Http\Scraper;
use Jinas\RssScraper\Interfaces\IRssService;

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
        return \Jinas\RssScraper\Services\SiteService\MihaaruService::dispatch($articles);
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
        return \Jinas\RssScraper\Services\SiteService\CnmService::dispatch($articles);
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
        return \Jinas\RssScraper\Services\SiteService\ThiladhunService::dispatch($articles);
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
        return \Jinas\RssScraper\Services\SiteService\FaanoozService::dispatch($articles);
    }

}
