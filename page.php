<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
    <title>View Records</title>
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
    <link rel="stylesheet" href="style/book.css" />



</head>

<body>

    <?php
    include('db.php');
    //  require 'nav.php';
    
    $results_per_page = 3;
    $query = "select * from books";
    $result = mysqli_query($con, $query);
    $number_of_result = mysqli_num_rows($result);
    $number_of_page = ceil($number_of_result / $results_per_page);

    if (!isset($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    $page_first_result = ($page - 1) * $results_per_page;

    $query = "SELECT * FROM books LIMIT " . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($con, $query);

    while ($row = mysqli_fetch_array($result)) {
        ?>

        <div class="desc">
            <b> Title: </b>
            <?php echo $row['title'] ?><br>
            <b> Genre: </b>
            <?php echo $row['category'] ?>
            <br>
            <button class="btn btn-primary"><a href="bookinfo.php?id=<?php echo $row['id'] ?>" style="text-decoration: none;
                    color:white; cursor">Learn More</button></a>
        </div>
        <?php
    }

    ?>

    <nav>
        <ul class="pagination justify-content-center">
            <?php
            if ($page >= 2)
                echo "<li class='page-item'><a class='page-link' href='page.php?page=" . ($page - 1) . "'>Previous</a></li>";
            else
                echo "<li class='page-item disabled'><a class='page-link'>Previous</a></li>";

            for ($i = 1; $i <= $number_of_page; $i++) {

                echo ' <li class="page-item "><a class="page-link" href= "page.php?page=' . $i . '"> ' . $i . '</a></li>';

            }
            ?>
            <li class="page-item">
                <?php
                if ($page < $number_of_page)
                    echo "<li class='page-item'><a class='page-link' href='page.php?page=" . ($page + 1) . "'>Next</a></li>";
                else

                    echo "<li class='page-item disabled'><a class='page-link'>Next</a></li>";
                ?>
            </li>
        </ul>
    </nav>