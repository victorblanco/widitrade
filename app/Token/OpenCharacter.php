<?php

namespace App\Token;

class OpenCharacter extends Character
{
    /**
     * @param $pile
     * @return void
     */
    public function check(&$pile): void
    {
        $pile[] = $this->character;
    }

}
