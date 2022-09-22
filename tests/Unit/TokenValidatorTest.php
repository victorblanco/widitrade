<?php

namespace Tests\Unit;

use App\Auth\TokenValidator;
use App\Exceptions\TokenException;
use Tests\TestCase;

class TokenValidatorTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example_worng_token()
    {
        $this->expectException(TokenException::class);
        $tokenValidator = new TokenValidator();

        $tokenValidator->validate('{]}');

    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example_correct_token()
    {
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('{[]}');
        $this->assertTrue($ret);
    }

    public function test_example_wrong_character_token()
    {
        $this->expectException(TokenException::class);
        $tokenValidator = new TokenValidator();

        $tokenValidator->validate('{[a]}');
    }

    public function test_example_1()
    {
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('{}');
        $this->assertTrue($ret);
    }

    public function test_example_2()
    {
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('{}[]()');
        $this->assertTrue($ret);
    }

    public function test_example_3()
    {
        $this->expectException(TokenException::class);
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('{)');

    }

    public function test_example_4()
    {
        $this->expectException(TokenException::class);
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('[{]}');

    }

    public function test_example_5()
    {
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('{([])}');
        $this->assertTrue($ret);
    }

    public function test_example_6()
    {
        $this->expectException(TokenException::class);
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('(((((((()');

    }
}
