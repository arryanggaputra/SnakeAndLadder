<?php

namespace SnakeLadder\Lib;

use SnakeLadder\Lib\Board;

/**
 *
 */
class Player
{
    public $name;

    protected $boardPosition;

    public function __construct($id)
    {
        $this->name           = 'Player ' . $id;
        $this->boardPosition = 0;
    }

    public function setPosition($position)
    {
        $this->boardPosition = $position;
    }

    public function showPosition()
    {
        echo $this->name . ' in ' . $this->boardPosition;
    }

    public function position()
    {
        return $this->boardPosition;
    }

}
