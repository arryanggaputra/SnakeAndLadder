<?php

namespace SnakeLadder\Lib;

class Dice implements RandomNumberGenerator
{
    public function randomize()
    {
        return mt_rand(1, 6);
    }
}
