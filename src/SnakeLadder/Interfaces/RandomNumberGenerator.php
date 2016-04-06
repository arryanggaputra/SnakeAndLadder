<?php
namespace SnakeLadder\Interfaces;

interface RandomNumberGenerator
{
    /**
     * @return int Random number.
     */
    public function randomize();

    /**
     * @return int Maximum Random number
     */
    public function maxnumber();
}
