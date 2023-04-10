<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!array_key_exists("remove", $_POST)) {
      $name = htmlspecialchars($_POST["name"]);
      $description = htmlspecialchars($_POST["description"]);
      if (BoardArray::storeNewBoard(new Board($name, $description)) === FALSE) {
        echo '<script>alert("There is a table with that name already")</script>';
      }
    } else {
      $name = htmlspecialchars($_POST["remove"]);
      if (BoardArray::removeBoard($name) === FALSE) {
        echo '<script>alert("There isn\'t any table with that name")</script>';

      }
    }
    echo '<meta http-equiv="refresh" content="1">';
  }
?>
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#newBoardModal">New board</button>
<button type="button" onclick="$('.toggle-remove').toggle();" class="btn btn-warning" id="remove-boards">Remove board</button>
<br><br><br>
<div class="container">
  <div class="row row-cols-3">
    <?php
      foreach (BoardArray::loadBoards() as $board) {
          echo "<div class=\"col\"><div class=\"card\" style=\"width: 18rem;\"><div class=\"card-body\"><h5 class=\"card-title\">{$board->name}</h5><p class=\"card-text\">{$board->desc}</p><a href=\"/index.php?action=board&board={$board->name}\" class=\"btn btn-primary\">Go to board</a><br><form \"".htmlspecialchars($_SERVER["PHP_SELF"])."\" method=\"post\"><input type=\"hidden\" name=\"remove\" value=\"{$board->name}\" /><button type=\"submit\" class=\"btn btn-danger toggle-remove\" style=\"display: none\">Remove</a></form></div></div></div>";
      }
    ?>
  </div>
</div>

<div class="modal fade" id="newBoardModal" tabindex="-1" aria-labelledby="newBoardModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newBoardModalLabel">Create new board</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="form-create" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <div class="modal-body">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="description">Description: </label><br>
        <textarea form="form-create" name="description" id="description" cols="30" rows="10" required></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <input type="submit" value="Create Board" class="btn btn-primary">
        
      </div>
      </form>
    </div>
  </div>
</div>