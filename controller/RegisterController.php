<?php

require_once("view/Header.php");
require_once("view/Footer.php");
require_once("view/RegisterView.php");
require_once("model/UserModel.php");

/**
 * Class RegisterController
 * Allows for user registration to website
 */
class RegisterController {

    private $_header;
    private $_footer;
    private $_register_view;
    private $_user_model;

    public function __construct() {
        $this->_header        = new Header();
        $this->_footer        = new Footer();
        $this->_register_view = new RegisterView();
        $this->_user_model    = new UserModel();
    }

    /**
     * Displays registration form and processes registration requests
     */
    public function main() {
        // No need to be able to register again if user is logged in already
        if (isset($_SESSION["logged_in"])) {
            header('Location: ?page=user_main');
            return;
        }

        $data["title"]  = "Register for Account";
        $data["errors"] = false;
        $data["added"]  = false;

        // Process registration submission
        if (isset($_POST['submit'])) {
            $username = $this->_user_model->clean($_POST["user_name"]);
            $password = $this->_user_model->clean($_POST["password"]);

            $errors = $this->checkEntry($username, $password);

            if (count($errors) != 0) {
                $data["errors"] = $errors;
            } else {
                $data["added"] = $this->_user_model->addUser($username, $password);
            }
        }

        $this->_header->main($data["title"]);
        $this->_register_view->main($data);
        $this->_footer->main();
    }

    /**
     * Checks to see if the username/password entries are valid
     *
     * @param string $username
     * @param string $password
     * @return array
     */
    private function checkEntry($username, $password) {
        $errors = array();

        if (!$this->_user_model->isValidUsername($username)) {
            $errors[] = "Invalid username (Alpha-numeric with 5+ characters)";
        }

        if (!$this->_user_model->isValidPassword($password)) {
            $errors[] = "Invalid password (Must be 5+ characters)";
        }

        if ($this->_user_model->usernameExists($username)) {
            $errors[] = "You must choose a different username";
        }

        return $errors;
    }
}