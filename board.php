<link rel="stylesheet" href="./css/board.css">

<h1 id=title><?php echo $_GET["board"] ?></h1>

<br>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTaskModal">Add new task</button>

<div class="scrumboard row">
<div class="column flex" value=todo>
	<h1>Todo</h1>
    <?php 
        foreach ($boards[$_GET["board"]]["cols"]["todo"] as $task => $_) {
            echo '<div class="portlet card" style="background-color:powderblue;">';
            echo "<div class=\"portlet-header\"><h4 class=\"text-center\">{$task}</h4><button type=\"button\" class=\"stretched-link btn task-modal\" data-bs-toggle=\"modal\" data-bs-target=\"#taskModal\" value=\"{$task}\"></button></div>"; 
            echo '</div>';
        }
    ?>
</div>
 
<div class="column flex" value=progress>
	<h1>In progress</h1>
    <?php 
        foreach ($boards[$_GET["board"]]["cols"]["progress"] as $task => $_) {
            echo '<div class="portlet card" style="background-color:powderblue;">';
            echo "<div class=\"portlet-header\"><h4 class=\"text-center\">{$task}</h4><button type=\"button\" class=\"stretched-link btn task-modal\" data-bs-toggle=\"modal\" data-bs-target=\"#taskModal\" value=\"{$task}\"></button></div>"; 
            echo '</div>';
        }
    ?>
</div>

<div class="column flex" value=test>
	<h1>Test</h1>
    <?php 
        foreach ($boards[$_GET["board"]]["cols"]["test"] as $task => $_) {
            echo '<div class="portlet card" style="background-color:powderblue;">';
            echo "<div class=\"portlet-header\"><h4 class=\"text-center\">{$task}</h4><button type=\"button\" class=\"stretched-link btn task-modal\" data-bs-toggle=\"modal\" data-bs-target=\"#taskModal\" value=\"{$task}\"></button></div>"; 
            echo '</div>';
        }
    ?>
</div>

<div class="column flex" value=done>
	<h1>Done</h1>
    <?php 
        foreach ($boards[$_GET["board"]]["cols"]["done"] as $task => $_) {
            echo '<div class="portlet card" style="background-color:powderblue;">';
            echo "<div class=\"portlet-header\"><h4 class=\"text-center\">{$task}</h4><button type=\"button\" class=\"stretched-link btn task-modal\" data-bs-toggle=\"modal\" data-bs-target=\"#taskModal\" value=\"{$task}\"></button></div>"; 
            echo '</div>';
        }
    ?>
</div>
</div>

<div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="create-task" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="create-task">Create a new task</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="new-task-desc">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="task-name" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="task-name"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="task-desc">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="./js/board.js"></script>