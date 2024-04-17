<?php
include "../system_alerts/searchedwarning.php";
if($lessdose ==0){
  echo " <div class='alert-container'>
    <div class='alert-message'>
     Ooop... you don't have any displayed warning
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
    <div class='header'>Category</div>
    <div class='header'>Name</div>
    <div class='header'>Dose</div>
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

        if( $mddosage <= 5 ){
          echo "<div class='expired-list'>";    
          echo "<div> $id</div>";
          echo "<div>$mdcategory</div>";
          echo "<div>$mdname</div>";
          echo "<div>$mddosage</div>";
          echo "<div class='status'>Few Dose</div>";
          echo "<div class='delete'>Delete</div>";
          echo "<a href='../authorized/deletemedics.php?mdid=$id&&page=leswarning'></a>";
          echo "</div>";
        }
      }
  }

  
   

?>
