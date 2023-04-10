<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include_once(__DIR__."/../lib/board_util.php");
        
        $board_name = htmlspecialchars($_POST["board"]);
        $desc = htmlspecialchars($_POST["desc"]);

        $board = new Board($board_name, $desc);

        $boards = BoardArray::loadBoards();

        $boards->push($board);

        $boards->storeBoards();

        include_once(__DIR__."/get_boards.php");
    }
?>