<?php
$token = $_SESSION['user_token'];
require_once("../db/dbconnect.php");

// Fetch distinct medical categories
$categoryQuery = "SELECT DISTINCT medical_category FROM medics WHERE utoken='$token'";
$categoryResult = mysqli_query($conn, $categoryQuery);

?>
<div class="publucaside_container">
    <div class="dashbord-image-profile">  
    <?php 
     if($page=='userprofile'){
        require "./userphoto.php";
     }else{
        require "../home/imageprofile.php"; 
     }
    ?>
    </div> 
    <div class="public_medicallist_container">
       <?php
         if(mysqli_num_rows($categoryResult) != 0){
            while($categoryData = mysqli_fetch_array($categoryResult)){
                $medcategory = $categoryData['medical_category'];

                echo "<div class='available_medics'>";
                echo "<div class='medical_Category'>$medcategory</div>";
                
                // Fetch medical names for the current category
                $nameQuery = "SELECT medical_name FROM medics WHERE medical_category='$medcategory' AND utoken='$token'";
                $nameResult = mysqli_query($conn, $nameQuery);
                
                while($nameData = mysqli_fetch_array($nameResult)){
                    $medname = $nameData['medical_name'];
                    echo "<div class='medical_list'>";
                    echo "<a href='./dashbord.php?page=searched&&medics=$medname'>>$medname</a>";
                    echo "</div>";
                }
                
                echo "</div>";   
            }
         } else {
            echo "No Medics";
         }
       ?>
    </div>
</div>
