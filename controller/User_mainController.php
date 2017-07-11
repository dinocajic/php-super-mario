<?php

require_once("view/Header.php");
require_once("view/Footer.php");
require_once("view/User_mainView.php");
require_once("model/UserModel.php");
require_once("model/TicTacToeModel.php");

/**
 * Class User_mainController
 * Displays the main page when user logs in and processes games on main page
 */
class User_mainController {

    private $_header;
    private $_footer;
    private $_user_model;
    private $_user_main_view;
    private $_tic_tac_toe_model;

    public function __construct() {
        $this->_header            = new Header();
        $this->_footer            = new Footer();
        $this->_user_main_view    = new User_mainView();
        $this->_user_model        = new UserModel();
        $this->_tic_tac_toe_model = new TicTacToeModel();
    }

    /**
     * Displays the main page and processes games
     */
    public function main() {
        // If the user is not logged in, redirect him/her back to main page
        if (!isset($_SESSION["username"])) {
            header('Location: index.php');
            return;
        }

        $data["title"]  = "Welcome";
        $data["user"]   = $this->_user_model->getUserDetails($_SESSION["username"]);
        $data["player"] = false;

        if (isset($_POST["submit"])) {
            $data["player"] = $this->processTicTacToe($data);
        }

        $this->_header->main($data["title"], true);
        $this->_user_main_view->main($data);
        $this->_footer->main();
    }

    /**
     * Processes Tic-Tac-Toe game. Checks to see if a player has won.
     *
     * @param array $data
     * @return bool
     */
    private function processTicTacToe($data) {
        $board = array();

        for ($i = 0; $i < 9; $i++) {
            $board[$i] = $_POST["tic-" . $i];
        }

        $players = array("x", "o");

        if (($player = $this->_tic_tac_toe_model->checkWin($board, $players)) !== false) {
            $data["player"] = $player;
        }

        return $data["player"];
    }
}