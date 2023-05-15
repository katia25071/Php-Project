<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8" />
        <title>Home</title>
        <link rel="icon" href="images/logo2.png" type="image/icon type">
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

<?php
include('db.php');
include('authentication.php');
include('nav.php');

function display($id, $name, $lastname, $email, $phone)
{
    ?>
    <body>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php
                    include 'menu.php';
                    ?>
                    <form class="form" action="" method="post">
                        <h1 class="login-title">User</h1>
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <input type="text" class="form-control" name="firstname" placeholder="Firstname"
                            value="<?php echo $name ?>" required />
                        <input type="text" class="form-control" name="lastname" placeholder="Lastname"
                            value="<?php echo $lastname ?>" required />
                        <input type="email" class="form-control" name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+"
                            title="Only epoka email can access" placeholder="Email Adress" value="<?php echo $email ?>"
                            required>
                        <input type="tel" class="form-control" name="phone" placeholder="Phone number"
                            title="Format 0698781963"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                            value="<?php echo $phone ?>" required />
                        <input type="submit" name="submit" value="Edit" style="margin-bottom:15px" class="login-button">
                        <!-- <h4 class='link'><a href='login.php'>Click here to Login</a></h4>
            <h4 class='link'><a href='home.php'>Go to homepage</a> </h4> -->
                    </form>

                    <?php
}

if (isset($_POST['submit'])) {
    $firstname = stripslashes($_POST['firstname']);
    $lastname = stripslashes($_POST['lastname']);
    $phone = stripslashes($_POST['phone']);
    $email = stripslashes($_POST['email']);
    // $password = stripslashes($_POST['password']);

    mysqli_query($con, "UPDATE users SET firstname='$firstname', lastname='$lastname', phoneno='$phone', email='$email'");

    header("Location: admin.php");
} else {
    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

        $id = $_GET['id'];
        $result = mysqli_query($con, "SELECT * FROM users WHERE id=$id");
        $row = mysqli_fetch_array($result);


        if ($row) {
            $name = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $phone = $row['phoneno'];
            display($id, $name, $lastname, $email, $phone);
        }

    }
}
?>
            </div>
        </div>
    </div>
</body>