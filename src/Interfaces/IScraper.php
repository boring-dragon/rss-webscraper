<?php

namespace Jinas\RssScraper\Interfaces;

interface IScraper
{
    /**
     * get.
     *
     * @param mixed $url
     *
     * @return array
     */
    public function get(string $url): array;
}
