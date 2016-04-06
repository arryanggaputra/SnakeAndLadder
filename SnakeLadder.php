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
// $spinner = new SnakeLadder\Lib\Spinner();
$board  = new SnakeLadder\Lib\Board($theSnakeLadder, $dice);
$player = new SnakeLadder\Lib\Player(1);
$image  = [
    'neutral' => 'http://icons.iconarchive.com/icons/icojam/blueberry-basic/32/check-icon.png',
    'snake'   => 'http://www.freeiconsweb.com/Freeicons/Glass_animals_ICON/Snake.png',
    'ladder'  => 'http://cdn-img.easyicon.net/png/5432/543288.gif',
];
while ($player->position() <= $board->getBoardSize()) {
    echo "<li>";

    /**
     * Roll the dice on Board
     */
    $step = $board->roll();

    /**
     * roll the dice again
     */
    if ($step == $board->maxRollNumber()) {
        $step += $board->roll();
    }

    $player->showPosition();
    echo " - Dice : " . $step;

    /**
     * Move player to the board
     * and get the result
     */
    $status        = $board->movePlayer($player, $step);
    echo '<img src="'.$image[$status].'" width="20px"><br/>';
    echo "</li>";
}
