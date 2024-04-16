 <?php
 session_start();
 //Lets us know one access the page
 $utoken = $_SESSION['user_token'];

 //First let us require database connection file
 require_once("../db/dbconnect.php");
 $category = $_POST['category'];
 $medicalname = $_POST['medicalname'];
 $dosage = $_POST['dosage'];
 $expiredOn = $_POST['expiredOn'];
 $price = $_POST['price'];

//call here our insert function
insertNewMedics($conn, $utoken, $category, $medicalname, $dosage ,$expiredOn, $price);

 //function that insert newmedics
 function insertNewMedics($conn, $utoken, $category, $medicalname, $dosage, $expiredOn, $price){

    //Bellow if statement used to check if someone fill all required information
    if($category && $medicalname  && $dosage && $expiredOn){
      //lets us check if user try to add expired medics
      $currentTime = time();
      $addedTime = strtotime($expiredOn);
      if($addedTime <= $currentTime){
        $message = base64_encode("It look like you want to add expired medics please make sure you check medical details correct");
        header("location:../dashbord/dashbord.php?page=Addmedics&&msg=$message");
      }else{
         //Lets us check if is trully new medics or not
         $medicSql = "SELECT medical_dosage from medics where medical_name='$medicalname'";
         $checkquery = mysqli_query($conn, $medicSql);
      
 
         if($checkquery){
           if(mysqli_num_rows($checkquery) == 0){
              //Insert all records to database
        $sql = "INSERT into medics(medical_category,medical_name,medical_dosage,expiring_date,utoken)
        VALUES('$category','$medicalname','$dosage','$expiredOn','$utoken')";
 
        $query = mysqli_query($conn, $sql);
        if($query){
         header("location:../dashbord/dashbord.php?page=Addmedics&&status=success");
        }
           }else{
             $message = base64_encode("$medicalname is arleady available");
             header("location:../dashbord/dashbord.php?page=Addmedics&&msg=$message");
           }
         }  
      }
       
       

    }else{
        $message = base64_encode("Please all neccessary information is required");
        header("location:../dashbord/dashbord.php?page=Addmedics&&msg=$message");
    }

  }
    
    
    
 ?>