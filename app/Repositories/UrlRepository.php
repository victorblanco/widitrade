<?php

namespace App\Repositories;

interface UrlRepository
{
    /**
     *
     * Return a short url
     *
     * @param $url
     * @return string
     */
    public function short($url): string;
}
