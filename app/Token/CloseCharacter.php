<?php

namespace App\Token;

use App\Exceptions\TokenException;

class CloseCharacter extends Character
{
    /**
     * @var string[]
     */
    protected array $openCharacter = [
            ']' => '[',
            '}' => '{',
            ')' => '('
    ];

    /**
     * @param $pile
     * @return mixed|void
     * @throws TokenException
     */
    public function check(&$pile) : void
    {
        if ($this->getLastCharacter($pile) == $this->openCharacter[$this->character]) {
            unset($pile[array_key_last($pile)]);
            return ;
        }

        throw new TokenException('Error format token');
    }
}
