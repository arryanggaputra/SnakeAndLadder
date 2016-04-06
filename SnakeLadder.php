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

$dice = new SnakeLadder\Lib\Dice();
$digitalRandom = new SnakeLadder\Lib\DigitalRandomizer();

$board   = new SnakeLadder\Lib\Board($theSnakeLadder, $digitalRandom);
$player = new SnakeLadder\Lib\Player(1, $board);

while ($player->getPosition() <= $board->getBoardSize()) {
    echo "<li>";
    $player->showPosition();
    /**
     * Roll the dice on Board
     */
    $dice = $board->roll();

    /**
     * if the dice is 6
     * roll the dice again
     */
    if ($dice == 6) {
        $dice += $board->roll();
    }
    echo " - Dice : " . $dice . '<br/>';

    $dice = $dice + $player->getPosition();

    /**
     * Prepare player position by Dice result
     */
    $player->setPosition($dice);

    /**
     * Move player to the board
     * and get the result
     */
    $resultBoard = $board->movePlayer($player->getPosition());
    $player->setPosition($resultBoard);

    echo "</li>";
}
