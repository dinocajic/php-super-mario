<?php

require_once("view/Header.php");
require_once("view/Footer.php");
require_once("model/ContactModel.php");
require_once("view/ContactView.php");

/**
 * Class ContactController
 * Displays the contact page
 */
class ContactController {

    private $_header;
    private $_footer;
    private $_contact_model;
    private $_contact_view;

    public function __construct() {
        $this->_header        = new Header();
        $this->_footer        = new Footer();
        $this->_contact_model = new ContactModel();
        $this->_contact_view  = new ContactView();
    }

    /**
     * Displays the contact page to logged in users
     */
    public function main() {
        // If the user is not logged in, redirect him/her back to main page
        if (!isset($_SESSION["username"])) {
            header('Location: index.php');
            return;
        }

        $data["title"]   = "Contact";
        $contact_details = $this->_contact_model->getContactDetails();

        $data["org_name"] = $contact_details[0]["name"];
        $data["email"]    = $contact_details[0]["email"];
        $data["address"]  = $contact_details[0]["address"]["street"] . ", ".
                            $contact_details[0]["address"]["city"] . ", " .
                            $contact_details[0]["address"]["state"] . " " .
                            $contact_details[0]["address"]["zip"];

        $this->_header->main($data["title"], true);
        $this->_contact_view->main($data);
        $this->_footer->main();
    }
}