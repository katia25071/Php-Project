
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Admin Add Books</title>

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
    <style>
        #customFile,
        label {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <?php
    include("/Applications/XAMPP/xamppfiles/htdocs/project/authentication.php");
    if (isset($_SESSION['type']) &($_SESSION['type']=='admin' || $_SESSION['type']=='Simpleadmin')) {
    include '/Applications/XAMPP/xamppfiles/htdocs/project/nav.php';
    require('/Applications/XAMPP/xamppfiles/htdocs/project/db.php');

    // When form submitted, insert values into the database.


    
    if (isset($_POST['submit'])) {
        $filename = $_FILES["image"]["name"];
        $tempname = $_FILES["image"]["tmp_name"];
        $folder = "/Applications/XAMPP/xamppfiles/htdocs/project/images/$filename";
        move_uploaded_file($tempname, $folder);

        $title = stripslashes($_REQUEST['title']);
        $author = stripslashes($_REQUEST['author']);
        $category = stripslashes($_REQUEST['category']);
        $publisher = stripslashes($_REQUEST['publisher']);
        $description = stripslashes($_REQUEST['description']);
        $ava = stripslashes($_REQUEST['avail']);
        $year = stripslashes($_REQUEST['year']);



        $sql = "SELECT * from books where title='$title'";
        $res = mysqli_query($con, $sql);

        if (mysqli_num_rows($res) > 0) {

            $row = mysqli_fetch_assoc($res);
            if ($title == isset($row['title'])) { 
                echo "<script>alert('The book is already added');</script>";
           
            }

        } else {

         
            $result = mysqli_query($con, "INSERT into `books` (bid, title, image, author, publisher, category,  description, availability,year) VALUES ('0','$title', '$filename','$author', '$publisher','$category', '$description','$ava','$year')");

            if ($result) {

                echo "<script>alert('The book is added succesfully');</script>";
                header("Location:/project/admin/adminbooks.php");

            }


        }

    } else {
        ?>

        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php
                    require '/Applications/XAMPP/xamppfiles/htdocs/project/menu.php';
                    ?>

                    <form class="form" action="" method="post" enctype="multipart/form-data">
                        <h1 class="login-title">BOOKS</h1>
                        <input type="text" class="form-control" name="title" placeholder="Title+Edition" required />
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="image" accept=".png, .jpg, .jpeg" required>
                            <label class="custom-file-label" for="customFile">Select Image</label>
                        </div>

                        <input type="text" class="form-control" name="author" placeholder="Author" required>
                        <input type="text" class="form-control" name="publisher" placeholder="Publisher" required>
                        <input type="text" class="form-control" name="category" placeholder="Category" required>
                        <textarea class="form-control" name="description" placeholder="Description" required></textarea>
                        <input type="text" class="form-control" name="avail" placeholder="Availabilitiy"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        <input type="text" class="form-control" name="year" placeholder="Year" maxlength="4"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        <input type="submit" name="submit" value="ADD" class="login-button"
                            style="margin-bottom:10px;border-radius:3px" required>

                    </form>

                </div>
            </div>
        </div>

        <?php
    }

    require '/Applications/XAMPP/xamppfiles/htdocs/project/footer.php';

    ?>
</body>

<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</html>
<?php
 }else{
    header("Location:/project/login.php");
 }
 ?>