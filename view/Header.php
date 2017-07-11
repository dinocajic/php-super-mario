<?php
/**
 * Class Header
 * Displays the top html content through the top navigation.
 */
class Header {

    /**
     * Displays the page header
     * 
     * @param string $title
     * @param bool $top_nav
     */
    public function main($title, $top_nav = false) {
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <title><?php echo $title; ?></title>
            <link rel="stylesheet" type="text/css" href="css/stylesheet.css" media="all" />
        </head>

        <body>
        <?php

        if ($top_nav) {
            // Top navigation is not necessary for main page
            $this->topNavigation();
        }
    }

    /**
     * Top navigation for logged in users
     */
    private function topNavigation() {
        ?>
        <nav>
            <ul>
                <li><a href="?page=user_main">Home</a></li>
                <li><a href="?page=user_news">News</a></li>
                <li><a href="?page=about">About</a></li>
                <li><a href="?page=contact">Contact</a></li>

                <li class="dropdown right">
                    <a href="#" class="dropbtn">Account</a>
                    <div class="dropdown-content">
                        <a href="?page=user_profile">Profile</a>
                        <a href="?page=user_messages">Messages</a>
                        <a href="?page=login&type=log_out">Log Out</a>
                    </div>
                </li>

                <?php
                if ($_SESSION["type"] == "admin") {
                    ?>
                    <li class="dropdown right">
                        <a href="#" class="dropbtn">Administration</a>
                        <div class="dropdown-content">
                            <a href="?page=admin_news">Add News</a>
                            <a href="?page=admin_messages">Send Message</a>
                            <a href="?page=admin_users">Users</a>
                        </div>
                    </li>
                    <?php
                }
                ?>
            </ul>

        </nav>
        <?php
    }
}