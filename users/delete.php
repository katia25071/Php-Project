<?php
include("/Applications/XAMPP/xamppfiles/htdocs/project/authentication.php");
include '/Applications/XAMPP/xamppfiles/htdocs/project/nav.php';
require('/Applications/XAMPP/xamppfiles/htdocs/project/db.php');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {

  $id = $_GET['id'];
  $result = mysqli_query($con, "DELETE FROM users where id=$id");
  if($result){
  header("Location: /project/login.php");
  }
} else {
    header("Location: /project/login.php");
}

?>