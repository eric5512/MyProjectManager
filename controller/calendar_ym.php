<?php
    if (isset($_POST["month"]) && isset($_POST["year"])) {
        $month = $_POST["month"];
        $year = $_POST["year"];
    }

    // Get the important dates in the month and year
    include_once(__DIR__."/get_month_tasks.php");
    

    // Get the number of days in the current month
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    
    // Get the day of the week for the first day of the month
    $firstDayOfWeek = date('N', strtotime("$year-$month-01"));
    
    // Calculate the number of rows needed
    $numRows = ceil(($daysInMonth + $firstDayOfWeek - 1) / 7);
    
    // Loop through each row
    for ($row = 1; $row <= $numRows; $row++) {
        echo '<tr>';
        
        // Loop through each day of the week
        for ($col = 1; $col <= 7; $col++) {
            // Calculate the day number for this cell
            $dayNum = ($row - 1) * 7 + $col - $firstDayOfWeek + 1;
            
            // Check if this cell is in the current month
            if ($dayNum < 1 || $dayNum > $daysInMonth) {
            // This cell is outside the current month, so leave it blank
            echo '<td>&nbsp;</td>';
            } else {
            // This cell is in the current month, so display the day number
            $dateStr = sprintf('%04d-%02d-%02d', $year, $month, $dayNum);
            $todayStr = date('Y-m-d');
            $class = ($dateStr == $todayStr) ? 'today' : ((array_key_exists($dayNum, $month_tasks)) ? 'busy' : '');
            echo "<td class='$class'><button class='btn day-btn' type='button' value=$dayNum data-bs-toggle='modal' data-bs-target='#dayModal' class='day-btn'>$dayNum</button></td>";
            }
        }
        
        echo '</tr>';
    }
?>