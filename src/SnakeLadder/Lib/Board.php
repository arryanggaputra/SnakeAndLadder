<?php

namespace SnakeLadder\Lib;

/**
 *
 */
class Board
{
    protected $_square;

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
            $this->_square[$i] = $i;
        }

        /**
         * Replace default square
         */
        $this->_square = $customSquare + $this->_square;

        /**
         * Sort square position
         */
        ksort($this->_square);
    }

    public function roll()
    {
        return $this->randomNumberGenerator->randomize();
    }

    public function getBoardSize()
    {
        return self::maxBoard;
    }

    public function movePlayer($playerPosition)
    {
        if ($playerPosition != $this->_square[$playerPosition]) {
            return $this->_square[$playerPosition];
        }
        return $playerPosition;
    }
}
