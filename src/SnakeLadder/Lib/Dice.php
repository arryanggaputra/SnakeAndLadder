<?php

namespace SnakeLadder\Lib;

use SnakeLadder\Interfaces\RandomNumberGenerator;

/**
 * Every snake & ladder game has one dice
 * and, the dice return a random number between 1-6
 */
class Dice implements RandomNumberGenerator
{
    /**
     * Roll the dice, base on php random function
     * @return integer
     */

    public function randomize()
    {
        return mt_rand(1, $this->maxnumber());
    }

    public function maxnumber()
    {
    	return 6;
    }
}
