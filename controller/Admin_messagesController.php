<?php

require_once("view/Header.php");
require_once("view/Footer.php");
require_once("view/Admin_messagesView.php");
require_once("model/UserModel.php");
require_once("model/MessagesModel.php");

/**
 * Class Admin_messagesController
 * Send messages to other users
 */
class Admin_messagesController {

    private $_header;
    private $_footer;
    private $_user_model;
    private $_admin_messages_view;
    private $_admin_messages_model;

    public function __construct() {
        $this->_header               = new Header();
        $this->_footer               = new Footer();
        $this->_user_model           = new UserModel();
        $this->_admin_messages_view  = new Admin_messagesView();
        $this->_admin_messages_model = new MessagesModel();
    }

    /**
     * Call the Admin_messagesView to display the form.
     * On submit, process adding the message to the database.
     */
    public function main() {
        // If the user is not logged in, and not an admin, redirect him/her back to main page
        if (!isset($_SESSION["username"]) && $_SESSION["type"] != "admin") {
            header('Location: index.php');
            return;
        }

        $data["message_added"] = false;

        if (isset($_POST["submit"]) && isset($_GET["type"]) && $_GET["type"] == "add") {
            $user    = $this->_admin_messages_model->clean($_POST["user"]);
            $message = $this->_admin_messages_model->clean($_POST["message"]);

            $data["message_added"] = $this->_admin_messages_model->addMessage($user, $message, $_SESSION["user_id"]);
        }

        $data["title"] = "Send Messages";
        $data["users"] = $this->_user_model->getUserNamesAndIds(); // To display in drop-down

        $this->_header->main($data["title"], true);
        $this->_admin_messages_view->main($data);
        $this->_footer->main();
    }
}