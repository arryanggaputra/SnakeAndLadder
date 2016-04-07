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

    protected $numberOfParticipant;

    protected $finish = false;

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
        $this->numberOfParticipant   = $numberOfParticipant;
    }

    public function finished()
    {
        return $this->finish;
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

    public function movePlayer($player)
    {
        for ($i = 0; $i < $player->numberOfParticipant(); $i++) {
            $step = $this->roll();
            $step = $step + $player->position($i);
            if (isset($this->square[$step]) && $this->square[$step] !== $step) {
                $step = $this->square[$step];
            }
            if (self::maxBoard >= $player->position($i)) {
                $player->setPosition($i, $step);
                $player->renderPosition($i);
            }
            if (!$this->finish) {
                $this->finish = (self::maxBoard <= $player->position($i)) ? true : false;
            }
        }
    }
}
