<?php

/**
 * Class User_messagesView
 */
class User_messagesView {

    /**
     * Displays the unread messages for specific user
     *
     * @param array $messages
     */
    public function main($messages) {
        ?>
        <div id="wrapper">
            <h1>Unread Messages</h1>
            <?php
            foreach($messages as $key => $message) {
                echo "<h3>" . $message["date"] . ": " . $message["user"] . "</h3>";
                echo "<p>" . $message["message"] . "</p>";
                echo "<p><a href='?page=user_messages&type=remove&id=" . $message["id"] . "'>Delete Message</a></p>";
                echo "<hr />";
            }
            ?>
        </div>
        <?php
    }
}