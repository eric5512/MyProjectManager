<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#newBoardModal">New board</button>
<div class="container">
  <div class="row row-cols-3">
    <?php 
    foreach ($boards as $name => $attrs) {
        echo "<div class=\"col\"><div class=\"card\" style=\"width: 18rem;\"><div class=\"card-body\"><h5 class=\"card-title\">{$name}</h5><p class=\"card-text\">{$attrs[0]}</p><a href=\"#\" class=\"btn btn-primary stretched-link\">Go to board</a></div></div></div>";
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
      <form id="form-create" action="#" method="post">
      <div class="modal-body">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
        <br>
        <label for="description">Description: </label><br>
        <textarea form="form-create" name="description" id="description" cols="30" rows="10"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <input type="button" value="Create Board" class="btn btn-primary">
      </div>
      </form>
    </div>
  </div>
</div>