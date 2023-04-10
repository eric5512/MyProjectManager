<?php 
    include_once(__DIR__."/../lib/board_util.php");
    if (!isset($boards)) $boards = BoardArray::loadBoards();
    foreach ($boards as $board) {
        echo "<div class=\"col\">";
        echo "<div class=\"card\" style=\"width: 18rem;\">";
        echo "<div class=\"card-body\">";
        echo "<h5 class=\"card-title\">{$board->name}</h5>";
        echo "<p class=\"card-text\">{$board->desc}</p>";
        echo "<a href=\"/index.php?action=board&board={$board->name}\" class=\"btn btn-primary\">Go to board</a>";
        echo "<br>";
        echo "<button type=\"button\" value=\"{$board->name}\" class=\"btn btn-danger toggle-remove remove-board\" style=\"display: none\">Remove</a>";
        echo "</div></div></div>";
    }
?>