<?php
 if(isset($_GET['page'])){
    $page = $_GET['page'];
    $lookpage = ['login','register','aboutus'];
    if(in_array($page, $lookpage)){
        echo "<img src='./assets/icons/phamacyIcon.png' alt='phamacylogo'>";
    }else{
        require_once("../db/dbconnect.php");
        $token = $_SESSION['user_token'];
        $sql = "SELECT default_logo, custome_logo from system_setting where utoken='$token'";
        $query = mysqli_query($conn, $sql);
        $hasnumber = mysqli_num_rows($query);
        if($hasnumber=="0"){
            return false;
        }
       else{
        $datas = mysqli_fetch_array($query);
        $isDefault = $datas['default_logo'];
        $isCustomed = $datas['custome_logo'];
        if($isDefault =="true"){
            echo "<img src='../assets/icons/phamacyIcon.png' alt='phamacylogo'>";
        }else{
            echo "<img src='$isCustomed' alt='phamacylogo'>";
        }
       }
       
    }
 }else{
    echo "<img src='./assets/icons/phamacyIcon.png' alt='phamacylogo'>";
 }
?>
