<?php
 require_once("./db/dbconnect.php");
 $sql = "SELECT system_name from system_setting";
 $query = mysqli_query($conn, $sql);
 $hasName = false;
 if(mysqli_num_rows($query)!=0){
   $hasName = true;
   $sysname = mysqli_fetch_array($query)['system_name'];
 }
 

?>
<div class="exnav_container">
    <div class="exnav_header">
        <div class="exnav_text">Welcome !</div>
        <div class="exnav_dashbord"></div>
    </div>

    <div class="exnav_jumbotron">
        <div class="exnav_jumbotrone_content">
            <div class="system_logo">
               <?php require "./home/systemlogo.php"?>
            </div>
            <div class="search_element_contaner">
            <div class="search_element search-home">
         <?php
            if($hasName){
                if($sysname!="NULL"){
                    echo $sysname;
                }else{
                    echo "PHARMACY MANAGEMENT SYSTEM";
                }
            }else{
                echo "PHARMACY MANAGEMENT SYSTEM";
            }
         ?>
                
            </div>
            
            </div>
           
           <div class="exnavbar-link-element">
           <a href="./index.php?page=aboutus">About me</a>
            <a href="./index.php">Home</a>
            <div class="exnav_login_btn">
                <a href='./index.php?page=login'><button class="exnavlogin_btn btncolor">Login</button></a>
            </div>
           </div>
        </div>
    </div>
</div>