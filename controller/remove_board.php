<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include_once(__DIR__."/../lib/board_util.php");
        
        $board_name = htmlspecialchars($_POST["board"]);

        BoardArray::removeBoard($board_name);

        include_once(__DIR__."/get_boards.php");
    }
?>