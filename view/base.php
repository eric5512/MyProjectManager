<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../JQuery/jQuery.js"></script>
    <script src="../JQuery/jquery_ui/jquery-ui.js"></script>

    <title>My Project Manager</title>
    <style>
        body {
            background-color: grey;
        }
    </style>
</head>

<?php 
  include_once(ROOT_DIR."/lib/board_util.php");
  $boards = BoardArray::loadBoards();
?>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/index.php">Project Manager</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/index.php?action=boards">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/index.php?action=calendar">Calendar</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Boards
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
              foreach ($boards as $name => $_) {
                echo "<li><a class=\"dropdown-item\" href=\"/index.php?action=board&board={$name}\">{$name}</a></li>";
              }
            ?>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<br>