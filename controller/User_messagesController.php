<?php

require_once("view/Header.php");
require_once("view/Footer.php");
require_once("model/MessagesModel.php");
require_once("view/User_messagesView.php");

class User_messagesController {

    private $_header;
    private $_footer;
    private $_messages_model;
    private $_user_messages_view;

    public function __construct() {
        $this->_header             = new Header();
        $this->_footer             = new Footer();
        $this->_messages_model     = new MessagesModel();
        $this->_user_messages_view = new User_messagesView();
    }

    /**
     * Displays the messages for the logged-in user
     */
    public function main() {
        // If the user is not logged in, redirect him/her back to main page
        if (!isset($_SESSION["username"])) {
            header('Location: index.php');
            return;
        }

        if (isset($_GET["type"]) && $_GET["type"] == "remove") {
            $this->_messages_model->removeMessage($_GET["id"]);
        }

        $data["title"]    = "Messages";
        $data["messages"] = $this->_messages_model->getUnreadMessages($_SESSION["user_id"]);

        $this->_header->main($data["title"], true);
        $this->_user_messages_view->main($data["messages"]);
        $this->_footer->main();
    }
}