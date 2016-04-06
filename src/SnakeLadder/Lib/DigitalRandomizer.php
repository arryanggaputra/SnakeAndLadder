<?php

namespace SnakeLadder\Lib;

class DigitalRandomizer implements RandomNumberGenerator
{
    public function randomize()
    {
        return mt_rand(1, 3);
    }
}
