<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include_once(__DIR__."/../lib/board_util.php");
        $boards = BoardArray::loadBoards();

        $board = htmlspecialchars($_POST["board"]);
        $task_name = htmlspecialchars($_POST["name"]);
        $desc = htmlspecialchars($_POST["description"]);
        if (isset($_POST["date"])) $task = new Task($task_name, $desc, DateTime::createFromFormat('Y-m-d\TH:i', $_POST["date"]));
        else $task = new Task($task_name, $desc);
        
        $boards[$board]->todo->push($task);
        $boards->storeBoards();
        include_once(__DIR__."/../controller/task_table.php");
    }
?>