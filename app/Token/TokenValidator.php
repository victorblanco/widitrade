<?php

namespace App\Token;

use App\Exceptions\TokenException;


class TokenValidator
{
    /**
     * @var array
     */
    protected array $pile = [];

    /**
     * Characters
     *
     * @var string[]
     */
    protected array $character = [
        '{' => OpenCharacter::class,
        '(' => OpenCharacter::class,
        '[' => OpenCharacter::class,
        '}' => CloseCharacter::class,
        ')' => CloseCharacter::class,
        ']' => CloseCharacter::class
    ];


    /**
     * @param string $token
     * @return bool
     * @throws TokenException
     */
    public function validate(string $token): bool
    {
        $token = $this->getCharactersToken($token);

        foreach ($token as $character) {
            try {
                $classCharacter = $this->character[$character];
                $character      = new $classCharacter($character);
                $character->check($this->pile);

            } catch (\ErrorException $e) {
                throw new TokenException('Error format token');
            }
        }

        return $this->isValidatePile();
    }

    /**
     * @param $token
     * @return array
     */
    protected function getCharactersToken($token)
    {
        $token = str_replace("Bearer ", "", $token);

        return str_split($token);
    }

    /**
     * @return bool
     * @throws TokenException
     */
    protected function isValidatePile(): bool
    {
        return count($this->pile) ? throw  new TokenException('Error format token') : true;
    }

}
