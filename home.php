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
    <style>
        /* .carousel-item {
            height: 30rem;
        } */
    </style>

</head>

<body>
    <section>
        <?php
        session_start();
        require 'nav.php';
        require 'db.php';
       
        ?>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/epoka.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/library.jpeg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/libri.jpeg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
    
    <div class="featured_boks">

        <b>
            <h1>LATEST BOOKS</h1>
        </b>
        <div class="featured_book_box">


            <?php
            $sql = "SELECT * FROM books  Limit 6";
            $res = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($res)) {


                ?>
                <div class="featured_book_card">
                    <div class="featurde_book_img">
                        <img src="images/<?php echo $row['image'] ?>">
                    </div>

                    <div class="featurde_book_tag">
                        <h2>
                            <?php echo $row['title'] ?>
                        </h2>
                        <p class="writer">
                            <?php echo $row['author'] ?>
                        </p>
                        <div class="categories">
                            <?php echo $row['category'] ?>
                        </div>
                        <!-- <p class="book_price">$25.50<sub><del>$28.60</del></sub></p> -->
                        <a href="bookinfo.php?id=<?php echo $row['id'] ?>" class="f_btn">Learn More</a>
                    </div>
                </div>

                <?php
            }
            
            ?>

        </div>
    </div>
    <?php
    require 'footer.php';
        ?>
</body>