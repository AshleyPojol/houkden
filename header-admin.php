<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/header.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img src="img/Logo.png" alt="Logo" class="navbar-logo"> 
    <span class="navbar-brand-text">BREWLEAF</span>
  </a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav" class="navbar-background">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="index-admin.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="menu-admin.php">Menu</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Users</a>
      </li>
      <?php if(isset($_SESSION['usertype']) && ($_SESSION['usertype'] == "admin" || $_SESSION['usertype'] == "user")): ?>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php"><?php echo $_SESSION['username']; ?></a>
        </li>
      <?php else: ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>


<div class="container">
  <header>
    <!-- <h1>Welcome to our Website</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
  </header>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/explore.js"></script>
</body>
</html>
