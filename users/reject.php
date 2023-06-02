<?php
include("/Applications/XAMPP/xamppfiles/htdocs/project/authentication.php");
include '/Applications/XAMPP/xamppfiles/htdocs/project/nav.php';
require('/Applications/XAMPP/xamppfiles/htdocs/project/db.php');
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $uid=$_SESSION['id'];
  $bid = $_GET['id'];
  $result = mysqli_query($con, "DELETE FROM reserve where bid=$bid and uid=$uid");
  $sql=mysqli_query($con, "Update books set availability=availability+1 where bid='$bid'");
  if($result){
  header("Location: /project/users/reserved.php");
  }
} else {
    header("Location: /project/users/reserved.php");
}

?>