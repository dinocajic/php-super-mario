<?php

/**
 * Class Admin_usersView
 */
class Admin_usersView {

    /**
     * Displays registered "regular" users that administrators can delete
     *
     * @param array $data
     */
    public function main($data) {
        ?>
        <div id="wrapper">
            <h3>User Management</h3>
            <hr />
            <p>
                Select the checkbox next to the users that you want to delete
            </p>
            <form action="?page=admin_users&type=remove" class='admin-users' method="post">
                <?php
                foreach ($data["users"] as $key => $user) {
                    if ($user["type"] != "admin") {
                        echo "<p>";
                            echo "<input type='checkbox' name='users_to_delete[]' value='" . $user["id"] . "' />";
                            echo "<span>" . $user["user_name"] . "</span>";
                            echo "<span>" . $user["name"]      . "</span>";
                        echo "</p>";
                    }
                }
                ?>
                <input type="submit" value="Delete" name="submit" />
            </form>
        </div>
        <?php
    }
}