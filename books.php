<head>
    <title>Books category</title>
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

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->


</head>


<body>

    <?php
    include('db.php');
    require 'nav.php';

    function query($result)
    {
     
        while ($row = mysqli_fetch_array($result)) {

            ?>
            <div class="image-holder">

                <img src="./images/<?php echo $row['image'] ?>">

                <div class="desc">
                    <b> Title: </b>
                    <?php echo $row['title'] ?><br>
                    <b> Genre: </b>
                    <?php echo $row['category'] ?>
                    <br>
                    <button class="btn btn-primary"><a href="bookinfo.php?id=<?php echo $row['id'] ?>" style="text-decoration: none;
                color:white; cursor; font-size:small">Learn More</button></a>
                </div>
            </div>

        
            <?php

        }

    }

    ?>




    <div class="section-body">
        <div class="vertical-nav">
            <ul>
                <h4>
                    <left> Category</left>
                </h4>

                <li><a href="books.php">All</a></li>
                <?php

                $sql = mysqli_query($con, "SELECT DISTINCT category from books ");
                while ($row = mysqli_fetch_array($sql)) {


                    ?>
                    <li><a href="books.php?genre=<?php echo $row['category'] ?>"><?php echo ucfirst($row['category']) ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>

        </div>

        <div class="gallery-main" style="margin-left:20%;padding:1px 70px;height: 100vh;">
            <div class="gallery">

                <?php

                if (isset($_GET["genre"])) {

                    $category = htmlspecialchars($_GET['genre']);

                        $sql = "SELECT DISTINCT category from books";
                        $res = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_array($res)) {
                            $genre = $row['category'];
                            if ($category == $genre) {
                                $sql = "SELECT * FROM books where category='$genre'";
                                $result = mysqli_query($con, $sql);
                                query($result);
                            }
                        }
                    } else {
                    $result = mysqli_query($con, "SELECT * FROM books");
                    query($result);
                }




                ?>


            </div>

        </div>
    </div>


    <?php
    include('footer.php');
    ?>


    </html>