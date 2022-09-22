<?php

namespace App\Repositories;

use App\Clients\TinyURLClient;
use GuzzleHttp\Exception\GuzzleException;

class TinyURLRepository implements UrlRepository
{

    /**
     * @var TinyURLClient
     */
    protected TinyURLClient $tinyURLClient;

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
     * @throws GuzzleException
     */
    public function short($url): string
    {
        return $this->tinyURLClient->createdApi($url);
    }
}
