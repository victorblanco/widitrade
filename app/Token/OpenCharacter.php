<?php

namespace App\Token;

class OpenCharacter extends Character
{
    /**
     * @param $pile
     * @return mixed|void
     */
    public function check(&$pile): void
    {
        $pile[] = $this->character;
    }

}
