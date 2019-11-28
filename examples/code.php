<?php

require_once '../vendor/autoload.php';

use RssScraper\Services\RssService;


$rss = new RssService();
dd($rss->mihaaru());