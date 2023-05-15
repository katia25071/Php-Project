<html>

<head>
    <title>Books Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
    <link rel="stylesheet" href="style/style.css" />

</head>
<style>
    .book-info-template {
        display: flex;
        align-items: flex-start;
        justify-content: center;
        padding: 30px;
        /* padding-top: 150px; */
    }

    .book-cover-image {
        width: 300px;
        height: 400px;
        margin-right: 40px;
        margin-left: 90px;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0px 0px 10px #ccc;
        transition: all 0.3s ease-in-out;
    }

    .book-cover-image img {
        width: 100%;
        height: 100%;
        /* object-fit: cover; */
    }

    .book-cover-image:hover {
        transform: scale(1.1);
    }

    .book-details {
        flex-grow: 1;
        text-align: center;
        animation: fadeIn 2s ease-in-out;
        margin-top: 15px;
        width: 300px;
    }

    .book-title {
        color: #333;
        margin: 0 0 20px 0;
        font-size: 3em;
        font-weight: bold;
        text-shadow: 2px 2px #ccc;
        animation: fadeIn 2s ease-in-out;
    }

    .book-author,
    .book-description,
    .book-publisher,
    .book-publish-date {
        color: #555;
        margin: 0 0 20px 0;
        font-size: 15px;
        font-style: italic;
        animation: fadeIn 2s ease-in-out;


    }

    .book-description {
        width: 400px;
        margin: auto;
        margin-bottom: 20px;
    }

    .space{
        padding: 10px;
        margin:auto;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>

<body>
    <?php
    include('authentication.php');
    include('nav.php');
    include('db.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = mysqli_query($con, "SELECT * from books where bid=$id");
        while ($row = mysqli_fetch_array($sql)) {
            ?>

            <div class="book-info-template">
                <div class="img-thumbnail book-cover-image">
                    <img src="images/<?php echo $row['image'] ?>">
                </div>
                <div class="text-lg-center bg-light space">
                    <h1 class="book-title">Title:
                        <?php echo $row['title'] ?>
                    </h1>
                    <h2 class="book-author">Author:
                        <?php echo $row['title'] ?>
                    </h2>
                    <p class="book-publisher">Category:
                        <?php echo $row['category'] ?>
                    </p>
                    <p class="book-publish-date">Availability:
                        <?php echo $row['availabitilty'] ?>
                    </p>
                    <p class="book-description">
                        <?php echo $row['description'] ?>
                    </p>
                    <?php
                    // $result = mysqli_query($con, "select id from users where username ='" . $_SESSION['id'] . "'");
                    // $row1 = mysqli_fetch_array($result);
                    ?>
                    <button class="btn btn-primary"><a
                            href="savedbooks.php?id=<?php echo $row['bid'] ?>&user=<?php echo $row1['id'] ?>" style="text-decoration: none;
                color:white; cursor">Save</button></a>
                </div>
            </div>
</body>
        <?php
        }
    }
    // include('footer.php');

    ?>

</html>