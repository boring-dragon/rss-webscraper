<?php

namespace RssScraper\Interfaces;

interface IExtractor
{
    public function extract($url,$date = null,$guid = null);
}
