<?php 
    include_once("../lib/board_util.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $boards = BoardArray::loadBoards();
        $board = htmlspecialchars($_POST["board"]);
        $task = htmlspecialchars($_POST["task"]);
        $col = $boards[$board]->findTaskCol($task);
        $desc = $boards[$board]->{$col}[$task]->desc;
        if ($desc === NULL) {
            exit();
        }
        echo $desc;
    }
?>