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

$board   = new SnakeLadder\Lib\Board($theSnakeLadder);
$players = [
    'player1' => new SnakeLadder\Lib\Player(1),
    'player2' => new SnakeLadder\Lib\Player(2),
];
echo "<table width='100%'>";
foreach ($players as $player) {
    $playerPosition = $player->getPosition();
    echo "<td valign='top'>";
    while ($playerPosition <= 100) {
        echo "<li>";
        /**
         * Player roll the dice
         */
        $dice = $player->roll();
        echo "Dice : " . $dice . '<br/>';
        $dice = $dice + $playerPosition;

        /**
         * Initiate player position by Dice result
         */
        $player->setPosition($dice);
        $playerPosition = $player->getPosition();

        /**
         * Move player to the board
         * and get the result
         */
        $resultBoard = $board->movePlayer($playerPosition);

        if ($playerPosition < 100) {
            $player->setPosition($resultBoard);
        }

        $playerPosition = $player->getPosition();
        $player->showPosition();
        echo "</li>";
    }
    echo "</td>";

}
echo "</table>";
