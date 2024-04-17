<?php
include "../system_alerts/searchexpired.php";
   
if($expired ==0){
  echo " <div class='alert-container'>
    <div class='alert-message'>
     Ooop... you don't have any expired medics
    </div>
    </div>";
}else{
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
    <div class='header'>Status</div>
    <div class='header'>Delete</div>
   </div>";
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
         

        if($diffInDays <=30 ){
          $info = floor($diffInDays);
          echo "<div class='expired-list'>";
          echo "<div> $id</div>";
          echo "<div>$mdcategory</div>";
          echo "<div>$mdname</div>";
          echo "<div class='status'>$info days remain to expire</div>";
          echo "<div class='delete'>Delete</div>";
          echo "<a href='../authorized/deletemedics.php?mdid=$id&&page=lesexpired'></a>";
          echo "</div>";
        }
      }
  }

  
   

?>

