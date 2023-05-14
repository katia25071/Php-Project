<html>

<head>

    <meta charset="utf-8" />
    <title>Admin Books</title>


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

<style>
    th {
        text-align: center;
    }

    td {
        text-align: center !important;
        vertical-align: middle !important;
    }
</style>

<script>

    function ConfirmDelete() {
        return confirm("Are you sure you want to delete this book?");
    }

</script>

<?php
require 'db.php';
// include("auth.php");
?>

<html>

<body style="background-image: url(image/bg.png)">

    <?php
    require 'nav.php'; ?>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php
                $sql = mysqli_query($con, "SELECT * from books");
                ?>

                <form action="" method="POST">
                    <div class="input-group">
                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                            aria-describedby="search-addon" name="search">
                        <button type="button" class="btn btn-outline-primary" name="submit">search</button>
                    </div>
                </form>





                <table class="table" style="border:2px solid black; margin-left:100px; background-color:#fff;">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Pages</th>
                            <th scope="col">Description</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <?php
                    if (isset($_POST['search']) && isset($_POST['submit'])) {
                        $search = htmlspecialchars(($_POST['search']));
                        $sql = mysqli_query($con, "SELECT * from books where id like'%$search%' or title like'%$search%' or author like '%$search%' or category like '%$search%' ");
                        while ($row = mysqli_fetch_array($sql)) {
                            echo
                                "<tr>
      
          <th scope='row'>" . $row['bid'] . "</th>  
      
          <td><img src=" . $row['image'] . " width='150px' height='200px'></td>
      
          <td>" . $row['title'] . "</td>
      
          <td>" . $row['author'] . "</td>
      
          <td> " . $row['category'] . "</td>
      
          <td>" . $row['edition'] . "</td>
      
          <td width='300px'>" . $row['description'] . "</td>
          
          
          <td>
      
          <button class='btn btn-primary'><a style='color:white;text-decoration:none' href='edit.php?id=" . $row['bid'] . "'>Edit</a></button>
          <button class='btn btn-danger' Onclick='ConfirmDelete()'><a style='color:white;text-decoration:none' href='delete.php?id=" . $row['bid'] . "'>Delete</a></button>
          </td>
         </tr>

   
          ";
                        }
                    } else {
                        while ($row = mysqli_fetch_array($sql)) {

                            echo
                                "<tr>

            <th scope='row'>" . $row['bid'] . "</th>  

            <td><img src=" . $row['image'] . " width='150px' height='200px'></td>

            <td>" . $row['title'] . "</td>

            <td>" . $row['author'] . "</td>

            <td> " . $row['category'] . "</td>

            <td>" . $row['edition'] . "</td>

            <td width='300px'>" . $row['description'] . "</td>
            
            
            <td>

            <button class='btn btn-primary'><a style='color:white;text-decoration:none' href='edit.php?id=" . $row['bid'] . "'>Edit</a></button>
            <button class='btn btn-danger' Onclick='ConfirmDelete()'><a style='color:white;text-decoration:none' href='delete.php?id=" . $row['bid'] . "'>Delete</a></button>
            </td>
           </tr>
          
            "
                                ?>




                            <?php
                        }
                    }
                    ?>

                </table>

            </div>

        </div>
    </div>





</body>

</html>