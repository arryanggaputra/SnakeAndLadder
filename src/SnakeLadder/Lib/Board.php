<?php

namespace SnakeLadder\Lib;

use SnakeLadder\Interfaces\RandomNumberGenerator;

/**
 *
 */
class Board
{
    protected $square;

    protected $randomNumberGenerator;

    const maxBoard = 100;

    public function __construct(array $customSquare, RandomNumberGenerator $randomNumberGenerator)
    {
        /**
         * identify square number
         * if key is greater than value, it means LADDER
         * if key is smaller than value, it means SNAKE
         *
         * Default square has no LADDER and SNAKE
         * @var integer
         */
        for ($i = 1; $i <= self::maxBoard; $i++) {
            $this->square[$i] = $i;
        }

        /**
         * Replace default square
         */
        $this->square = $customSquare + $this->square;

        /**
         * Sort square position
         */
        ksort($this->square);

        $this->randomNumberGenerator = $randomNumberGenerator;
    }

    public function roll()
    {
        return $this->randomNumberGenerator->randomize();
    }

    public function maxRollNumber()
    {
        return $this->randomNumberGenerator->maxnumber();
    }

    public function getBoardSize()
    {
        return self::maxBoard;
    }

    public function movePlayer($player, $step)
    {
        $step   = $step + $player->position();
        $status = 'neutral';
        if (isset($this->square[$step]) && $this->square[$step] !== $step) {
            $status = ($this->square[$step] < $step) ? 'snake' : 'ladder';
            $step   = $this->square[$step];
        }
        if (self::maxBoard >= $player->position()) {
            $player->setPosition($step);
        }
        return $status;
    }
}
