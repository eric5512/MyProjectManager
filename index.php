<?php
    $page = $_GET['action'] ?? NULL;
    include_once(__DIR__."/base.php");
    switch ($page) {
        case 'boards':
            include_once(__DIR__."/boards.php");
            break;

        case 'calendar':
            include_once(__DIR__."/calendar.php");
            break;

        case 'board':
            include_once(__DIR__.'/board.php');
            break;

        default:
            include_once(__DIR__."/boards.php");
            break;
    }
    include_once(__DIR__."/footer.php");
?>