<?php

/**
 * Class RegisterView
 */
class RegisterView {

    /**
     * Displays the registration form
     *
     * @param array $data
     */
    public function main($data) {
        ?>
        <div id="wrapper">
            <h3>Register for access</h3>

            <?php
            if ($data["errors"] !== false) {
                foreach ($data["errors"] as $error) {
                    echo "<p>" . $error . "</p>";
                }
            }

            if ($data["added"]) {
                echo "<h4>You are now registered. Return to the <a href='index.php'>main page</a> and log in.</h4>";
                echo "</div>";
                return;
            }
            ?>

            <hr />
            <form class="register-form" action="?page=register" method="post">
                <p>
                    <label for="user_name">User Name: </label>
                    <input type="text" id="user_name" name="user_name">
                </p>

                <p>
                    <label for="password">Password: </label>
                    <input type="password" id="password" name="password">
                </p>

                <p>
                    <input type="submit" value="Register" id="submit_button" name="submit" />
                </p>
            </form>
        </div>
        <?php
    }
}