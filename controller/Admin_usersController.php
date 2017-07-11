<?php

require_once("view/Header.php");
require_once("view/Footer.php");
require_once("model/UserModel.php");
require_once("view/Admin_usersView.php");

/**
 * Class Admin_usersController
 * Delete users from database
 */
class Admin_usersController {

    private $_header;
    private $_footer;
    private $_user_model;
    private $_admin_users_view;

    public function __construct() {
        $this->_header           = new Header();
        $this->_footer           = new Footer();
        $this->_user_model       = new UserModel();
        $this->_admin_users_view = new Admin_usersView();
    }

    /**
     * Displays all non-administrative users and allows for deletion of each
     */
    public function main() {
        // If the user is not logged in, redirect him/her back to main page
        if (!isset($_SESSION["username"]) && $_SESSION["type"] != "admin") {
            header('Location: index.php');
            return;
        }

        if (isset($_GET["type"]) && $_GET["type"] == "remove") {
            if (isset($_POST["submit"])) {
                $this->_user_model->removeUsers($_POST["users_to_delete"]);
            }
        }

        $data["title"] = "Manage Users";
        $data["users"] = $this->_user_model->getAllUsers();

        $this->_header->main($data["title"], true);
        $this->_admin_users_view->main($data);
        $this->_footer->main();
    }
}