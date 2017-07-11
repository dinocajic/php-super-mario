<?php

/**
 * Class User_profileView
 */
class User_profileView {

    /**
     * Displays user profile form and allows the user to edit the details
     *
     * @param array $data
     */
    public function main($data) {
        ?>
        <div id="wrapper">
            <h3>Edit Your Details</h3>
            <hr />
            <form action="?page=user_profile&type=update" method="post" class="user-form">
                <?php
                if ($data["updated"]) {
                    echo "<h4>Details have been updated</h4>";
                }

                foreach ($data["user_details"] as $key => $value) {
                    if ($key == "type" || $key == "id") {
                        // Can't edit user type and user id
                        continue;
                    }

                    if (!is_array($value)) {
                        // For values that aren't nested arrays: i.e. address
                        // Doesn't allows for username editing
                        ?>
                        <p>
                            <label for="<?php echo $key; ?>"><?php echo $key; ?></label>
                            <input type="text"<?php echo ($key == "user_name") ? "readonly='readonly'": ""; ?> value="<?php echo $value ?>" name="<?php echo $key; ?>" />
                        </p>
                        <?php
                        continue;
                    }

                    if (is_array($value)) {
                        // Address is a nested array so we have to loop through each address field
                        foreach ($value as $address_key => $address_field) {
                            ?>
                            <p>
                                <label for="<?php echo $address_key; ?>"><?php echo $address_key; ?></label>
                                <input type="text" value="<?php echo $address_field ?>" name="<?php echo $address_key; ?>" />
                            </p>
                            <?php
                            continue;
                        }
                    }
                }
                ?>
                <input type="submit" value="Update" name="submit" id="submit_button" />
            </form>
        </div>
        <?php
    }
}