<?php

include('db.php');
include("authentication.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

  $id = $_GET['id'];
  
  $result = mysqli_query($con, "DELETE FROM users where id=$id");
  header("Location: adminusers.php");
} else {
  header("Location: adminusers.php");
}

?>