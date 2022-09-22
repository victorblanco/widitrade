<?php

namespace App\Token;

abstract class Character
{
    /**
     * @var
     */
    protected string $character;

    /**
     * @param $character
     */
    public function __construct($character)
    {
        $this->character = $character;
    }

    /**
     * Getter Character
     * @return string
     */
    public function getCharacter(): string
    {
        return $this->character;
    }

    /**
     * @param $pile
     * @return string
     */
    protected function getLastCharacter($pile): string
    {
        return $pile[array_key_last($pile)];
    }

    /**
     * @param $pile
     * @return void
     */
    abstract function check(&$pile): void;

}
