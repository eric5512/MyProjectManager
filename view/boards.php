<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#newBoardModal">New board</button>
<button type="button" onclick="$('.toggle-remove').toggle();" class="btn btn-warning" id="remove-boards">Remove board</button>
<br><br><br>
<div class="container">
  <div class="row row-cols-3" id="board-cards">
    <?php include_once(ROOT_DIR."/controller/get_boards.php") ?>
  </div>
</div>

<div class="modal fade" id="newBoardModal" tabindex="-1" aria-labelledby="newBoardModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newBoardModalLabel">Create new board</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <label for="name">Name: </label>
        <input type="text" name="name" id="new-board-name" required>
        <br>
        <label for="description">Description: </label><br>
        <textarea form="form-create" name="description" id="new-board-description" cols="30" rows="10" required></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <input type="button" id="create-board" data-bs-dismiss="modal" value="Create Board" class="btn btn-primary">
      </div>
    </div>
  </div>
</div>

<script src="../js/boards.js"></script>