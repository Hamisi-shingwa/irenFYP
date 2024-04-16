<?php
require_once("../db/dbconnect.php");
// lets start sesion to know whome one is search for medics
// session_start();  
$token = $_SESSION['user_token'];
// searchfor current time and convert it to lowercase
$currentTimestamp = time();

//Then time that medics will expire
$sql = "SELECT medical_category, medical_dosage, expiring_date from medics    where medics.utoken='$token'";
$query = mysqli_query($conn, $sql);

$expired = 0;
$warning = 0;//Note that this warning may be used for further features not now
$lessdose = 0;

while($data = mysqli_fetch_array($query)){
   $mdcategory = $data['medical_category'];
   $mddose = $data['medical_dosage'];
   $expiringDate = $data['expiring_date'];
   $expiryDate = strtotime($expiringDate);
  
   
   // lets match current date with expiring date
   $diffInSeconds = $expiryDate - $currentTimestamp;
   // change it into days
   $diffInDays = ($diffInSeconds / (60 * 60 * 24));

  
   // filter if it nearby to change its time
   if ($diffInDays <= 30) { // look if  it bellow two weekes(14 days)
     $expired +=1;
     
   }
    elseif ($diffInDays <= 60) { //if product has two months near by to expire
     $warning +=1;
   } 
    elseif ($mddose >= 5) { //check if there is few dosage
     $lessdose +=1;
   
   } else { // product is strong
     $warning  = 0;
   }
}

?>

 