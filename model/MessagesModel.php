<?php

require_once("UserModel.php");

/**
 * Class MessagesModel
 */
class MessagesModel {

    /**
     * Cleans up tag injection
     *
     * @param string $input
     * @return string
     */
    public function clean($input) {
        return strip_tags($input);
    }

    /**
     * Adds a message to the messages database
     *
     * @param int $user_id
     * @param string $message
     * @param int $sender
     * @return bool
     */
    public function addMessage($user_id, $message, $sender) {
        $data = file_get_contents ("database/messages.json");
        $json = json_decode($data, true);

        end($json); // To move to last element of associative array to be able to use key() method

        $json[] = [
            "id"      => $json[key($json)]["id"] + 1,
            "sent_to" => $user_id,
            "sent_by" => $sender,
            "message" => $message,
            "date"    => date("m-d-Y"),
            "read"    => 0
        ];

        $json = json_encode($json);

        if (!file_put_contents("database/messages.json", $json)) {
            return false;
        }

        return true;
    }

    /**
     * Retrieves unread message for specific user
     *
     * @param int $user_id
     * @return array
     */
    public function getUnreadMessages($user_id) {
        $data = file_get_contents ("database/messages.json");
        $json = json_decode($data, true);

        $unread = array();

        foreach($json as $key => $message) {
            if ($message["sent_to"] == $user_id && $message["read"] == 0) {
                $user_model      = new UserModel();
                $user            = $user_model->getUserDetailsById($message["sent_by"]);
                $message["user"] = $user["name"];
                $unread[]        = $message;
            }
        }

        return $unread;
    }

    /**
     * Removes specific message by message id
     *
     * @param int $id
     */
    public function removeMessage($id) {
        $data = file_get_contents ("database/messages.json");
        $json = json_decode($data, true);

        foreach($json as $key => $value) {
            if ($value["id"] == $id) {
                $json[$key]["read"] = "1";
                $json = json_encode($json);
                file_put_contents("database/messages.json", $json);
                break;
            }
        }
    }
}