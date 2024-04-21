<?php
 session_start();
 //Lets us know one access the page
 $utoken = $_SESSION['user_token'];

 //First let us require database connection file
 require_once("../db/dbconnect.php");
//  $mdid = $_POST['mdid'];
 $newiD = $_POST['id'];
 $mdname = $_POST['mdname'];
//  $avdosage = $_POST['mddosage'];
 $expiredOn = $_POST['expiredOn'];
 $price = $_POST['price'];
 $expiringDate = $_POST['expiringDate'];
 $addedDate = $_POST['addedDate'];
 $newDose = $_POST['mdosage'];
 

 //Lets us know amount of dosage on medics
 $getDosage = "SELECT medical_dosage from medics where medics.id='$newiD'";
 $runquery = mysqli_query($conn, $getDosage);
 $avdosage = mysqli_fetch_array($runquery)['medical_dosage'];

 $dosage = $newDose + $avdosage;
//call here our insert function
insertNewMedics($conn, $utoken,  $mdname, $dosage ,$expiredOn, $price,  $newiD);
 
 //function that insert newmedics
 function insertNewMedics($conn, $utoken,  $medicalname, $dosage, $expiredOn, $price, $newiD){
    global $expiringDate;
    global $addedDate;  
    global $newDose;  
    $currentTime = time();//lets us process the time
    $expiredsec = strtotime($expiringDate);
    $nowSec = $expiredsec - $currentTime; 
    $nowsecToDays = $nowSec / (60 * 60 * 24);
    $availableDays = floor($nowsecToDays);
    
    
    //Bellow if statement used to check if someone fill all required information
    if( $medicalname  && $dosage && $expiredOn){
      //lets us check if user try to add expired medics
      $currentTime = time();
      $addedTime = strtotime($expiredOn);
      if($addedTime <= $currentTime){//Look if medics added was expired
        $message = base64_encode("It look like you want to add expired medics please make sure you check medical details correct");
        header("location:../dashbord/dashbord.php?page=Editfirstadded&&medic=$newiD&&msg=$message");
      }elseif($availableDays < 30){//Lets us see if there is an expired ,edics
        
        $message = base64_encode("Sorry available $medicalname remain with only $availableDays days to expire delete an expired medics first");
        header("location:../dashbord/dashbord.php?page=Editfirstadded&&medic=$newiD&&msg=$message");

      }else{
        $updaTe = "UPDATE medics SET medical_dosage='$dosage',total_price='$price',expiring_date='$expiredOn' where medics.id='$newiD'";
        $query = mysqli_query($conn, $updaTe);
        if($query){
         header("location:../dashbord/dashbord.php?page=Editfirstadded&&medic=$newiD&&status=succes");
      }
          
         
      }
       
       

    }else{
    
        $message = base64_encode("Please all neccessary information is required");
        header("location:../dashbord/dashbord.php?page=Editfirstadded&&medic=$newiD&&msg=$message");
    }

  }
    
    
    
 ?>