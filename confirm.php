<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Registration</title>
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

    <style>
        #page-content {
            position: fixed;
            bottom: 0;
            width: 100%;

        }
    </style>
</head>

<body>
    <?php
    include 'db.php';
    include 'nav.php';
    if (isset($_POST['confirm'])) {
        $code = $_POST['codes'];
        $c = $_POST['code'];
        $firstname = stripslashes($_POST['firstname']);
        $lastname = stripslashes($_POST['lastname']);
        $phone = stripslashes($_POST['phone']);
        $email = stripslashes($_POST['email']);
        $password = stripslashes($_POST['password']);
        if ($code == $c) {
            $type = "Simpleuser";
            $query = "INSERT into `users` (id, firstname, lastname, type, phoneno, email, password) VALUES ('0000','$firstname','$lastname','$type', '$phone', '$email', '" . md5($password) . "')";
            $result = mysqli_query($con, $query);
          
            if($result){
            echo "
                 <div class='form'>
                 <h3>You are registered successfully.</h3><br/>
                 <p class='link'>Click here to <a href='login.php'>Login</a></p>
                 </div>";
            }
        } else {
            echo "
                 <div class='form'>
                 <h3>The code is not correct. Try again. </h3><br/>
                 <p class='link'>Click here to <a href='register.php'>Register</a></p>
                 </div>";
        }
    }
    ?>
</body>