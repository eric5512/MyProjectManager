<?php
    $page = $_GET['action'] ?? NULL;
    const ROOT_DIR = __DIR__;
    include_once(ROOT_DIR."/view/base.php");
    switch ($page) {
        case 'boards':
            include_once(ROOT_DIR."/view/boards.php");
            break;

        case 'calendar':
            include_once(ROOT_DIR."/view/calendar.php");
            break;

        case 'board':
            include_once(ROOT_DIR.'/view/board.php');
            break;

        default:
            include_once(ROOT_DIR."/view/boards.php");
            break;
    }
    include_once(ROOT_DIR."/view/footer.php");
?>