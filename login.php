<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Login</title>
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
    <link rel="stylesheet" href="style/style.css" />
</head>


<body>
 
        <?php
        require 'nav.php';
        require('db.php');
        //session_start();
        // When form submitted, check and create user session.
        if (isset($_POST['email'])) {
            $email = stripslashes($_POST['email']); // removes backslashes
            $password = stripslashes($_POST['password']);

            // Check user is exist in the database
            $query = "SELECT * FROM `users` WHERE email='$email'
                     AND password='" . md5($password) . "'";
            $result = mysqli_query($con, $query);
            $rows = mysqli_num_rows($result);
            $row = mysqli_fetch_assoc($result);

            if ($rows == 1) {
                $type = $row['type'];
                $_SESSION['id']=$row['id'];
                $_SESSION['type']=$type;
                $_SESSION['firstname']=$row['firstname'];
                $_SESSION['lastname']=$row['lastname'];
                if ($type == "admin") {
                    header("Location: admin.php");
                } else {
                    header("Location: user.php");
                }
            } else {
                echo "
      
            <div class='form'>
                  <h3>Incorrect email/password.</h3><br/>
                  <h4 class='link'><a href='login.php'>Click here to Login</a></h4>
            <h4 class='link'><a href='home.php'>Go to homepage</a> </h4>
                  ";
            }
        } else {
            ?>


            <form class="form" method="post" name="login">
                <h1 class="login-title">Log In</h1>
                <input type="text" class="form-control" name="email" placeholder="Username" autofocus="true" required>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <input type="submit" value="Login" name="submit" class="login-button" style="margin-bottom:15px">
                <h4 class='link'><a href='register.php'>Click here to Register</a></h4>
                <h4 class='link'><a href='home.php'>Go to homepage</a> </h4>
            </form>

            


        

        <?php
        }
        // include('footer.php');
        ?>

</body>
<?php

?>

</html>