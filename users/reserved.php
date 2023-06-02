<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Reserved Books</title>
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

        .mb-sm-0,
        .my-sm-0 {
            margin-bottom: 10px !important;
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
    
    if ($_SESSION['type'] == 'Simpleuser') {
        // echo "<script type='text/javascript'>alert('Access Accepted!!!')</script>";
        ?>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <?php
                    require '/Applications/XAMPP/xamppfiles/htdocs/project/menu.php';
                    ?>

                    <div class="seearch">
                        <nav class="navbar navbar-light center">
                            <form class="form-inline" method="POST">
                                <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search"
                                    aria-label="Search">
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"
                                    name="seearch">Search</button>
                            </form>
                        </nav>

                        <?php
                        $user = $_SESSION['id'];

                        if (isset($_POST['seearch'])) {
                            $s = $_POST['search'];
                            $sql = "select  * from reserve r, books b where r.bid=b.bid and uid='$user' and (r.bid='$s' or b.title like '%$s%' or b.author like '%$s%' )";
                        } else
                            $sql = "select  * from reserve r, books b where r.bid=b.bid and uid='$user'";

                        $result = mysqli_query($con, $sql);
                        $crow = mysqli_num_rows($result);


                        if (!$crow)
                            echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                        else {

                            ?>
                            <div class="over">
                                <table class="table table-striped bg-white center" style="width:100%; ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Author</th>
                                            <th scope="col">Reservation Date</th>
                                            <th scope="col">Reservation Expire Date</th>
                                            <th scope="col">Action</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                            $bid = $row['bid'];
                                            $image = $row['image'];
                                            $title = $row['title'];
                                            $date = $row['dates'];
                                            $expire = $row['expire'];
                                            $author = $row['author'];

                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    <?php echo $bid ?>
                                                </th>
                                                <td><img src=<?php echo "/project/images/$image" ?> width='90px' height='100px'>
                                                </td>

                                                <td>
                                                    <?php echo $title ?>
                                                </td>

                                                <td>
                                                    <?php echo $author ?>
                                                </td>


                                                <td>
                                                    <?php echo $date ?>
                                                </td>
                                                <td>
                                                    <?php echo $expire ?>
                                                </td>

                                                <td><button class='btn btn-danger' onclick='f()'><a
                                                            style='color:white;text-decoration:none'>Cancel</a></button>
                                                </td>

                                        </tbody>
                                        <?php
                                        }

                                        ?>
                                </table>
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
                    if (confirm("Are you sure you want to delete this reservation?")) {
                        window.location.href = '/project/users/reject.php?id=<?php echo $bid ?>';
                    }
                }
            </script>

        </body>


        </html>
        <?php
                        }
    } else {
        header("Location:/project/login.php");
    }
    ?>