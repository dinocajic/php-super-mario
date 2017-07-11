<?php

/**
 * Class TicTacToeModel
 */
class TicTacToeModel {

    /**
     * Checks all winning combinations to see if either of the players have won the Tic-Tac-Toe game
     *
     * @param array $board
     * @param array $players
     * @return bool
     */
    public function checkWin($board, $players) {
        $winning_combinations = array(
            array(0, 1, 2),
            array(3, 4, 5),
            array(6, 7, 8),
            array(0, 3, 6),
            array(1, 4, 7),
            array(2, 5, 8),
            array(0, 4, 8),
            array(2, 4, 6)
        );

        foreach($players as $player) {
            foreach($winning_combinations as $combination) {
                if ($board[$combination[0]] == $player && $board[$combination[1]] == $player && $board[$combination[2]] == $player) {
                    return $player;
                }
            }
        }

        return false;
    }
}