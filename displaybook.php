<!DOCTYPE html>
<html>

<head>
    <title>Book Information</title>
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

    <style>
        .book-box {
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 20px;
        }

        .container {
            margin-top: 50px;
        }




        .comment-box {

            padding: 5px;
        }
    </style>
</head>

<body>
    <?php
    // include('authentication.php');
    session_start();
    include('nav.php');
    include('db.php');
    ?>
    <div class="container">
        <div class="row">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = mysqli_query($con, "SELECT * from books where bid=$id");
                while ($row = mysqli_fetch_array($sql)) {
                    ?>
                    <div class="col-md-6">
                        <div style="display:flex; justify-content: center">
                            <img src="images/<?php echo $row['image'] ?>" height="400px" width="300px" alt="Book Image">
                        </div>
                    </div>


                    <div class="col-md-6" style="margin-top:30px">

                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Title:
                                    <?php echo $row['title'] ?>
                                </h5>
                            </div>

                            <div class="card-body">
                                <p class="card-text"><b>Author:</b>
                                    <?php echo $row['author'] ?>
                                </p>
                                <p class="card-text"><b>Genre: </b>
                                    <?php echo $row['category'] ?>
                                </p>
                                <p class="card-text"><b>Year:</b>
                                    <?php echo $row['year'] ?>
                                </p>
                                <p class="card-text"><b>Description: </b>
                                    <?php echo $row['description'] ?>
                                </p>
                                <p class="card-text"><b>Availability: </b>
                                    <?php echo $row['availability'] ?>
                                </p>
                                <div class="text-center">
                                    <?php
                                    // $result = mysqli_query($con, "select id from users where username ='" . $_SESSION['id'] . "'");
                                    // $row1 = mysqli_fetch_array($result);
                                    if (isset($_SESSION['id'])) {
                                        $uid = $_SESSION['id'];
                                        ?>
                                        <button class="btn btn-primary"><a
                                                href="/project/users/bookreservation.php?id=<?php echo $id ?>&user=<?php echo $uid ?>"
                                                style="text-decoration: none; color:white; cursor">Reserve</button></a>
                                    </div>
                                    <?php
                                    } else {
                                        ?>
                                    <button class="btn btn-primary" onclick='f()'>Reserve</button>
                                </div>
                                <?php

                                    }
                                    ?>

                        </div>
                    </div>





                </div>

            </div>





            <?php
                }
            }
            ?>

    <?php
    if (isset($_SESSION['type']) && $_SESSION['type'] = 'Simpleuser') {
        ?>

        <div style=" margin-top:50px; margin-bottom:50px">
        <hr class="featurette-divider">
            <div class="comment-box ml-2" style=" margin-top:40px">
                <form action="/project/users/review.php" method="POST">
                    <h4>Add a review</h4><br>
                    <div class="comment-area">
                        <input type="hidden" name="id" value="<?php echo $id ?>" required>
                        <textarea class="form-control" placeholder="Review" name="review" rows="4"></textarea>

                    </div>

                    <div style="margin-top:10px; ">
                        <button class="btn btn-primary" name="add">Add</button>
                    </div>
                </form>

            </div>


        </div>

        <hr class="featurette-divider">
        </div>

        <?php
    }
    $sql = mysqli_query($con, "Select * from review where bid=$id");
    $results_per_page = 3; // Number of reviews per page
    $total_results = mysqli_num_rows($sql);
    $total_pages = ceil($total_results / $results_per_page);
    if (!isset($_GET['page'])) {
        $page = 1; // Set current page to 1 if not specified in the URL
    } else {
        $page = $_GET['page'];
    }

    $start_limit = ($page - 1) * $results_per_page; // Calculate the starting limit for the SQL query
    
    if ($rows = mysqli_num_rows($sql) > 0) {


        ?>


        <section class="p-4 p-md-5 text-center text-lg-start shadow-1-strong rounded"
            style="height:400px, margin-bottom:50px">
            <div>
                <h1 style="margin-bottom:20px;">Reviews</h1>

                <div class="row">
                    <?php

                    $query = mysqli_query($con, "SELECT * FROM review WHERE bid=$id LIMIT $start_limit, $results_per_page");

                    while ($row = mysqli_fetch_array($query)) {
                        ?>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?php echo $row['name'] ?>
                                    </h5>
                                    <p class="card-text">
                                        <?php echo $row['review'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

                <!-- Pagination -->
                <ul class="pagination justify-content-center" style="margin-top:50px">
                    <?php
                    $startPage = max(1, $page - 1);
                    $endPage = min($startPage + 2, $total_pages);
                    if ($page > 1) {
                        echo "<a class='page-link' href='?id=$id&page=" . ($page - 1) . "'>Previous</a> ";
                    }
                    for ($i = $startPage; $i <= $endPage; $i++) {

                        echo '<li class="page-item"><a class="page-link" href="?id=' . $id . '&page=' . $i . '">' . $i . '</a></li>';
                    }
                    if ($page < $total_pages) {
                        echo "<a class='page-link' href='?id=$id&page=" . ($page + 1) . "'>Next</a>";
                    }
                    ?>
                </ul>
            </div>
        </section>

        <?php
    }

    // require 'footer.php';
    ?>

    <script>
        function f() {
            alert("You must login to reserve a book");
        }
    </script>
</body>

</html>