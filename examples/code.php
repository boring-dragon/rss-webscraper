<?php

require_once '../vendor/autoload.php';

use Jinas\RssScraper\Services\RssService;

$rss = new RssService();
//echo json_encode($rss->thiladhun(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
echo json_encode($rss->faanooz(), JSON_UNESCAPED_UNICODE);
