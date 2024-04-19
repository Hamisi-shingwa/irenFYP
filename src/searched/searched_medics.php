<?php
require_once("../db/dbconnect.php");
$token = $_SESSION['user_token'];
$medname = $_GET['medics'];
$sql = "SELECT * from medics where medical_name = '$medname' AND utoken='$token'";
$query = mysqli_query($conn, $sql);

if(mysqli_num_rows($query) !=0){
$data = mysqli_fetch_array($query);
$mdid = $data['id'];
$medical_category = $data['medical_category'];
$medical_name = $data['medical_name'];
$medical_dosage = $data['medical_dosage'];
$medical_lebel = $data['medical_lebel'];

$mdlevel = "Norm";
if($medical_dosage < 8 && $medical_dosage > 5){
    $mdlevel = "Low";
}elseif($medical_dosage <= 4){
    $mdlevel = "Ver Low";
}else{
    $mdlevel = "Norm";
}
}else{
     require "../searched/deletefeedback.php";
    echo "<script src='../public/js/vanila/dashbord.js'></script>";
    die();  
}
?>

<div class="seached-container">
    <h4><?php  echo $medical_category?></h4>

    <div class="medical-information">
        <div class="top-medics-info">
            <div class="left-medic-info">
                <img src="../assets/icons/RenderedMedics0002.png" alt="">
            </div>
            <div class="right-medics-info">
                <table border='1'>
                    <tr><th colspan="200" >Overall Dosage</th> <th><?php  echo $medical_dosage?></th></tr>
                    <tr><th colspan="200" >Expired</th> <th>0</th></tr>
                    <tr><th colspan="200" >Level</th> <th><?php echo $mdlevel?></th></tr>
                </table>
            </div>
        </div>

        <div class="middle-medical-info">
            <h4>You Select <?php echo $medical_name?></h4>
            <div class="action-buttons">
                <div class="action">
                    <div class="icon deleteIcon"><img src="../assets/icons/delete.png" alt=""></div>
                    <div class="delete">Delete</div>
                    <a href='../authorized/deletemedics.php?mdid=<?php echo $mdid?>&&page=searched&&medics=<?php echo $medical_name?>'></a>
                    <a href=""></a>
                </div>
                <div class="action">
                    <div class="icon"><img src="../assets/icons/edit.png" alt=""></div>
                    <div class="text"><a href="./dashbord.php?page=EditMedics&&medic=<?php echo $mdid?>" class='add-link'>Edit</a></div>
                </div>
                <div class="action">
                    <div class="icon"><img src="../assets/icons/add.png" alt=""></div>
                    <div class="text"><a href="./dashbord.php?page=AddsingleMedics&&medic=<?php echo $medname?>" class='add-link'>Add</a></div>
                </div>
            </div>
        </div>
    </div>


</div>