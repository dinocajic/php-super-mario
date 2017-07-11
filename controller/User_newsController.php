<?php

require_once("view/Header.php");
require_once("view/Footer.php");
require_once("model/NewsModel.php");
require_once("view/User_newsView.php");

/**
 * Class User_newsController
 * Displays the news
 */
class User_newsController {

    private $_header;
    private $_footer;
    private $_news_model;
    private $_news_view;

    public function __construct() {
        $this->_header     = new Header();
        $this->_footer     = new Footer();
        $this->_news_model = new NewsModel();
        $this->_news_view  = new User_newsView();
    }

    /**
     * Displays the news
     */
    public function main() {
        // If the user is not logged in, redirect him/her back to main page
        if (!isset($_SESSION["username"])) {
            header('Location: index.php');
            return;
        }

        $data["title"]         = "Mario News";
        $data["news_details"]  = $this->_news_model->getLatestNews();

        $this->_header->main($data["title"], true);
        $this->_news_view->main($data);
        $this->_footer->main();
    }
}