  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    
    th, td {
      padding: 8px;
      text-align: center;
    }
    
    th {
      background-color: #ddd;
    }
    
    td {
      border: 1px solid #ddd;
    }
    
    td.today {
      background-color: #eee;
    }
    button {
        visibility: hidden;
        width: 100%;
        height: 100%;
        border: none;
        background-color: transparent;
        cursor: pointer;
      }
  </style>
  <table>
    <thead>
      <tr>
        <th>Mon</th>
        <th>Tue</th>
        <th>Wed</th>
        <th>Thu</th>
        <th>Fri</th>
        <th>Sat</th>
        <th>Sun</th>
      </tr>
    </thead>
    <tbody>
      <?php
        // Get the current year and month
        $year = date('Y');
        $month = date('m');
        
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
              $class = ($dateStr == $todayStr) ? 'today' : '';
              echo "<td class='$class'>$dayNum</td>";
            }
          }
          
          echo '</tr>';
        }

      ?>
    </tbody>
  </table>
</body>
</html>