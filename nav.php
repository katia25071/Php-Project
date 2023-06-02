<?php
// session_start();
include('db.php')
  ?>

<head>
  <style>
    .nav-item {
      /* padding-left: 20px; */
      font-family: Arial, Helvetica, sans-serif;
    }

    .navbar-expand-lg {
  background-color: #00458c !important;
}

  </style>
</head>

<?php
$type1 = 'Simpleuser';
$type2 = 'admin';
$type3 = 'Simpleadmin';
// navbar-light bg-light

if (isset($_SESSION['type']) == true) {
  $type = $_SESSION['type'];

  if ($type == $type1) {
    ?>
    <nav class="navbar navbar-expand-lg navbar-light">

      <a class="navbar-brand" href="/project/">
        <img src="/project/images/librari.png " width="100" height="50" alt="EPOKA">

      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" style="margin-right:50px" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" style="color:white" href="/project/books.php">Books</a>
        </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" id="navbarDropdownMenuLink"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="" style="color:white">
              <i class="fa fa-user-circle-o"></i>
              <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'] ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="/project/users/user.php">Dashboard</a>
              <a class="dropdown-item" href="/project/logout.php">LogOut</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <?php

  } else if ($type == $type2 || $type == $type3) {

    ?>
      <nav class="navbar navbar-expand-lg navbar-light ">

        <a class="navbar-brand" >
          <img src="/project/images/librari.png" width="100" height="50" alt="EPOKA">

        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" style="margin-right:50px" id="navbarNavDropdown">
          <ul class="navbar-nav">

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" style="color:white" href="" id="navbarDropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class=" fa fa-user-circle-o "> </i><?php echo " ".$_SESSION['firstname'] . " " . $_SESSION['lastname'] ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="admin.php">Dashboard</a>
                <a class="dropdown-item" href="/project/logout.php">LogOut</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    <?php

  }
} else {
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">

    <a class="navbar-brand" href="/project/">
      <img src="images/librari.png" width="100" height="50" alt="EPOKA">

    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" style="margin-right:50px" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link active" style="color:white" href="books.php">Books</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active " style="color:white" href="" id="navbarDropdownMenuLink" data-toggle="dropdown"
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