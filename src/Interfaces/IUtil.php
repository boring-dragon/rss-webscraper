<?php
namespace RssScraper\Interfaces;

interface IUtil
{
    /**
     * load the config variables
     * 
     * @return void
     */
    public static function load($filepath);
}