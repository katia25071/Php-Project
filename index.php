<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="../../../../favicon.ico">

  <title>Home</title>

  <!-- Bootstrap core CSS -->
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
    .navbar-expand-lg {
      background-color: #00458c !important;
    }
    .row .col-lg-4 {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .row .col-lg-4 p {
        margin-top: auto;
    }
    body {
      padding-top: 0;
      padding-bottom: 3rem;
      color: #5a5a5a;
    }

    .carousel {
      margin-bottom: 4rem;
    }

    .carousel-caption {
      bottom: 3rem;
      z-index: 10;
    }


    .carousel-item {
      height: 32rem;
      background-color: #777;
    }

    .carousel-item>img {
      position: absolute;
      top: 0;
      left: 0;
      min-width: 100%;
      height: 34rem;
    }


    .marketing .col-lg-4 {
      margin-bottom: 1.5rem;
      text-align: center;
    }

    .marketing h2 {
      font-weight: 400;
    }

    .marketing .col-lg-4 p {
      margin-right: .75rem;
      margin-left: .75rem;
    }


    .featurette-divider {
      margin: 5rem 0;
      /* Space out the Bootstrap <hr> more */
    }




    @media (min-width: 40em) {

      .carousel-caption p {
        margin-bottom: 1.25rem;
        font-size: 1.25rem;
        line-height: 1.4;
      }



    }

    @media (max-width: 50em) {
      .carousel-item {
        height: 20rem;
        background-color: #777;
      }

      .carousel-item>img {

        height: 20rem;
      }
    }
  </style>

</head>

<body>

  <?php
  session_start();
  require 'db.php';
  require 'nav.php';
  ?>


  <main role="main">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">
        
        <div class="carousel-item active">
          <img class="first-slide" src="images/b.jpeg" alt="First slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Welcome to our school library website!</h1>
              <p>Our library is a treasure trove of resources designed to support
                students in their academic journey and foster a love for learning. </p>
              <p><a class="btn btn-lg btn-primary" href="books.php" role="button">Find your books</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
          <img class="second-slide" src="images/lib.jpeg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="third-slide" src="images/librarys.jpeg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>


    </div>



    <div class="container marketing">
      <h2 class="text-center" style="margin-bottom:50px">LATEST BOOKS</h2>

      <div class="row">
        <?php
        $sql = "SELECT * FROM books order by date DESC Limit 3";
        $res = mysqli_query($con, $sql);
        while ($row = mysqli_fetch_array($res)) {
          $id = $row['bid'];
          ?>
          <div class="col-lg-4">
            <img src="images/<?php echo $row['image'] ?>" alt="Generic placeholder image" width="250" height="300">
            <h4 style="margin:auto">
              <?php echo $row['title'] ?>
            </h4>

            <p><a class="btn btn-primary" href="displaybook.php?id=<?php echo $row['bid'] ?>" role="button">View details
                &raquo;</a></p>
          </div>
          <?php
        }
        ?>
      </div>



      <hr class="featurette-divider">



    </div>


    <footer class="container">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11970.364354553727!2d19.7063579!3d41.4046859!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13502c4d8e14227d%3A0x92c16879aa946786!2sEpoka%20University!5e0!3m2!1sen!2s!4v1685431182398!5m2!1sen!2s"
        width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>

      <p class="float-right"><a href="#" style="color:#00458c; text-decoration:none">Back to top</a></p>
      <p>&copy; 2023 &middot; Katia Haveri &middot; Epoka University </p>
      <!-- <a href="#">Privacy</a> &middot; <a href="#">Terms</a> -->
    </footer>
  </main>

  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

</body>

</html>