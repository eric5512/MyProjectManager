<?php 
    include_once("../lib/board_util.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $boards = BoardArray::loadBoards();
        $board = htmlspecialchars($_POST["board"]);
        $task = htmlspecialchars($_POST["task"]);
        
        $col = $boards[$board]->findTaskCol($task);
        
        if (!isset($boards[$board]->{$col}[$task]->due)) echo "";
        else echo '<input type="datetime-local" id="due-date" name="due-date" value="'.$boards[$board]->{$col}[$task]->due->format('Y-m-d\TH:i').'" disabled>';
    }
?>