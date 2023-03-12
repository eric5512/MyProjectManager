<?php 
    include_once(__DIR__."/csv.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $boards = parseBoards();
        $board = htmlspecialchars($_POST["board"]);
        $col = htmlspecialchars($_POST["col"]);
        $task = htmlspecialchars($_POST["task"]);
        $desc = $boards[$board]["cols"][$col][$task];
        if ($desc === NULL) {
            exit();
        }
        echo $desc;
    }
?>