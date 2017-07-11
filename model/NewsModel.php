<?php

/**
 * Class NewsModel
 */
class NewsModel {

    /**
     * Cleans the input
     *
     * @param string $input
     * @return string
     */
    public function clean($input) {
        return strip_tags($input);
    }

    /**
     * Retrieves a certain number of news items from the news database.
     * If $num is 0, retrieve all items.
     *
     * @param int $num
     * @return array
     */
    public function getLatestNews($num = 0) {
        $data = file_get_contents ("database/news.json");
        $json = json_decode($data, true);

        $news_data = array();

        $i = 0;

        foreach ($json as $key => $news_info) {
            $news_data[$i] = $json[$key];

            $i++;

            if ($num > 0) {
                if ($i == $num) {
                    break;
                }
            }
        }

        return $news_data;
    }

    /**
     * Removes a specific entry from news database
     *
     * @param int $id
     * @return bool
     */
    public function removeEntry($id) {
        $data = file_get_contents ("database/news.json");
        $json = json_decode($data, true);

        foreach($json as $key => $value) {
            if ($value["id"] == $id) {
                unset($json[$key]);
                $json = json_encode($json);
                file_put_contents("database/news.json", $json);
                return true;
            }
        }

        return false;
    }

    /**
     * Adds an entry to news database
     *
     * @param array $entry
     * @return bool
     */
    public function addEntry($entry) {
        $data = file_get_contents ("database/news.json");
        $json = json_decode($data, true);

        end($json); // To move to last element of associative array to be able to use key() method

        $json[] = [
            "id"            => $json[key($json)]["id"] + 1,
            "title"         => $entry["title"],
            "date"          => $entry["submission_date"],
            "author"        => $entry["author"],
            "submission_by" => $entry["submitted_by"],
            "article"       => $entry["article"]
        ];

        $json = json_encode($json);

        if (!file_put_contents("database/news.json", $json)) {
            return false;
        }

        return true;
    }
}