<?php

/**
 * Class SudokuView
 */
class SudokuView {

    /**
     * Displays Sudoku puzzle and solution
     *
     * @param array $solved
     * @param array $unsolved
     * @param bool $is_it_solved
     */
    public function main($solved, $unsolved, $is_it_solved) {
        ?>
        <div id="wrapper">
            <div id="sudoku-page">
                <h1>Play Some Sudoku</h1>
                <?php
                if ($is_it_solved) {
                    echo "<h3>Congratulations you beat this game!</h3>";
                }
                ?>

                <form action="?page=sudoku" method="post">
                    <table>
                        <?php
                        $k = 0;

                        echo "<tr>";
                        for ($i = 0; $i < 9; $i++) {
                            echo "</tr><tr>";

                            for ($j = 0; $j < 9; $j++) {
                                echo "<td><input type='text' name='unsolved[" . $i . "][" . $j . "]' value='" . $unsolved[$i][$j] . "' /></td>";
                                $k++;
                            }
                        }
                        echo "</tr>";
                        ?>
                    </table>

                    <input type="submit" value="Submit" name="submit" id="sudoku-button" />
                    
                </form>
                <a href="?page=sudoku&start=new"><button>Start New Game</button></a>

                <h3>Solution</h3>
                <?php
                foreach($solved as $value) {
                    foreach($value as $item) {
                        echo $item . " ";
                    }

                    echo "<br />";
                }
                ?>
            </div>
        </div>
        <?php
    }
}