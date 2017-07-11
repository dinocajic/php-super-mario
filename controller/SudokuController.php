<?php

require_once("view/Header.php");
require_once("view/Footer.php");
require_once("view/SudokuView.php");
require_once("model/SudokuModel.php");

/**
 * Class SudokuController
 */
class SudokuController {

    private $_header;
    private $_footer;
    private $_sudoku_model;
    private $_sudoku_view;

    public function __construct(){
        $this->_header       = new Header();
        $this->_footer       = new Footer();
        $this->_sudoku_model = new SudokuModel();
        $this->_sudoku_view  = new SudokuView();
    }

    /**
     * Displays Sudoku puzzle
     */
    public function main() {
        // If the user is not logged in, redirect him/her back to main page
        if (!isset($_SESSION["username"])) {
            header('Location: index.php');
            return;
        }

        $data["title"]        = "Sudoku";
        $data["is_it_solved"] = false;

        if (!isset($_SESSION["sudoku_solved"]) || isset($_GET["start"])) {
            $_SESSION["sudoku_solved"] = $this->_sudoku_model->generateSudokuPuzzle();
        }

        $data["solved"]   = $_SESSION["sudoku_solved"];
        $data["unsolved"] = array();

        if (isset($_POST["submit"])) {
            // Gather input from form and update unsolved
            // Form entries are multidimensional arrays
            for ($i = 0; $i < 9; $i++) {
                $data["unsolved"][$i] = $_POST["unsolved"][$i];
            }

            // Checks to see if it's solved
            $data["is_it_solved"] = $this->_sudoku_model->checkIfSolved($data);
        } else {
            $data["unsolved"] = $this->_sudoku_model->generateUnsolvedPuzzle($data["solved"]);
        }

        $this->_header->main($data["title"], true);
        $this->_sudoku_view->main($data["solved"], $data["unsolved"], $data["is_it_solved"]);
        $this->_footer->main();
    }
}