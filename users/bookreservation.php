<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Reservation</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/project/style/style.css" />
</head>
<?php

include("/Applications/XAMPP/xamppfiles/htdocs/project/authentication.php");
include '/Applications/XAMPP/xamppfiles/htdocs/project/nav.php';
require('/Applications/XAMPP/xamppfiles/htdocs/project/db.php');
if (isset($_GET['id'])) {
    $bid = $_GET['id'];
    $uid = $_GET['user'];
    $result = mysqli_query($con, "Select * from reserve where bid='$bid' and uid='$uid'");
    $result1 = mysqli_query($con, "Select * from issuedbooks where bid='$bid' and uid='$uid' and returns IS NULL");

    if (mysqli_num_rows($result1) > 0) {
        ?>
        <div class='form'>
        <h3>You have already issued this book</h3><br>
            <h4 class='link'><a href='/project/books.php'>Click here to view books</a></h4>
        </div>
        <?php

    } elseif(mysqli_num_rows($result) > 0){
        ?>
        <div class='form'>
        <h3>You have already reserved this book</h3><br>
            <h4 class='link'><a href='/project/books.php'>Click here to view books</a></h4>
        </div>
        <?php
    }else {
        $result = mysqli_query($con, "Select * from books  where bid='$bid' ");
        $row = mysqli_fetch_array($result);

        if ($row['availability'] >0) {
       
            $query = "INSERT into `reserve`(id,bid,uid) VALUES ('0','$bid','$uid')";
            $result = mysqli_query($con, $query);
            $result=mysqli_query($con, "Update books set availability=availability-1 where bid='$bid'");
            if ($result) {
                ?>
                <div class='form'>
                    <h3>BOOK reserved</h3><br>
                    <h4 class='link'><a href='/project/books.php'>Click here to view books</a></h4>
                </div>
                <?php
            }

        }else{
            ?>
            <div class='form'>
            <h3>The book is not availible</h3><br>
            <h4 class='link'><a href='/project/books.php'>Click here to view books</a></h4>
        </div>
        <?php
        }


    }
}
?>