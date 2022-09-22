<?php

namespace App\Auth;

use App\Exceptions\TokenException;

/**
 *
 */
class TokenValidator
{
    /**
     * @var array
     */
    protected $pila = [];

    /**
     * Opening characters in order
     *
     * @var string[]
     */
    protected $opensCharacter = [
        '{', '(', '['
    ];

    /**
     * Closing characters in order
     *
     * @var string[]
     */
    protected $closedCharacter = [
        '}', ')', ']'
    ];

    /**
     * @param string $token
     * @return bool
     * @throws TokenException
     */
    public function validate(string $token): bool
    {
        $token = str_split($token);

        foreach ($token as $character) {
            if ($this->isOpen($character)) {
                $this->processOpenCharacter($character);
            } elseif ($this->isClosedCharacter($character)) {
                $this->processCloseCharacter($character);
            } else {
                throw new TokenException('Error format token');
            }
        }

        return $this->isValidateToken();
    }

    /**
     * @param $character
     * @return void
     */
    protected function isOpen($character): bool
    {
        return in_array($character, $this->opensCharacter);
    }

    /**
     * @param $character
     * @return void
     */
    protected function processOpenCharacter($character): void
    {
        $this->pila[] = $character;
    }

    /**
     * @param $character
     * @return void
     */
    protected function isClosedCharacter($character): bool
    {
        return in_array($character, $this->closedCharacter);
    }

    /**
     * @param $character
     * @return void
     * @throws TokenException
     */
    protected function processCloseCharacter($character): void
    {
        if ($this->getLastCharacter() == $this->opensCharacter[array_search($character, $this->closedCharacter)]) {
            unset($this->pila[array_key_last($this->pila)]);
        } else {
            throw new TokenException('Error format token');
        }
    }

    /**
     * @return string
     */
    protected function getLastCharacter(): string
    {
        return $this->pila[array_key_last($this->pila)];
    }

    /**
     * @return bool
     * @throws TokenException
     */
    protected function isValidateToken(): bool
    {
        return count($this->pila) ? throw  new TokenException('Error format token') : true;
    }

}
