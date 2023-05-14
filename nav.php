<?php
session_start();
include('db.php')
  ?>

<head>
  <style>
    .nav-item {
      padding-left: 20px;
    }
  </style>
</head>

<?php
$type1='Simpleuser';
$type2='admin';

if (isset($_SESSION['type']) == true){
  $type=$_SESSION['type'];

 if($type== $type1){
  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <a class="navbar-brand" href="home.php">
      <img src="images/logo2.png " width="100" height="50" alt="EPOKA">

    </a>

    <a class="navbar-brand" href="home.php">
    <?php echo
        $_SESSION['type'];?>
        
      </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" style="margin-right:50px" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active" href="books.php">Books</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active " href="" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Account
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="logout.php">LogOUT</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <?php

}else if($type == $type2) {
  
  ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <a class="navbar-brand" href="home.php">
        <img src="images/logo2.png " width="100" height="50" alt="EPOKA">
     
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" style="margin-right:50px" id="navbarNavDropdown">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link active" href="admin.php">Dashboard</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active " href="" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="logout.php">LogOut</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
  <?php

} }else {
  ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

      <a class="navbar-brand" href="home.php">
        <img src="images/logo2.png " width="100" height="50" alt="EPOKA">

      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" style="margin-right:50px" id="navbarNavDropdown">
        <ul class="navbar-nav">

          <li class="nav-item">
            <a class="nav-link active" href="books.php">Books</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active " href="" id="navbarDropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Account
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="register.php">Register</a>
              <a class="dropdown-item" href="login.php">LogIn</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

  <?php
}

?>