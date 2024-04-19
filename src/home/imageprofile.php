<?php
 
function checkImage($conn){
    $token = $_SESSION['user_token'];
    $sql = "SELECT default_profile, custome_profile from system_setting where utoken='$token'";
    $query = mysqli_query($conn, $sql);
    $hasnumber = mysqli_num_rows($query);
    if($hasnumber=="0"){
        return false;
    }
   else{
    $datas = mysqli_fetch_array($query);
    $isDefault = $datas['default_profile'];
    $isCustomed = $datas['custome_profile'];
    if($isCustomed !="NULL"){
     return $isCustomed;
    }else{
        return false;
    }
   }
}



 if(isset($_GET['page'])){
    $page = $_GET['page'];
    $lookpage = ['login','register'];
    if(in_array($page, $lookpage)){
            echo "<img src='./assets/icons/RenderedMedics0002.png' alt=''>";
      
    }else{
        include_once("../db/dbconnect.php");
        $file = checkImage($conn);
        if($file!=false) {
            echo "<img src='$file' alt=''>";
          
        }else{
            echo "<img src='../assets/icons/RenderedMedics0002.png' alt=''>";
      
        }
    }
 }else{
    echo "<img src='./assets/icons/RenderedMedics0002.png' alt=''>";
 }
?>
