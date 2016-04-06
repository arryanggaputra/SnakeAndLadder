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

$dice    = new SnakeLadder\Lib\Dice();
// $spinner = new SnakeLadder\Lib\Spinner();
$board   = new SnakeLadder\Lib\Board($theSnakeLadder, $dice);
$player  = new SnakeLadder\Lib\Player(1, $board);

while ($player->position() <= $board->getBoardSize()) {
    echo "<li>";

    /**
     * Roll the dice on Board
     */
    $dice = $board->roll();

    /**
     * roll the dice again
     */
    if ($dice == $board->maxRollNumber()) {
        $dice += $board->roll();
    }

    $player->showPosition();
    echo " - Dice : " . $dice . '<br/>';

    $step = $dice + $player->position();

    /**
     * Move player to the board
     * and get the result
     */
    $board->movePlayer($player, $step);

    echo "</li>";
}
