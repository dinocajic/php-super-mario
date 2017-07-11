<?php

require_once("view/Header.php");
require_once("view/Footer.php");
require_once("view/User_profileView.php");
require_once("model/UserModel.php");

/**
 * Class User_profileController
 * Allows for user to edit his/her profile details
 */
class User_profileController {

    private $_header;
    private $_footer;
    private $_user_model;
    private $_user_profile_view;

    public function __construct() {
        $this->_header            = new Header();
        $this->_footer            = new Footer();
        $this->_user_model        = new UserModel();
        $this->_user_profile_view = new User_profileView();
    }

    /**
     * Displays the user details and allows for editing
     */
    public function main() {
        // If the user is not logged in, redirect him/her back to main page
        if (!isset($_SESSION["username"])) {
            header('Location: index.php');
            return;
        }

        $data["updated"] = false;

        if (isset($_GET["type"]) && $_GET["type"] == "update") {
            if (isset($_POST["submit"])) {
                $this->_user_model->updateUser($_POST);
                $data["updated"] = true;
            }
        }

        $data["title"]        = "Manage Users";
        $data["user_details"] = $this->_user_model->getUserDetails($_SESSION["username"]);

        $this->_header->main($data["title"], true);
        $this->_user_profile_view->main($data);
        $this->_footer->main();
    }
}