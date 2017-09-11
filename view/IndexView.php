<?php

/**
 * Class IndexView
 * Displays the main page html
 */
class IndexView {

    /**
     * Displays all of the necessary content on the main page
     */
    public function main() {
        ?>
        <!-- Nested Floating Box -->
        <div id="main">
            <div id="box">
                <!-- Large Floating Box -->
                <div id="front">
                    <div id="frontImage"></div>
                    <div>
                        <p>Project by:</p>
                        <p>Dino Cajic</p>
                    </div>
                </div>
                <div id="back"></div>
                <div id="left"></div>
                <div id="right">
                    <div id="login">
                        <form action="?page=login" method="post">
                            <p>Enter Login Information</p>
                            <p><label for="username">Username:</label> <input type="text" name="username" id="username" /></p>
                            <p><label for="password">Password:</label> <input type="password" name="password" id="password" /></p>
                            <p>
                                <input type="submit" value="Login" name="login" />
                                <a href="?page=register">Register</a>
                            </p>
                        </form>
                    </div>
                </div>
                <div id="top"></div>
                <div id="bottom"></div>
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

        <!-- Super Mario Running across screen -->
        <div id="superMarioRunning"></div>
        <!-- ./ End Super Mario Running across screen -->

        <!-- Top Left Info -->
        <div id="superMarioScore">
            <p>WEB PROGRAMMING</p>
            00CSC4370 <div id="scoreCoin"></div> x04
        </div>
        <!-- ./ End Top Left Info -->

        <!-- Top Right Info -->
        <div id="topRightInfo">
            <p>Super Mario Bros Fan Page</p>
            PHP/CSS Project: No JavaScript
        </div>
        <!-- ./ End Top Right Info -->

        <!-- Series of blocks on main page. Has 3 brick blocks and 1 question mark block -->
        <div class="block" id="blockOne"></div>
        <div class="block" id="blockTwo"></div>
        <div id="questionMarkBlock">
            <div id="questionMarkCoin"></div>
        </div>
        <div class="block" id="blockThree"></div>
        <!-- ./ End Series of blocks on main page -->

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
