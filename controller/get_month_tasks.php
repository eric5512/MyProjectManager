<?php 
    $beg = new DateTime($year.'-'.$month.'-01');
    if($month == 12) {
        $end = new DateTime(($year+1).'-01-01');
    } else {
        $end = new DateTime($year.'-'.($month+1).'-01');
    }

    include_once(__DIR__."/../lib/board_util.php");

    $boards = BoardArray::loadBoards();

    $month_tasks = [];
    foreach($boards as $board) {
        foreach ($board->allTasks() as $task) {
            if (isset($task->due) && $task->due < $end && $task->due >= $beg) {
                $day = intval($task->due->format("d"));
                if (isset($month_tasks[$day])) {
                    array_push($month_tasks[$day], [$board->name, $task]);
                } else {
                    $month_tasks[$day] = [[$board->name, $task]];
                }
            }
        }
    }
?>