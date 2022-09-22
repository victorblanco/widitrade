<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $token = '{}{}[[[]]]';

    protected $invalidToken = "[]a";

    protected function getAuth()
    {
        return [
            "Authorization" => "Bearer " . $this->token
        ];
    }

    protected function getInvalidAuth()
    {
        return [
            "Authorization" => "Bearer " . $this->invalidToken
        ];
    }
}
