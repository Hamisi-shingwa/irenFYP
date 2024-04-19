<?php
 session_start();
 //Lets us know one access the page
 $utoken = $_SESSION['user_token'];

 //First let us require database connection file
 require_once("../db/dbconnect.php");
 $mdid = $_POST['mdid'];
 $category = $_POST['mdcategory'];
 $mdname = $_POST['mdname'];
 $avdosage = $_POST['mddosage'];
 $expiredOn = $_POST['expiredOn'];
 $price = $_POST['price'];
 $expiringDate = $_POST['expiringDate'];
 $addedDate = $_POST['addedDate'];
 $newDose = $_POST['mdosage'];
 $dosage = $newDose + $avdosage;


 

//call here our insert function
insertNewMedics($conn, $utoken, $category, $mdname, $dosage ,$expiredOn, $price, $mdid);
 
 //function that insert newmedics
 function insertNewMedics($conn, $utoken, $category, $medicalname, $dosage, $expiredOn, $price ,$id){
    global $expiringDate;
    global $addedDate;  
    global $newDose;  
    $currentTime = time();//lets us process the time
    $expiredsec = strtotime($expiringDate);
    $nowSec = $expiredsec - $currentTime;
    $nowsecToDays = $nowSec / (60 * 60 * 24);
    $availableDays = floor($nowsecToDays);
    
    //Bellow if statement used to check if someone fill all required information
    if($category && $medicalname  && $dosage && $expiredOn){
      //lets us check if user try to add expired medics
      $currentTime = time();
      $addedTime = strtotime($expiredOn);
      if($addedTime <= $currentTime){//Look if medics added was expired
        $message = base64_encode("It look like you want to add expired medics please make sure you check medical details correct");
        header("location:../dashbord/dashbord.php?page=AddsingleMedics&&medic=$medicalname&&msg=$message");
      }elseif($availableDays < 30){//Lets us see if there is an expired ,edics
        
        $message = base64_encode("Sorry available $medicalname remain with only $availableDays days to expire delete an expired medics first");
        header("location:../dashbord/dashbord.php?page=AddsingleMedics&&medic=$medicalname&&msg=$message");

      }else{
        $sql = "INSERT into last_inserted(md_id,medical_name,medical_dosage,expiring_date,total_price,utoken)
        VALUES('$id','$medicalname',' $newDose','$expiredOn','$price','$utoken')";
 
        $query = mysqli_query($conn, $sql);
        if($query){
           $updaTe = "UPDATE medics SET medical_dosage='$dosage',expiring_date='$expiredOn' where medics.id='$id'";
           $query = mysqli_query($conn, $updaTe);
           if($query){
            header("location:../dashbord/dashbord.php?page=AddsingleMedics&&medic=$medicalname&&status=succes");
           }
           
        }
      }
       
       

    }else{
    
        $message = base64_encode("Please all neccessary information is required");
        header("location:../dashbord/dashbord.php?page=AddsingleMedics&&medic=$medicalname&&msg=$message");
    }

  }
    
    
    
 ?>