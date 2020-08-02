<?php

namespace Jinas\RssScraper\Utils;

class Json
{
    /**
     * encode.
     *
     * @param mixed $data
     *
     * @return void
     */
    public static function encode($data)
    {
        return json_encode($data, JSON_PRETTY_PRINT);
    }
}
