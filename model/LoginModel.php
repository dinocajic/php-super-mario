<?php

/**
 * Class LoginModel
 */
class LoginModel {

    /**
     * Removes attempt of injection
     *
     * @param string $input
     * @return string
     */
    public function clean($input) {
        return strip_tags($input);
    }

    /**
     * Loops through the users database and returns true if username and password match.
     * Validate registration and set the sessions.
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function attemptLogin($username, $password) {
        $data = file_get_contents ("database/users.json");
        $json = json_decode($data, true);

        $logged_in = false;

        foreach ($json as $key => $user_info) {
            if ($user_info["user_name"] == $username && $user_info["password"] == $password) {
                $_SESSION["logged_in"] = true;
                $_SESSION["username"]  = $username;
                $_SESSION["user_id"]   = $user_info["id"];
                $_SESSION["type"]      = $user_info["type"];

                $logged_in = true;
                break;
            }
        }

        return $logged_in;
    }
}