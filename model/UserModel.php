<?php

/**
 * Class UserModel
 */
class UserModel {

    /**
     * Retrieves user details from database and returns it as array for specific username
     *
     * @param string $username
     * @return array
     */
    public function getUserDetails($username) {
        $data = file_get_contents("database/users.json");
        $json = json_decode($data, true);

        $user_data = array();

        foreach ($json as $key => $user_info) {
            if ($user_info["user_name"] == $username) {
                $user_data = $json[$key];
                break;
            }
        }

        return $user_data;
    }

    /**
     * Returns the user details by id
     *
     * @param int $user_id
     * @return array
     */
    public function getUserDetailsById($user_id) {
        $data = file_get_contents("database/users.json");
        $json = json_decode($data, true);

        $user_data = array();

        foreach ($json as $key => $user_info) {
            if ($user_info["id"] == $user_id) {
                $user_data = $json[$key];
                break;
            }
        }

        return $user_data;
    }

    /**
     * Gets all the users details
     *
     * @return array
     */
    public function getAllUsers() {
        $data = file_get_contents("database/users.json");
        $json = json_decode($data, true);

        return $json;
    }

    /**
     * Returns user names and ids
     *
     * @return array
     */
    public function getUserNamesAndIds() {
        $users = $this->getAllUsers();

        $userNamesAndIds = array();

        foreach($users as $key => $user) {
            $userNamesAndIds[$key] = $user["name"];
        }

        return $userNamesAndIds;
    }

    /**
     * Removes specific users from the database
     *
     * @param array $users
     */
    public function removeUsers($users) {
        $data = file_get_contents ("database/users.json");
        $json = json_decode($data, true);

        foreach($users as $user_id) {
            foreach ($json as $key => $user_info) {
                if ($user_info["id"] == $user_id) {
                    unset($json[$key]);
                    break;
                }
            }
        }

        $json = json_encode($json);
        file_put_contents("database/users.json", $json);
    }

    /**
     * Updates the details of a specific user
     *
     * @param array $details
     */
    public function updateUser($details) {
        $data = file_get_contents ("database/users.json");
        $json = json_decode($data, true);

        foreach ($json as $key => $user_info) {
            if ($user_info["user_name"] == $details["user_name"]) {
                $json[$key]["name"]              = $details["name"];
                $json[$key]["password"]          = $details["password"];
                $json[$key]["age"]               = $details["age"];
                $json[$key]["address"]["street"] = $details["street"];
                $json[$key]["address"]["city"]   = $details["city"];
                $json[$key]["address"]["state"]  = $details["state"];
                $json[$key]["address"]["zip"]    = $details["zip"];

                $json = json_encode($json);
                file_put_contents("database/users.json", $json);
                break;
            }
        }
    }

    /**
     * Sanitizes input
     *
     * @param string $input
     * @return string
     */
    public function clean($input) {
        return strip_tags($input);
    }

    /**
     * Checks validity of username
     *
     * @param string $username
     * @return bool
     */
    public function isValidUsername($username) {
        if (strlen($username) > 5) {
            return true;
        }

        return false;
    }

    /**
     * Checks validity of password
     *
     * @param string $password
     * @return bool
     */
    public function isValidPassword($password) {
        if (strlen($password) > 5) {
            return true;
        }

        return false;
    }

    /**
     * Checks to see if the username already exists in the users database
     *
     * @param string $username
     * @return bool
     */
    public function usernameExists($username) {
        $data = file_get_contents("database/users.json");
        $json = json_decode($data, true);

        foreach ($json as $key => $user_info) {
            if ($user_info["user_name"] == $username) {
                return true;
            }
        }

        return false;
    }

    /**
     * Adds user to users database. Sets default values that the user can change later.
     *
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function addUser($username, $password) {
        $data = file_get_contents ("database/users.json");
        $json = json_decode($data, true);

        end($json); // To move to last element of associative array to be able to use key() method

        $id = $json[key($json)]["id"] + 1;

        $json[$id] = [
            "id"        => $id,
            "name"      => "Change Me",
            "user_name" => $username,
            "password"  => $password,
            "type"      => "regular",
            "age"       => 0
        ];

        $json[$id]["address"] = [
            "street" => "Change Me",
            "city"   => "Change Me",
            "state"  => "GA",
            "zip"    => "33333"
        ];

        $json = json_encode($json);

        if (!file_put_contents("database/users.json", $json)) {
            return false;
        }

        return true;
    }
}