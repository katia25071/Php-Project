<?php
    require('/Applications/XAMPP/xamppfiles/htdocs/project/db.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $bid=$_GET['bid'];
    // $sql=mysqli_query($con, "Select * from issuedbooks where bid=$bid and uid=$id ");
    // $row=mysqli_num_rows($sql);

    // if($row>0){
      ?>
      <!-- <script>alert('The book is issued once.')</script> -->
      <?php
    //   $sql=mysqli_query($con, "Delete from reserve where bid='$bid' and uid='$id'");
     
    // }else{
    
   $sql=mysqli_query($con, "INSERT INTO `issuedbooks`(`id`, `bid`, `uid`) VALUES ('0','$bid','$id')");
   
    $sql=mysqli_query($con, "UPDATE issuedbooks
    SET dates = CURRENT_TIMESTAMP,
        due = DATE_ADD(dates, INTERVAL 1 Month) -- Adds 7 days to the current date
    WHERE bid=$bid and uid=$id");
  
    $sql=mysqli_query($con,"Delete from reserve where uid='$id' and bid='$bid'");

    header("Location:reservedbooks.php");
    }
    header("Location:reservedbooks.php");

?>