<?php

namespace SnakeLadder\Lib;

use SnakeLadder\Lib\Board;

/**
 *
 */
class Player
{
    public $name;

    protected $participants = [];

    public function add($name)
    {
        $this->participants[]['name'] = $name;
    }

    public function name($idPlayer)
    {
        return $this->participants[$idPlayer]['name'];
    }

    public function numberOfParticipant()
    {
        return sizeof($this->participants);
    }

    public function setPosition($idPlayer, $position)
    {
        $this->participants[$idPlayer]['board_position'] = $position;
    }

    public function renderPosition($idPlayer)
    {
        echo sprintf("<div class='%s'> <b>%s</b> in %s</div>",
                $this->participants[$idPlayer]['name'],
                $this->participants[$idPlayer]['name'],
                $this->participants[$idPlayer]['board_position']
        );
    }

    public function position($idPlayer)
    {
        return $this->participants[$idPlayer]['board_position'];
    }

}
