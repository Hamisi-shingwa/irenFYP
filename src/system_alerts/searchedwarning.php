<?php
require_once("../db/dbconnect.php");
// lets start sesion to know whome one is search for medics
// session_start();  
$token = $_SESSION['user_token'];
// searchfor current time and convert it to lowercase
$currentTimestamp = time();

//Then time that medics will expire
$sql = "SELECT medical_dosage from medics    where medics.utoken='$token'";
$query = mysqli_query($conn, $sql);

//Note that this warning may be used for further features not now
$lessdose = 0;

while($data = mysqli_fetch_array($query)){
   $mddose = $data['medical_dosage'];
  
    if ($mddose <= 5) { //check if there is few dosage
     $lessdose +=1;
   
   } 
   else { // product is strong
    //  $lessdose  = 0;
   }
}

?>

 