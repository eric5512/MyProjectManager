<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include_once(__DIR__."/../lib/board_util.php");
        $boards = BoardArray::loadBoards();

        $board = htmlspecialchars($_POST["board"]);
        $task_name = htmlspecialchars($_POST["name"]);
        $from = $boards[$board]->findTaskCol($task_name);
        $to = htmlspecialchars($_POST["to"]);

        $task = $boards[$board]->$from[$task_name];
        $boards[$board]->$from->remove($task_name);
        $boards[$board]->$to->push($task);
        $boards->storeBoards();

    }
?>