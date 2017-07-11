<?php

/**
 * Class Admin_newsView
 */
class Admin_newsView {

    /**
     * Displays a form so that administrators can add news items and
     * displays current news items that administrators can delete.
     *
     * @param array $data
     */
    public function main($data) {
        ?>
        <div id="wrapper">
            <h2>Add News Article</h2>

            <?php
            if ($data["entry_added"]) {
                echo "<h3>Entry has been added</h3>";
            }
            ?>

            <hr />
            <form class="admin-news-form" action="?page=admin_news&type=add" method="post">
                <p>
                    <label for="title">Title: </label>
                    <input type="text" id="title" name="title">
                </p>

                <p>
                    <label for="author">Author: </label>
                    <input type="text" id="author" name="author">
                </p>

                <p>
                    <label for="submission_date">Submission Date: </label>
                    <input type="text" id="submission_date" name="submission_date">
                </p>

                <p>
                    <label for="submitted_by">Submitted By: </label>
                    <input type="text" id="submitted_by" name="submitted_by">
                </p>

                <p>
                    <label for="article">Article: </label>
                    <textarea name="article" id="article"></textarea>
                </p>

                <p>
                    <input type="submit" value="Submit" id="submit_button" name="submit" />
                </p>
            </form>

            <h2>Delete News Articles</h2>

            <?php
            if ($data["removed_entry"]) {
                echo "<h3>Entry has been removed</h3>";
            }

            foreach ($data["news_entries"] as $key => $news_entry) {
                echo "<p><a href='?page=admin_news&type=remove&id=" . $news_entry["id"] . "'>Delete</a>: " . $news_entry["title"] . "</p>";
            }
            ?>
        </div>
        <?php
    }
}