<?php

namespace App\Clients;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class TinyURLClient extends Client
{

    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $config['base_uri'] = config("tinyurl.url");
        parent::__construct($config);
    }

    /**
     * @param $url
     * @return string
     * @throws GuzzleException
     */
    public function create($url): string
    {
        $ret = $this->get('api-create.php?url=' . $url);

        return $ret->getBody()->getContents();
    }
}
