<?php

namespace SnakeLadder\Lib;

use SnakeLadder\Lib\Dice;

/**
 *
 */
class Player extends Dice
{
    public $name;

    private $board_position;

    public function __construct($id)
    {
        $this->name           = 'Player ' . $id;
        $this->board_position = 0;
    }

    public function setPosition($position)
    {
        $this->board_position = $position;
    }

    public function showPosition()
    {
        echo $this->name . ' in ' . $this->board_position;
    }

    public function getPosition()
    {
        return $this->board_position;
    }
}
