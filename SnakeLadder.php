<?php
include_once 'vendor/autoload.php';

/**
 *
 */

$theSnakeLadder = [
    4  => 14,
    9  => 31,
    17 => 7,
    20 => 38,
    51 => 67,
    54 => 34,
    62 => 19,
    63 => 81,
    64 => 19,
    71 => 91,
    93 => 73,
    95 => 75,
    99 => 78,
];

$player = new SnakeLadder\Lib\Player;
$player->add('Engis');
$player->add('Juna');
$dice = new SnakeLadder\Lib\Dice();
$board  = new SnakeLadder\Lib\Board($theSnakeLadder, $dice);
while (!$board->finished()) {
    /**
     * Move player to the board
     * and get the result
     */
    $board->movePlayer($player);
}