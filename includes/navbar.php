<?php 
session_start(); 
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed">
  <div class="container ">
    <a class="navbar-brand " href="index.php">
      <img src="photo/Logo-ai.png" alt="" class='logo-img' style='height:50px;width:auto'>
      INOXI
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php">Collections</a>
        </li>
        <?php 
        if(isset($_SESSION['auth'])) {
          ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['auth_user']['name']; ?> <i class="fa fa-user"></i>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="logout.php">Se déconnecter</a></li>
          </ul>
        </li>
        <?php
        }else {
          ?>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Enregistrer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Connexion</a>
        </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>