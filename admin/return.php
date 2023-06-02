<?php
    require('/Applications/XAMPP/xamppfiles/htdocs/project/db.php');
    if(isset($_GET['id'])){
        $uid=$_GET['id'];
        $bid=$_GET['bid'];
      
        $sql=mysqli_query($con, "UPDATE issuedbooks SET returns =  CURDATE() where bid=$bid and uid=$uid");
        $sql=mysqli_query($con, "Update books set availability=availability+1 where bid='$bid'");
        if($sql){
        header("Location:issuedbooks.php");
        }

    }
    ?>