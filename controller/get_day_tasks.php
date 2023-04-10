<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $month = $_POST["month"];
        $year = $_POST["year"];
        $curr_day = intval($_POST["day"]);

        include_once(__DIR__."/get_month_tasks.php");

        if (isset($month_tasks[$curr_day])) {
            $data = $month_tasks[$curr_day];
            
            echo "<table><thead><tr><th>Board</th><th>Name</th><th>Description</th><th>Time</th></tr></thead>";
            echo "<tbody>";

            foreach ($data as [$board_name, $task]) {
                echo "<tr>";
                echo "<td><a class='text-decoration-none link-dark' href=index.php?action=board&board=$board_name>$board_name</a></td>";
                echo "<td>".$task->name."</td>";
                echo "<td>".$task->desc."</td>";
                echo "<td>".$task->due->format("h:m")."</td>";
                echo "</tr>";
            }
            
            echo "</tbody></table>";
        } else {
            echo "";
        }
    }
?>