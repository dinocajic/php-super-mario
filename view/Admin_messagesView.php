<?php

/**
 * Class Admin_messagesView
 */
class Admin_messagesView {

    /**
     * Displays the Send Message Form
     *
     * @param array $data
     */
    public function main($data) {
        ?>
        <div id="wrapper">
            <h2>Send Message to Users</h2>

            <?php
            if ($data["message_added"]) {
                echo "<h3>Message has been sent</h3>";
            }
            ?>

            <hr />
            <form class="admin-messages-form" action="?page=admin_messages&type=add" method="post">
                <p>
                    <label for="user">User: </label>
                    <select name="user" id="user">
                        <?php
                        foreach ($data["users"] as $key => $name) {
                            echo "<option value='" . $key . "'>" . $name .  "</option>";
                        }
                        ?>

                    </select>
                </p>

                <p>
                    <label for="message">Message: </label>
                    <textarea name="message" id="message"></textarea>
                </p>

                <p>
                    <input type="submit" value="Submit" id="submit_button" name="submit" />
                </p>
            </form>
        </div>
        <?php
    }
}