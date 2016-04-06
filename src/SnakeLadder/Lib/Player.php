<?php

namespace SnakeLadder\Lib;

use SnakeLadder\Lib\Board;

/**
 *
 */
class Player
{
    public $name;

    public function __construct($id)
    {
        $this->name           = 'Player ' . $id;
        $this->_boardPosition = 0;
    }

    public function setPosition($position)
    {
        $this->_boardPosition = $position;
    }

    public function showPosition()
    {
        echo $this->name . ' in ' . $this->_boardPosition;
    }

    public function getPosition()
    {
        return $this->_boardPosition;
    }

}
