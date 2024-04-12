<?php
 session_start();
 //Lets us know one access the page
 $utoken = $_SESSION['user_token'];

 //First let us require database connection file
 require_once("../db/dbconnect.php");
 $medics = $_POST['medics'];
 $dosage = $_POST['dosage'];
 $price = $_POST['price'];
 

//call here our insert function
insertNewMedics($conn, $utoken, $medics, $dosage, $price);

 //function that insert newmedics
 function insertNewMedics($conn, $utoken, $medics, $dosage, $price){

   //Check if has something to sell
   if($medics){
 //Bellow if statement used to check if someone fill all required information
 if($medics && $dosage  && $price){
    //Let us know if dosage available on database meet the dosage amount user want to sell
    $sql = "SELECT medical_dosage from medics where medical_name = '$medics'";
    $query = mysqli_query($conn, $sql);
    if($query){
        $AvailableDosage = mysqli_fetch_array($query)['medical_dosage'];
        if($AvailableDosage > $dosage){
           //Insert all records to database
   $sql = "INSERT into sells(medical_name,dose,total_price,utoken)
   VALUES('$medics','$dosage','$price','$utoken')";

   $query = mysqli_query($conn, $sql);
   if($query){
    //if all data arleady inserted then we update available dosage on medics
    $newDose = $AvailableDosage - $dosage;
    $updateDosageAmount = "UPDATE medics SET medical_dosage = '$newDose' where medical_name='$medics'";
    $updatequery = mysqli_query($conn, $updateDosageAmount);
    if($updatequery){
        header("location:../dashbord/dashbord.php?page=Sellsrecord&&status=success");
    }
  
   }
        }else{
            $message = base64_encode("You try to enter too more dose than your reserve which is only $AvailableDosage dosage");
            header("location:../dashbord/dashbord.php?page=Sellsrecord&&msg=$message");
        }
         
    }else{
        $message = base64_encode("Internal error occur while trying to verify dosage of selected medics");
        header("location:../dashbord/dashbord.php?page=Sellsrecord&&msg=$message");
    }
   

}else{
    $message = base64_encode("Please all neccessary information is required");
    header("location:../dashbord/dashbord.php?page=Sellsrecord&&msg=$message");
}

   }else{
    $message = base64_encode("It look like you don't have any medical please add medical first");
    header("location:../dashbord/dashbord.php?page=Sellsrecord&&msg=$message");
   }
  }
    
    
    
 ?>