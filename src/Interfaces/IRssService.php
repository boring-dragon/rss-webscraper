<?php

namespace Jinas\RssScraper\Interfaces;

interface IRssService
{

    public const SERVICES = [
        "mihaaru" => [
            "Service"    => "Mihaaru Media",
            "feed"      => "https://mihaaru.com/rss"
        ],
        "cnm" => [
            "Service"    => "Cnm Media",
            "feed"      => "https://cnm.mv/rss"
        ],
        "thiladhun" => [
            "Service"    => "Thiladhun Media",
            "feed"      => "https://thiladhun.com/feed"
        ],
        "faanooz" => [
            "Service"    => "Faanooz Media",
            "feed"      => "https://faanooz.com/feed"
        ],
        "addulive" => [
            "Service"    => "Addulive Media",
            "feed"      => "https://www.addulive.com/feed"
        ],
        "vaguthu" => [
            "Service"    => "Vaguthu Media",
            "feed"      => "https://vaguthu.mv/feed"
        ],
        "psm" => [
            "Service"    => "PSM Media",
            "feed"      => "https://psmnews.mv/feed"
        ],
        "vnews" => [
            "Service"    => "Vnews Media",
            "feed"      => "https://vnews.mv/rss"
        ],
        "dhuvas" => [
            "Service"    => "Dhuvas Media",
            "feed"      => "https://dhuvas.mv/feed"
        ],
        "feshun" => [
            "Service"    => "Feshun Media",
            "feed"      => "https://feshun.com/feed"
        ],
        "fenvaru" => [
            "Service"    => "Fenvaru Media",
            "feed"      => "https://www.fenvaru.com/feed"
        ]
    ];

    public function __construct();

    public function mihaaru();

    public function cnm();

    public function thiladhun();

    public function faanooz();

}
