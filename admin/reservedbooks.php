<html>
<head>
    <meta charset="utf-8" />
    <title>Reseved Books</title>
    <!-- <link rel="icon" href="images/logo2.png" type="image/icon type"> -->
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
<style>
     .mb-sm-0,
        .my-sm-0 {
            margin-bottom: 10px !important;
        }
</style>
</head>

<body>
    <?php
    include("/Applications/XAMPP/xamppfiles/htdocs/project/authentication.php");

    if (isset($_SESSION['type']) &($_SESSION['type']=='admin' || $_SESSION['type']=='Simpleadmin')) {

    include '/Applications/XAMPP/xamppfiles/htdocs/project/nav.php';
    require('/Applications/XAMPP/xamppfiles/htdocs/project/db.php');
    ?>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php
            require('/Applications/XAMPP/xamppfiles/htdocs/project/menu.php');
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
                    if (isset($_POST['seearch'])) {
                        $s = $_POST['search'];
                        $sql="select * from reserve r, books b, users u where r.bid=b.bid and r.uid=u.id and (b.bid='$s' or r.uid='$s' or b.title like '%$s%' or u.email like '%$s%') ";
         
                    } else
                        $sql = "select * from reserve,books,users where reserve.bid=books.bid and reserve.uid=users.id ";
                       

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

                                        <th scope="col">UserID</th>
                                        <th scope="col">User Email</th>
                                        <th scope="col">Book ID</th>
                                        <th scope="col">Book Title</th>
                                        <th scope="col">Availability</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                    while ($row = mysqli_fetch_array($result)) {
                                        if($row['expire']>=date('Y-m-d')){
                                        $bid = $row['bid'];
                                        $title = $row['title'];
                                        // $image = $row['image'];
                                        $ava = $row['availability'];
                                        $id = $row['uid'];
                                        $email = $row['email'];


                                        ?>
                                        <tr>
                                         
                                           
                                            <td>
                                                <?php echo $id ?>
                                            </td>
                                            <td>
                                                <?php echo $email?>
                                            </td>
                                            <td>
                                                <?php echo $bid ?>
                                            </td>
                                            <td>
                                                <?php echo $title ?>
                                            </td>
                                            <td>
                                                <?php echo $ava?>
                                            </td>
                                         
                                            <td>

                                                <button class='btn btn-success'><a style='color:white;text-decoration:none'
                                                        href='/project/admin/accept.php?id=<?php echo $id ?>&bid=<?php echo $bid ?>'>Accept</a></button>
                                            </td>
                                         


                                        </tr>

                                        <?php
                                    }else{
                                    $expire=$row['expire'];
                                    $sql=mysqli_query($con,"DELETE from reserve where expiredate='$expire'");
                                }
                            }
                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
        require '/Applications/XAMPP/xamppfiles/htdocs/project/footer.php';
        ?>
</body>
<?php
 }else{
    header("Location:/project/login.php");
 }
 ?>