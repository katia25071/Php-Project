
<!DOCTYPE HTML>
<html>

<head>
    <title>Add Admin</title>
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

<body>
    <?php

 

    include("/Applications/XAMPP/xamppfiles/htdocs/project/authentication.php");
    if (isset($_SESSION['type']) &($_SESSION['type']=='admin' || $_SESSION['type']=='Simpleadmin')) {
    include '/Applications/XAMPP/xamppfiles/htdocs/project/nav.php';
    require('/Applications/XAMPP/xamppfiles/htdocs/project/db.php');
    ?>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php
                require '/Applications/XAMPP/xamppfiles/htdocs/project/menu.php';
                ?>
                <form class="form" action="" method="post">
                    <h1 class="login-title">Registration</h1>
                    <input type="text" class="form-control" name="firstname" placeholder="Firstname" required />
                    <input type="text" class="form-control" name="lastname" placeholder="Lastname" required />
                    <input type="email" class="form-control" name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                        title="Only epoka email can access" placeholder="Email Adress" required>
                    <input type="tel" class="form-control" name="phone" placeholder="Phone number"
                        title="Format 0698781963"
                        oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                        required />
                    <input type="password" class="form-control" name="password" minlength="8"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                        placeholder="Password" required>
                    <input type="submit" name="submit" value="Register" style="margin-bottom:15px" class="login-button">
                </form>
            </div>
        </div>
    </div>
<?php require '/Applications/XAMPP/xamppfiles/htdocs/project/footer.php';?>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $firstname = stripslashes($_POST['firstname']);
    $lastname = stripslashes($_POST['lastname']);
    $phone = stripslashes($_POST['phone']);
    $email = stripslashes($_POST['email']);
    $password = stripslashes($_POST['password']);
    $sql=mysqli_query($con,"Select * from users where email='$email'");
    $rows=mysqli_num_rows($sql);
    if($rows>0){
        echo "<script>alert('This email is taken');</script>";
    }else{
        $type = "Simpleadmin";
        $query = "INSERT into `users` (id, firstname, lastname, type, phoneno, email, password) VALUES ('0000','$firstname','$lastname','$type', '$phone', '$email', '" . md5($password) . "')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>alert('The new admin is registered succesfully');</script>";
        }else{
            echo "<script>alert('The new admin could not be registered');</script>";
          
        }
    }
   
}

 }else{
    header("Location:/project/login.php");
 }

?>