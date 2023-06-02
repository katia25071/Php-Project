<?php
include("/Applications/XAMPP/xamppfiles/htdocs/project/authentication.php");
require('/Applications/XAMPP/xamppfiles/htdocs/project/db.php');

if (isset($_POST['add'])) {
  $id = $_SESSION['id'];
  $bid = $_POST['id'];

  $comment = $_POST['review'];
}
$sql = mysqli_query($con, "Select * from users where id=$id");
$row = mysqli_fetch_array($sql);
$name = $row['firstname'] . " " . $row['lastname'];

$sql = mysqli_query($con, "INSERT into `review` (id, bid, name, review) VALUES ('0','$bid','$name','$comment')");
if ($sql) {
  header("Location:/project/displaybook.php?id=$bid");
}
?>