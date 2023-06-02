<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
        rel='stylesheet'>
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

    <style>
        .row .card {
            margin-left: 200px;
        }

        @media only screen and (max-width: 1000px) {

            .row .card {
                margin: auto;
                width: 50%;
                padding: 10px;
            }
        }
    </style>
</head>


<body>
    <?php

    include("/Applications/XAMPP/xamppfiles/htdocs/project/authentication.php");
    include '/Applications/XAMPP/xamppfiles/htdocs/project/nav.php';
    require('/Applications/XAMPP/xamppfiles/htdocs/project/db.php');
    // require('/Applications/XAMPP/xamppfiles/htdocs/project/sessionend.php');
    
    if ($_SESSION['type'] = 'Simpleuser') {
        // echo "<script type='text/javascript'>alert('Access Accepted!!!')</script>";
        ?>
        <div class="wrapper">
            <div class="container" style="margin-left:0">
                <div class="row">

                    <?php
                    require '/Applications/XAMPP/xamppfiles/htdocs/project/menu.php';
                    ?>

                    <div class="card">

                        <img class="card-img-top" src="/project/images/profile.jpeg" alt="Card image cap">
                        <div class="card-body">
                            <?php
                            $id = $_SESSION['id'];
                            $sql = "select * from users where id=$id";
                            $result = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($result);
                            $name = $row['firstname'];
                            $lastname = $row['lastname'];
                            $email = $row['email'];
                            $phone = $row['phoneno'];
                            ?>
                            <h5 class="card-title">
                                <?php echo "<b>ID: </b>". $id ?>
                            </h5>
                            <h5 class="card-title">
                                <?php echo "<b>Name: </b>". $name ." ".$lastname ?>
                            </h5>
                            <p class="card-text"><b>Email ID: </b>
                                <?php echo $email ?>
                            </p>
                            <p class="card-text">
                            <p><b>Mobile number: </b>
                                <?php echo $phone ?>
                            </p>
                            <a href="/project/useredit.php?id=<?php echo $id ?>" class="btn btn-primary ">Edit</a>
                            <a class="btn btn-danger" style="color:white" onclick='f()'>Delete</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        <?php
        require '/Applications/XAMPP/xamppfiles/htdocs/project/footer.php';
        ?>
        <script>
            function f() {
                if (confirm("Are you sure you want to delete this book?")) {
                    window.location.href = "delete.php?id=<?php echo $id ?>";
                }
            }
        </script>
    </body>
    <?php
    }
    ?>