<link rel="stylesheet" href="./css/board.css">

<h1 id=title><?php echo $_GET["board"]; ?></h1>

<br>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTaskModal">Add new task</button>

<br><br>

<div class="scrumboard row" id="task-table">
  <?php 
    $board = $_GET["board"];
    include_once(ROOT_DIR."/controller/task_table.php") 
  ?>
</div>

<div class="modal fade" id="createTaskModal" tabindex="-1" aria-labelledby="create-task" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="create-task">Create a new task</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="name">Name: </label>
        <input type="text" name="name" id="new-name" required>
        <br>
        <label for="description">Description: </label><br>
        <textarea form="form-create" name="description" id="new-description" cols="30" rows="10" required></textarea>
        <br>
        <label for="has-date">Does this task has a limit date?</label>
        <input type="checkbox" name="has-date" id="has-date">
        <br>
        <label for="meeting-time">Choose a meeting time:</label>
        <input type="datetime-local" id="due-date" name="due-date" disabled>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="create-new-task" data-bs-dismiss="modal">Create</button>
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
      <div class="modal-body" id="task-date">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" id="remove-task" data-bs-dismiss="modal">Remove</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script src="./js/board.js"></script>