<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include_once(__DIR__."/../lib/board_util.php");
        $boards = BoardArray::loadBoards();

        $board = htmlspecialchars($_POST["board"]);
        $task_name = htmlspecialchars($_POST["name"]);
        $col = $boards[$board]->findTaskCol($task_name);
        $boards[$board]->$col->remove($task_name);
        $boards->storeBoards();
        
        include_once(__DIR__."/../controller/task_table.php");
    }
?>