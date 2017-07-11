<?php

/**
 * Class ContactModel
 * Contact Details
 */
class ContactModel {

    /**
     * Connects to contact database and returns contact details
     *
     * @return array
     */
    public function getContactDetails() {
        $data = file_get_contents("database/contact.json");
        $json = json_decode($data, true);

        return $json;
    }
}