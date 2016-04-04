<?php

namespace SnakeLadder\Lib;

/**
 *
 */
class Board
{
    protected $square;

    public function __construct(array $customSquare)
    {
        /**
         * identify square number
         * if key is greater than value, it means LADDER
         * if key is smaller than value, it means SNAKE
         *
         * Default square has no LADDER and SNAKE
         * @var integer
         */
        for ($i = 1; $i <= 100; $i++) {
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
    }

    public function show()
    {
        return $this->square;
    }

    public function movePlayer($playerPosition)
    {
        if ($playerPosition != $this->square[$playerPosition]) {
            return $this->square[$playerPosition];
        }
        return $playerPosition;
    }
}
