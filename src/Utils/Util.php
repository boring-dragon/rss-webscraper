<?php

namespace RssScraper\Utils;

use RssScraper\Interfaces\IUtil;

class Util implements IUtil
{
    public static function load($filepath)
    {
        static::$items = include('../configs/' . $filepath . '.php');
    }
}
