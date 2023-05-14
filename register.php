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

</head>

<body>
<?php
        require 'nav.php'
        ?>
        <?php
        include('phpmailer/includes/PHPMailer.php');
        include('phpmailer/includes/SMTP.php');
        include('phpmailer/includes/Exception.php');
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;

        require('db.php');
       
        function mails($email)
        {
            $code = rand(0000, 9999);
            $msj = "Verify the account through this code:" . $code;
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPDebug = 1;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            //indico el puerto que usa Gmail 465 or 587
            $mail->Port = 587;
            $mail->Username = "epokalibrary23@gmail.com";
            $mail->Password = "ggbgdanjttcgizeg";
            $mail->SetFrom("epokalibrary23@gmail.com");
            $mail->AddReplyTo("khaveri20@epoka.edu", "Name Replay");
            $mail->Subject = "Account Verification";
            $mail->MsgHTML($msj);
            $mail->AddAddress($email);
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->Send();
            return $code;
        }



        if (isset($_POST['submit'])) {
            $firstname = stripslashes($_POST['firstname']);
            $lastname = stripslashes($_POST['lastname']);
            $phone = stripslashes($_POST['phone']);
            $email = stripslashes($_POST['email']);
            $password = stripslashes($_POST['password']);
            $sql = "select * from users where email='$email'";

            $res = mysqli_query($con, $sql);

            if (mysqli_num_rows($res) > 0) {

                $row = mysqli_fetch_assoc($res);
                if ($email == isset($row['email'])) {
                    echo " 
            <div class='form'>
        <h3>You have an account already.</h3><br/>
        <h4 class='link'><a href='login.php'>Click here to Login</a></h4>
        <h4 class='link'><a href='home.php'>Go to homepage</a> </h4>
        </div>";
                }

            } else {
                $code = mails($email);
                $type="Simpleuser";
                
                $query = "INSERT into `users` (id, firstname, lastname, type, phoneno, email, password,verifycode) VALUES ('0000','$firstname','$lastname','$type', '$phone', '$email', '" . md5($password) . "','$code')";
                $result = mysqli_query($con, $query);
                header("Location:confirmmail.php?email=$email");
            }

        } else {
            ?>
            <form class="form" action="" method="post">
                <h1 class="login-title">Registration</h1>
                    <input type="text" class="form-control" name="firstname" placeholder="Firstname" required />
                    <input type="text" class="form-control" name="lastname" placeholder="Lastname" required />
                    <input type="email" class="form-control" name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                        title="Only epoka email can access" placeholder="Email Adress" required>
                    <input type="tel" class="form-control" name="phone" placeholder="Phone number" title="Format 0698781963"
                        required />
                    <input type="password" class="form-control" name="password" minlength="8"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                        placeholder="Password" required>
                <input type="submit" name="submit" value="Register" style="margin-bottom:15px" class="login-button">
                <h4 class='link'><a href='login.php'>Click here to Login</a></h4>
                <h4 class='link'><a href='home.php'>Go to homepage</a> </h4>

            </form>


     
        <?php
        }
      require 'footer.php';
        ?>
</body>

</html>
