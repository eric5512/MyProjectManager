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

  td.busy {
    background-color: cyan;
  }
</style>

<?php
  $date = new DateTime('now', new DateTimeZone('Europe/Madrid'));
  $year = $date->format('Y');
  $month = $date->format('m');
  $month_name = $date->format('F');
?>

<input type="hidden" id="year-val" value=<?php echo $year ?>>
<h2 id="month-h2" value=<?php echo $month ?>><?php echo $month_name ?></h2>

<button class="btn" id="prev-month"><</button><button class="btn" id="next-month">></button>

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
  <tbody id="calendar">
    <?php
      include_once(ROOT_DIR."/controller/calendar_ym.php");
    ?>
  </tbody>
</table>

<div class="modal fade" id="dayModal" tabindex="-1" aria-labelledby="day-modal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="day-modal"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="day-data">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="./js/calendar.js"></script>