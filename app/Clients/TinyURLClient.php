<?php

namespace App\Clients;

use GuzzleHttp\Client;
use Tests\CreatesApplication;

class TinyURLClient extends Client
{

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->url  = config("tinyurl.url");
        parent::__construct($config);
    }

    /**
     * @param $url
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function createdApi($url): string
    {
        $ret    =  $this->get($this->url . 'api-create.php?url=' . $url);
        $json   = $ret->getBody()->getContents();

        return $json;
    }
}
