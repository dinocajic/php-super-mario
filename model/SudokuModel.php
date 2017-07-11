<?php

/**
 * Class SudokuModel
 */
class SudokuModel {

    /**
     * Checks to see if puzzle is solved
     *
     * @param array $data
     * @return bool
     */
    public function checkIfSolved($data) {
        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if (empty($data["unsolved"][$i][$j])) {
                    return false;
                }

                if ($data["solved"][$i][$j] != $data["unsolved"][$i][$j]) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * Generates the solution for Sudoku puzzle.
     * Rows are from 0 to 8 instead of 1 to 9. Row 0 is randomly generated.
     * Rows 1, 2, 4, 5, 7 and 8 receive a left shift of 3.
     * Rows 3 and 6 receive a left shift of 1. In cases of left-shift-3, the first 3
     * elements are pushed to the back of the array. In cases of left-shift-1, the first
     * element is pushed to the back of the array.
     *
     * $k = ($k == 9)  ? 0 : $k; ... and the two conditional/assignment statements below that
     * handle the array elements being pushed out from the front and to the back.
     *
     * @return array
     */
    public function generateSudokuPuzzle() {
        $row = array();

        $row[0] = range(1, 9);
        shuffle($row[0]);

        for ($i = 1; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if ($i % 3 == 0) {
                    $k = $j + 1;
                } else {
                    $k = $j + 3;
                }

                $k = ($k == 9)  ? 0 : $k;
                $k = ($k == 10) ? 1 : $k;
                $k = ($k == 11) ? 2 : $k;

                $row[$i][$j] = $row[$i - 1][$k];
            }
        }

        return $row;
    }

    /**
     * Takes the solved solution and takes out random pieces
     *
     * @param array $solved
     * @return array
     */
    public function generateUnsolvedPuzzle($solved) {
        $unsolved = array();

        for ($i = 0; $i < 9; $i++) {
            for ($j = 0; $j < 9; $j++) {
                if (rand(0, 1)) {
                    $unsolved[$i][$j] = "";
                } else {
                    $unsolved[$i][$j] = $solved[$i][$j];
                }
            }
        }

        return $unsolved;
    }
}