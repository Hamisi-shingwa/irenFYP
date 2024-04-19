<?php

    //lets us include database connection first
    include_once("../db/dbconnect.php");
    $token = $_SESSION['user_token'];
//Then lets us select all information of medics
    $sql = "SELECT * from medics where medics.utoken='$token'";
    $query = mysqli_query($conn, $sql);
    

    //lest us know current time
    $currentTime = time();

 echo   "<div class='expired-medical-list less'>
    <div class='header'>Number</div>
    <div class='header'>Medical Category</div>
    <div class='header'>Medical Name</div>
    <div class='header'>Number of Dosage</div>
    <div class='header'>Added Date</div>
    <div class='header'>Expired Date</div>
    <div class='header'>Status</div>
    <div class='header'>Delete</div>
   </div>";
   $n = 0;
    while($datas = mysqli_fetch_array($query)){
        $id = $datas['id'];
        $mdcategory = $datas['medical_category'];
        $mdname = $datas['medical_name'];
        $mddosage = $datas['medical_dosage'];
        $mdlabel = $datas['medical_lebel'];
        $expiringDate = $datas['expiring_date'];
        $addedOn = $datas['added_date'];
       
        $expiredDate = strtotime($expiringDate);
        $diffInSeconds =  $expiredDate - $currentTime;

        $diffInDays = ($diffInSeconds / (60 * 60 * 24));
        $n++;

       
          $info = floor($diffInDays);
          echo "<div class='expired-list'>";
          echo "<div> $n</div>";
          echo "<div>$mdcategory</div>";
          echo "<div>$mdname</div>";
          echo "<div>$mddosage</div>";
          echo "<div>$addedOn</div>";
          echo "<div>$expiringDate</div>";
          echo "<div class='status'>$info days remain to expire</div>";
          echo "<div class='delete'>Delete</div>";
          echo "<a href='../authorized/deletemedics.php?mdid=$id&&page=allMedics'></a>";
          echo "</div>";
         
       }
  
   

?>

