<?php

include("/Applications/XAMPP/xamppfiles/htdocs/project/authentication.php");
require('/Applications/XAMPP/xamppfiles/htdocs/project/db.php');

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

  $id = $_GET['id'];
  $result = mysqli_query($con, "DELETE FROM review where id=$id");
  header("Location: /project/admin/bookreview.php");
} else {
    header("Location: /project/admin/bookreview.php");
}

?>