<?php
require_once("./db/dbconnect.php");
$sql = "SELECT  * from system_setting";
$query = mysqli_query($conn, $sql);

$hasabout = mysqli_num_rows($query);
if($hasabout!=0){
    $datas = mysqli_fetch_array($query);
    $name = $datas['system_name'];
    $address = $datas['physical_address'];
    $content = $datas['about_content'];
}
?>
<div class="aboutus">
    <h4><?php echo $name?></h4>
    <div class="address"><?php echo $address?></div>
    <div class="about-content"><?php echo $content?></div>
</div>