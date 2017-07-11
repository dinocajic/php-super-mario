<?php
/**
 * Configuration File
 * Do not edit below the specified line
 */
class Config {

    /**
     * Any time a new page is created, this array needs to be modified
     * 
     * @var array
     */
    private $_pages = array(
        "about",
        "admin_messages",
        "admin_news",
        "admin_users",
        "contact",
        "login",
        "log_out",
        "register",
        "sudoku",
        "user_main",
        "user_messages",
        "user_news",
        "user_profile"
    );

    /******************************************************************************************************************
     * Do not modify below this line                                                                                  *
     ******************************************************************************************************************/

    /**
     * Returns the available pages
     *
     * @return array
     */
    public function getPages() {
        return $this->_pages;
    }
}