<?php

/**
 * Class IndexView
 * Displays the main page html
 */
class User_mainView {

    /**
     * Displays all of the necessary content on the main page
     *
     * @param array $data
     */
    public function main($data) {
        ?>
        <form action="?page=user_main" method="post">
            <!-- Nested Floating Box -->
            <div id="main">
                <div id="box">
                    <!-- Large Floating Box -->
                    <div id="front">
                        <?php
                        if ($data["player"] !== false) {
                            // If a player won tic-tac-toe
                            ?><div id="bossImage"></div><?php
                        } else {
                            ?><div id="frontImage"></div><?php
                        }
                        ?>
                        <div>
                            <?php
                            if ($data["player"] !== false) {
                                // If a player won tic-tac-toe
                                echo "<p>Player " . $data["player"] . " won!</p>";
                                echo "<p><a href='?page=user_main'>Play Again!</a></p>";
                            } else {
                                ?>
                                <p>Welcome to the Party</p>
                                <p><?php echo $data["user"]["name"]; ?></p>
                                <p>Play some games</p>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div id="back"></div>
                    <div id="left"></div>
                    <div id="right">
                        <!-- Tic Tac Toe game -->
                        <div id="tic-tac-toe">
                            <table>
                                <?php
                                echo "<tr>";
                                for ($i = 0; $i < 9; $i++) {
                                    if ($i != 0 && $i % 3 == 0) {
                                        echo "</tr><tr>";
                                    }

                                    ?>
                                    <td>
                                        <input type="text"
                                               name="tic-<?php echo $i; ?>"
                                               title="Tic Tac Toe"
                                               value="<?php echo (isset($_POST["tic-" . $i])) ? $_POST["tic-" . $i] : ""; ?>" />
                                    </td>
                                    <?php
                                }

                                echo "</tr>";
                                ?>
                            </table>
                        </div>
                        <!-- ./ End Tic Tac Toe Game -->
                    </div>
                    <div id="top"></div>
                    <div id="bottom-sudoku">
                        <a href="?page=sudoku">
                            <img src="img/sudoku.png" alt="Play Sudoku" />
                        </a>
                    </div>
                    <!-- ./ End Large Floating Box -->

                    <!-- Internal Small Floating Box -->
                    <div class="internalBox" id="internalFront"></div>
                    <div class="internalBox" id="internalBack"></div>
                    <div class="internalBox" id="internalLeft"></div>
                    <div class="internalBox" id="internalRight"></div>
                    <div class="internalBox" id="internalTop"></div>
                    <div class="internalBox" id="internalBottom"></div>
                    <!-- ./ End Internal Small Floating Box -->

                </div>
            </div>
            <!-- ./ End Nested Floating Box -->

            <!-- Series of blocks on main page. Has 3 brick blocks and 1 question mark block -->
            <div class="block" id="blockOne">
                <a href="?page=sudoku" title="Sudoku">Sudoku</a>
            </div>
            <div class="block" id="blockTwo"></div>
            <div id="questionMarkBlock">
                <input type="submit" value="Submit" name="submit">
                <div id="questionMarkCoin"></div>
            </div>
            <div class="block" id="blockThree"></div>
            <!-- ./ End Series of blocks on main page -->
        </form>

        <!-- Super Mario Running across screen -->
        <div id="superMarioRunning"></div>
        <!-- ./ End Super Mario Running across screen -->

        <!-- Background images -->
        <div class="bushes"></div>
        <div class="bushes" id="bushesTwo"></div>
        <div class="hill"></div>
        <div class="hill" id="hillTwo"></div>
        <div id="cloudLarge"></div>
        <div id="cloudSmall"></div>
        <div id="ground"></div>
        <!-- ./ End Background images -->

        <!-- Green Tube -->
        <div id="topTube">
            <div class="topTubeDivs" id="topOne"></div>
            <div class="topTubeDivs" id="topTwo"></div>
            <div class="topTubeDivs" id="topThree"></div>
            <div class="topTubeDivs" id="topFour"></div>
            <div class="topTubeDivs" id="topFive"></div>
            <div class="topTubeDivs" id="topSix"></div>
            <div class="topTubeDivs" id="topSeven"></div>
            <div class="topTubeDivs" id="topEight"></div>
        </div>
        <div id="bottomTube">
            <div class="bottomTubeDivs" id="bottomOne"></div>
            <div class="bottomTubeDivs" id="bottomTwo"></div>
            <div class="bottomTubeDivs" id="bottomThree"></div>
            <div class="bottomTubeDivs" id="bottomFour"></div>
            <div class="bottomTubeDivs" id="bottomFive"></div>
            <div class="bottomTubeDivs" id="bottomSix"></div>
            <div class="bottomTubeDivs" id="bottomSeven"></div>
        </div>
        <!-- ./ End Green Tube -->
        <?php
    }
}