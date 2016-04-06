<?php

namespace SnakeLadder\Lib;

use SnakeLadder\Lib\Board;

/**
 *
 */
class Player
{
    public $name;

    protected $_boardSize;

    public function __construct($id, Board $board)
    {
        $this->name           = 'Player ' . $id;
        $this->_boardPosition = 0;
        $this->_boardSize     = $board->getBoardSize();
    }

    public function setPosition($position)
    {
        if ($this->_boardSize >= $this->_boardPosition ) {
            $this->_boardPosition = $position;
        }
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
