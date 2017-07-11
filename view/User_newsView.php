<?php

/**
 * Class User_newsView
 */
class User_newsView {

    /**
     * Displays news items
     *
     * @param array $data
     */
    public function main($data) {
        ?>
        <div id="wrapper">
            <h1>Welcome to the "News Room"</h1>
            <hr />
            <?php
            $i = 0;

            foreach($data["news_details"] as $key => $news) {
                echo "<div class='news" . (($i % 2 == 0) ? "" : " alternating-color") . "'>";
                    echo "<h3>" . $news["title"] . "</h3>";
                    echo "<p class='author'>Author: " . $news["author"] . "<br />Submitted on:" . $news["date"] . "</p>";
                    echo "<p>" . $news["article"] .  "</p>";
                    echo "<p class='author'>Submitted by: " . $news["submission_by"] .  "</p>";
                echo "</div>";
                $i++;
            }
            ?>
        </div>
        <?php
    }
}