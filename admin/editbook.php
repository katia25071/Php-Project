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
    <link rel="stylesheet" href="/project/style/style.css" />

</head>

<?php
include("/Applications/XAMPP/xamppfiles/htdocs/project/authentication.php");

if (isset($_SESSION['type']) &($_SESSION['type']=='admin' || $_SESSION['type']=='Simpleadmin'))  {

    include '/Applications/XAMPP/xamppfiles/htdocs/project/nav.php';
    require('/Applications/XAMPP/xamppfiles/htdocs/project/db.php');


    function display($title, $image, $author, $category, $publisher, $description, $year, $ava)
    {
        ?>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php
                    require '/Applications/XAMPP/xamppfiles/htdocs/project/menu.php';
                    ?>

                    <form class="form" action="" method="post" enctype="multipart/form-data">
                        <h1 class="login-title">BOOKS</h1>
                        <input type="text" class="form-control" name="title" value="<?php echo $title?>" required />
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="image"
                                value="<?php echo $image ?>"  accept=".png, .jpg, .jpeg">
                            <label class="custom-file-label" for="customFile">Select Image</label>
                        </div>
                        <input type="text" class="form-control" name="author" value="<?php echo $author ?>" required>
                        <input type="text" class="form-control" name="publisher" value="<?php echo $publisher ?>" required>
                        <input type="text" class="form-control" name="category" value="<?php echo $category ?>" required>
                        <input class="form-control" name="description" value="<?php echo $description ?>" required></input>
                        <input type="text" class="form-control" name="avail" value="<?php echo $ava ?>"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        <input type="text" class="form-control" name="year" value="<?php echo $year ?>" maxlength="4"
                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                        <input type="submit" name="submit" value="Edit" class="login-button"
                            style="margin-bottom:10px;border-radius:3px" required>

                    </form>
                    <?php
    }

    if (isset($_POST['submit'])) {
        $id = $_GET['id'];
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

     

            $result = mysqli_query($con, "UPDATE books SET title='$title', author='$author', category='$category', publisher='$publisher', description='$description', availability='$ava', image='$filename', year='$year' WHERE bid=$id");
            if ($result) {
                header("Location: adminbooks.php");
            }
        
    } else {

        if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

            $id = $_GET['id'];
            $result = mysqli_query($con, "SELECT * FROM books WHERE bid=$id");
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $image = $row['image'];
            $author = $row['author'];
            $category = $row['category'];
            $publisher = $row['publisher'];
            $description = $row['description'];
            $year = $row['year'];
            $ava = $row['availability'];
            display($title, $image, $author, $category, $publisher, $description, $year, $ava);


        } else {
            echo "Nothing";
        }
    }

    ?>
            </div>
        </div>
    </div>
    <?php
    // require '/Applications/XAMPP/xamppfiles/htdocs/project/footer.php';
    ?>

    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    </body>

    </html>
    <?php
} else {
    header("Location:/project/login.php");
}
?>