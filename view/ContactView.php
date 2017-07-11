<?php

/**
 * Class ContactView
 */
class ContactView {

    /**
     * Displays the contact details
     *
     * @param array $data
     */
    public function main($data) {
        ?>
        <div id="wrapper">
            <h3>Contact Us</h3>

            <p>Organization Name: <?php echo $data["org_name"]; ?></p>
            <p>Emails:</p>
            <ul>
                <?php
                foreach($data["email"] as $key => $email) {
                    echo "<li>$email</li>";
                }
                ?>
            </ul>
            <p>Address: <?php echo $data["address"]; ?></p>

            <p>
                <img src="img/super-mario-contact.png" />
            </p>

        </div>
        <?php
    }
}