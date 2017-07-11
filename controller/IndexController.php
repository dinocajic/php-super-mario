<?php

require_once("view/Header.php");
require_once("view/Footer.php");
require_once("view/IndexView.php");

/**
 * Class IndexController
 * Displays the main page
 */
class IndexController {

    private $_index_view;
    private $_header;
    private $_footer;

    public function __construct() {
        $this->_index_view = new IndexView();
        $this->_header     = new Header();
        $this->_footer     = new Footer();
    }

    /**
     * Displays the main page when the visitor first comes to the website
     */
    public function main() {
        if (isset($_SESSION["logged_in"])) {
            header('Location: ?page=user_main');
            return;
        }

        $data["title"] = "PHP: Super Mario";

        $this->_header->main($data["title"]);
        $this->_index_view->main();
        $this->_footer->main();
    }
}