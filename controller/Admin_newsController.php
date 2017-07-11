<?php

require_once("view/Header.php");
require_once("view/Footer.php");
require_once("view/Admin_newsView.php");
require_once("model/NewsModel.php");

/**
 * Class Admin_newsController
 * Add news items
 */
class Admin_newsController {

    private $_header;
    private $_footer;
    private $_admin_news_view;
    private $_admin_news_model;

    public function __construct() {
        $this->_header           = new Header();
        $this->_footer           = new Footer();
        $this->_admin_news_view  = new Admin_newsView();
        $this->_admin_news_model = new NewsModel();
    }

    /**
     * Displays the add news form and allows for deletion of news items
     * Switch statement handles remove and add requests
     */
    public function main() {
        // If the user is not logged in, redirect him/her back to main page
        if (!isset($_SESSION["username"]) && $_SESSION["type"] != "admin") {
            header('Location: index.php');
            return;
        }

        $data["removed_entry"] = false;
        $data["entry_added"]   = false;

        if (isset($_GET["type"])) {
            switch($_GET["type"]) {
                case "remove":
                    $data["removed_entry"] = $this->_admin_news_model->removeEntry($_GET["id"]);
                    break;
                case "add":
                    $data["entry_added"] = $this->addEntry();
                    break;
                default:
                    break;
            }
        }

        $data["title"]        = "The News Room";
        $data["news_entries"] = $this->_admin_news_model->getLatestNews();

        $this->_header->main($data["title"], true);
        $this->_admin_news_view->main($data);
        $this->_footer->main();
    }

    /**
     * Adds entry to news database
     *
     * @return bool
     */
    private function addEntry() {
        if (!isset($_POST["submit"])) {
            return false;
        }

        $data["title"]           = $this->_admin_news_model->clean($_POST["title"]);
        $data["author"]          = $this->_admin_news_model->clean($_POST["author"]);
        $data["submission_date"] = $this->_admin_news_model->clean($_POST["submission_date"]);
        $data["submitted_by"]    = $this->_admin_news_model->clean($_POST["submitted_by"]);
        $data["article"]         = $this->_admin_news_model->clean($_POST{"article"});

        return $this->_admin_news_model->addEntry($data);
    }
}