<?php

namespace App\Http\Repositories;

interface UrlInterface
{
    /**
     * @param $url
     * @return string
     */
    public function short($url): string;
}
