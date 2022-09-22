<?php

namespace App\Repositories;

use App\Clients\TinyURLClient;

class TinyURLRepository implements UrlRepository
{

    /**
     * @var TinyURLClient
     */
    protected $tinyURLClient;

    /**
     * @param TinyURLClient $tinyURLClient
     */
    public function __construct(TinyURLClient $tinyURLClient)
    {
        $this->tinyURLClient = $tinyURLClient;
    }

    /**
     * @param $url
     * @return string
     */
    public function short($url): string
    {
        return $this->tinyURLClient->createdApi($url);
    }
}
