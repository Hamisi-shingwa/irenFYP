<?php
$token = $_SESSION['user_token'];
require_once("../db/dbconnect.php");

$sql = "SELECT medical_category, medical_name from medics where utoken='$token'";
$query = mysqli_query($conn, $sql);
?>
<div class="publucaside_container">
    <div class=" dashbord-image-profile"> 
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
         if(mysqli_num_rows($query)!=0){
            while($datas = mysqli_fetch_array($query)){
                $medcategory = $datas['medical_category'];

                echo " <div class='available_medics'>";
                 echo "<div class='medical_Category'>$medcategory</div>";
                 $newQuery = "SELECT medical_name from medics where medical_category='$medcategory'";
                 $runsql = mysqli_query($conn, $newQuery);
                 while($data = mysqli_fetch_array($runsql)){
                  $medname = $data['medical_name'];
                  echo "<div class='medical_list'>";
                   echo " <a href='./dashbord.php?page=searched&&medics=$medname'>> $medname</a>";
                echo "</div>";
                 }
            echo "</div>";
            }
         }else{
            echo "No Medics";
         }
       ?>
       
    </div>
</div>