<?php

namespace SnakeLadder\Lib;

use SnakeLadder\Interfaces\RandomNumberGenerator;

/**
 * We can play snake & ladder game with spinner
 * and, the spinner return a random number between 1-12
 */
class Spinner implements RandomNumberGenerator
{
    /**
     * Spin the spinner, base on php random function
     * @return integer
     */
    public function randomize()
    {
        return mt_rand(1, $this->maxnumber());
    }

    public function maxnumber()
    {
    	return 12;
    }
}
