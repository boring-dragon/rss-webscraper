<?php
namespace RssScraper\Interfaces;

interface IScraper
{
    /**
     * get
     *
     * @param  mixed $url
     *
     * @return void
     */
    public function get($url);
}