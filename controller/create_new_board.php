<?php 
    include_once(ROOT_DIR."/board_util.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $boards = BoardArray::loadBoards();
        $board = htmlspecialchars($_POST["board"]);
        $desc = $boards[$board]->{$col}->{$task};
        if ($desc === NULL) {
            exit();
        }
        echo $desc;
    }
?>