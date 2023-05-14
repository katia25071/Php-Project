<head>
    <meta charset="utf-8" />
    <title>Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css" />
</head>



<?php

require 'db.php';
if (isset($_POST['code'])) {
    $code = $_POST['code'];
    $email = $_POST['email'];
    $sql = "select * from users where email='$email'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        $c = $row['verifycode'];
        if ($code == $c) {

            echo "<div class='form'>
                          <h3>You are registered successfully.</h3><br/>
                          <p class='link'>Click here to <a href='login.php'>Login</a></p>
                          </div>";
        } else {
            echo "<div class='form'>
            <h3>The code is not correct. Try again. </h3><br/>
            <p class='link'>Click here to <a href='register.php'>Register</a></p>
            </div>";
            mysqli_query($con, "DELETE FROM `users` WHERE verifycode='$c'");
        }
    }
    } else {
        ?>
        <body>
        <section>
        <form method='POST'>
            <div class='form'>
            <h1 class="login-title">Enter confirmation code:</h1>
                <input type="hidden" name="email" value="<?php echo $_GET['email'] ?>" required>
                <input type="text" class='form-control' name='code' placeholder='Code' required>
                <input type='submit' name='confirm' onclick='myFunction()' value='Confirm' class='login-button'>
            </div>
            <form>
    </section>
    </body>
    <?php
    }


?>