<?php
namespace RssScraper\Interfaces;

interface IService
{
    /**
     * dispatch
     *
     * @param  mixed $articles
     *
     * @return void
     */
    public static function dispatch(array $articles = []);
}