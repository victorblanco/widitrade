<?php

namespace Tests\Unit;

use App\Token\TokenValidator;
use App\Exceptions\TokenException;
use Tests\TestCase;

class TokenValidatorTest extends TestCase
{

    /**
     * @return void
     * @throws TokenException
     */
    public function test_example_worng_token()
    {
        $this->expectException(TokenException::class);
        $tokenValidator = new TokenValidator();

        $tokenValidator->validate('{]}');

    }

    /**
     * @return void
     * @throws TokenException
     */
    public function test_example_correct_token()
    {
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('{[]}');
        $this->assertTrue($ret);
    }

    /**
     * @return void
     * @throws TokenException
     */
    public function test_example_wrong_character_token()
    {
        $this->expectException(TokenException::class);
        $tokenValidator = new TokenValidator();

        $tokenValidator->validate('{[a]}');
    }

    /**
     * @return void
     * @throws TokenException
     */
    public function test_example_1()
    {
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('{}');
        $this->assertTrue($ret);
    }

    /**
     * @return void
     * @throws TokenException
     */
    public function test_example_2()
    {
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('{}[]()');
        $this->assertTrue($ret);
    }

    /**
     * @return void
     * @throws TokenException
     */
    public function test_example_3()
    {
        $this->expectException(TokenException::class);
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('{)');

    }

    /**
     * @return void
     * @throws TokenException
     */
    public function test_example_4()
    {
        $this->expectException(TokenException::class);
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('[{]}');

    }

    /**
     * @return void
     * @throws TokenException
     */
    public function test_example_5()
    {
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('{([])}');
        $this->assertTrue($ret);
    }

    /**
     * @return void
     * @throws TokenException
     */
    public function test_example_6()
    {
        $this->expectException(TokenException::class);
        $tokenValidator = new TokenValidator();

        $ret = $tokenValidator->validate('(((((((()');

    }
}
