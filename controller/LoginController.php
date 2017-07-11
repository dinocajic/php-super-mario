<?php

require_once("model/LoginModel.php");

/**
 * Class LoginController
 * Processes user login/logout
 */
class LoginController {

    private $_login_model;

    public function __construct() {
        $this->_login_model = new LoginModel();
    }

    /**
     * Check to see if the user is on the log-out page. If so, log the user out.
     * Check to see if the user is logged in; if is, there's no need to log the user in again.
     * Validate the login username and password and redirect him/her to logged-in page.
     * Otherwise, display page stating that the user could not be logged in.
     */
    public function main() {
        if (isset($_GET["type"]) && $_GET["type"] == "log_out") {
            // For logging out
            $this->logout();
            return;
        }

        if (isset($_SESSION["logged_in"])) {
            // If user is logged in, there's no need to log him/her in again
            header('Location: ?page=user_main');
            return;
        }

        if (!isset($_POST["login"])) {
            // Did the user press login button
            header('Location: index.php');
            return;
        }

        // Make sure no injection
        $username = $this->_login_model->clean($_POST["username"]);
        $password = $this->_login_model->clean($_POST["password"]);

        if ($this->_login_model->attemptLogin($username, $password)) {
            // Validate registration and set the sessions
            // Direct user to logged in page
            header('Location: ?page=user_main');
            return;
        }

        require_once("view/Header.php");
        require_once("view/Footer.php");

        $header = new Header();
        $footer = new Footer();

        $header->main("Not Logged in");
        ?>
        <div id="wrapper">
            Could not log you in. <a href="index.php">Try again</a>.
            If you don't have an account, please <a href="?page=register">register</a>.
        </div>
        <?php
        $footer->main();

    }

    /**
     * Logs the user out
     */
    private function logout() {
        session_destroy();
        header('Location: index.php');
    }
}