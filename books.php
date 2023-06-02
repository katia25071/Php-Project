<head>
    <title>Books</title>
    <!-- Bootstrap CSS -->
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

    <style>
        .mb-sm-0,
        .my-sm-0 {
            margin-bottom: 10px !important;
        }
     
        .desc {
    max-width: 200px; /* Adjust the maximum width as needed */
    word-wrap: break-word;
  }

  .act{
    background-color:  #00458c;
    color:white !important;
  }

    </style>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['type']) || ($_SESSION['type'] != 'admin' || $_SESSION['type'] != 'admin')) {
        include('db.php');
        require 'nav.php';
        function query($result)
        {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="image-holder">
                    <img src="./images/<?php echo $row['image'] ?>">
                    <div class="desc">
                        <p> <b>Title: </b><?php echo $row['title'] ?> </p>
                        <p> <b>Category:</b>  <?php echo $row['category'] ?></p>
                        <p> <b>Author:</b><?php echo $row['author'] ?>  </p>
               
                        <button class="btn btn-primary"><a href="displaybook.php?id=<?php echo $row['bid'] ?>" style="text-decoration: none;
                color:white; cursor; font-size:small">Learn More</button></a>
                    </div>
                </div>
                <?php
            }
        }


        $results_per_page = 8; // Number of books to display per page
    
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $results_per_page;

        $sql = "SELECT * FROM books LIMIT $start_from, $results_per_page";
        $result = mysqli_query($con, $sql);

        ?>


        <div class="section-body">

            <div class="vertical-nav">
                <ul>
                    <h5>
                        <left> Category</left>
                    </h5>

                    <li><a href="books.php">All</a></li>
                    <?php

                    $sql = mysqli_query($con, "SELECT DISTINCT category from books ");
                    while ($row = mysqli_fetch_array($sql)) {
                        ?>
                        <li><a href="books.php?category=<?php echo $row['category'] ?>"><?php echo ucfirst($row['category']) ?></a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>



            <div class="gallery-main">


                <div class="seearch">
                    <nav class="navbar navbar-light center">
                        <form class="form-inline" method="GET">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search author, title, category"
                                name="search" aria-label="Search">
                            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </nav>
                </div>


                <div class="gallery">
                    <?php
                    if (isset($_GET['search'])) {
                        $search = $_GET['search'];

                        // Perform the search query
                        $sql = "SELECT * FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%' OR category LIKE '%$search%'";
                        $result = mysqli_query($con, $sql);
                        query($result);

                        $sql = "SELECT COUNT(*) AS total FROM books WHERE title LIKE '%$search%' OR author LIKE '%$search%' OR category LIKE '%$search%'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $total_pages = ceil($row['total'] / $results_per_page);
                    }

                    if (isset($_GET['category'])) {
                        $g = $_GET['category'];


                        $results_per_page = 8; // Number of books to display per page
                
                        if (isset($_GET["page"])) {
                            $page = $_GET["page"];
                        } else {
                            $page = 1;
                        }

                        $start_from = ($page - 1) * $results_per_page;

                        $sql = "SELECT * FROM books where category='$g' LIMIT $start_from, $results_per_page";
                        $result = mysqli_query($con, $sql);
                        query($result);

                        ?>

                        <?php


                        $sql = "SELECT COUNT(*) AS total FROM books where category='$g'";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $total_pages = ceil($row['total'] / $results_per_page);

                        ?>
                    </div>
                    <?php
                    echo '<div class="pagination justify-content-center ">';
                    $startPage = max(1, $page - 1);
                    $endPage = min($startPage + 2, $total_pages);
                    if ($page > 1) {
                        echo "<a class='page-link' href='?category=$g&page=" . ($page - 1) . "'>Previous</a> ";
                    }
                    for ($i = $startPage; $i <= $endPage; $i++) {
                        echo '<div class="page-item';
                        if ($i == $page) {
                            echo ' active';
                        }
                        echo '"><a class="page-link" href="books.php?category=' . $g . '&page=' . $i . '">' . $i . '</a></div>';
                    }
                    if ($page < $total_pages) {
                        echo "<a class='page-link' href='?category=$g&page=" . ($page + 1) . "'>Next</a>";
                    }
                    echo '</div>';

                    ?>

                </div>


                <?php
                    } elseif (isset($_GET['search'])) {
                        // Display search results
                        ?>
            </div>
            <?php
            echo '<div class="pagination justify-content-center">';
            $startPage = max(1, $page - 2);
            $endPage = min($startPage + 2, $total_pages);
            if ($page > 1) {
                echo "<a class='page-link' href='?search=$search&page=" . ($page - 1) . "'>Previous</a> ";
            }
            for ($i = $startPage; $i <= $endPage; $i++) {
                echo '<div class="page-item';
                if ($i == $page) {
                    echo ' active';
                }
                echo '"><a class="page-link" href="books.php?search=' . $search . '&page=' . $i . '">' . $i . '</a></div>';
            }
            if ($page < $total_pages) {
                echo "<a class='page-link' href='?search=$search&page=" . ($page + 1) . "'>Next</a>";
            }
            echo '</div>';

                    } else {
                        $results_per_page = 8; // Number of books to display per page
                
                        if (isset($_GET["page"])) {
                            $page = $_GET["page"];
                        } else {
                            $page = 1;
                        }

                        $start_from = ($page - 1) * $results_per_page;

                        $sql = "SELECT * FROM books LIMIT $start_from, $results_per_page";
                        $result = mysqli_query($con, $sql);
                        query($result);

                        $sql = "SELECT COUNT(*) AS total FROM books";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $total_pages = ceil($row['total'] / $results_per_page);


                        ?>
            </div>




            <?php
            echo '<div class="pagination justify-content-center ">';
            $startPage = max(1, $page - 2);
            $endPage = min($startPage + 2, $total_pages);
            if ($page > 1) {
                echo "<a class='page-link' href='?page=" . ($page - 1) . "'>Previous</a> ";
            }
            for ($i = $startPage; $i <= $endPage; $i++) {
                echo '<div class="page-item';
                if ($i == $page) {
                    echo ' active';
                }
                echo '"<div><a class="page-link" href="books.php?page=' . $i . '">' . $i . '</a></div>';
            }
            if ($page < $total_pages) {
                echo "<a class='page-link' href='?page=" . ($page + 1) . "'>Next</a>";
            }
            echo '</div>';

            ?>

            </div>
            <?php
                }
             ?>


        </div>



        <footer class="container" style="position:fixed; bottom:0">
            <p>&copy; 2023 &middot; Katia Haveri &middot; Epoka University </p>
            <!-- <a href="#">Privacy</a> &middot; <a href="#">Terms</a> -->
        </footer>


        <script>
  // Get the current page URL
  var currentURL = window.location.href;

  // Get all anchor elements inside the sidebar
  var sidebarLinks = document.querySelectorAll('.vertical-nav a');

  // Loop through each anchor element
  sidebarLinks.forEach(function(link) {
    // Check if the link's href matches the current URL
    if (link.href === currentURL) {
      // Add the 'active' class to the link's parent <li> element
      link.classList.add('act');
  
    }
  });
</script>


    </body>

    </html>
    <?php
    } else {
        header("Location:login.php");
    }
    ?>