<?php

require_once("view/Header.php");
require_once("view/Footer.php");
require_once("view/AboutView.php");

/**
 * Class IndexController
 * Calls the necessary classes to display the about page
 */
class AboutController {

    private $_header;
    private $_footer;
    private $_about_view;

    public function __construct() {
        $this->_header     = new Header();
        $this->_footer     = new Footer();
        $this->_about_view = new AboutView();
    }

    /**
     * Displays the about page
     */
    public function main() {
        // If the user is not logged in, redirect him/her back to main page
        if (!isset($_SESSION["username"])) {
            header('Location: index.php');
            return;
        }

        $data["title"] = "PHP: Super Mario";

        $this->_header->main($data["title"], true);
        $this->_about_view->main();
        $this->_footer->main();
    }
}