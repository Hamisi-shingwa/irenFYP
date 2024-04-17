<?php
$token = $_SESSION['user_token'];
require_once("../db/dbconnect.php");

$sql = "SELECT * from system_setting where utoken='$token'";
$query = mysqli_query($conn, $sql);

if($query){
    $datas = mysqli_fetch_array($query);
    $system_name = $datas['system_name'];
    $default_profile = $datas['default_profile'];
    $custome_profile = $datas['custome_profile'];
    $default_logo = $datas['default_logo'];
    $custome_logo = $datas['custome_logo'];
    $about_content = $datas['about_content'];
    $physical_address = $datas['physical_address'];
}
?>
<div class="setting-conatiner">
     <form action="../authorized/changesystemsetting_process.php" method="post" id="system-setting" enctype="multipart/form-data">
     <div class="top-system-content">
        <label for="System Name">System Name</label>
        <input class='setting-input' type="text" name="sname" value="<?php echo $system_name;?>">
        <label for="User Address">User Address</label>
        <input class='setting-input' type="text" name="uaddress" value="<?php echo $physical_address;?>">
        <label for="About Content">About Content</label>
        <textarea name="aboutcontent" id="aboutcontent" cols="30" rows="10" ><?php echo $about_content;?></textarea>
      </div>
      <div class="bellow-system-content">
        <div class="use-default-profile">
           <div class="left-one">
           <label for="Use default profile">Use default profile</label>
            <input type="checkbox" name="profile">
            <input type="hidden" name="profileChecked" value="<?php echo $default_profile;?>">
           </div>
           <div class="right-one">
           <label for="Use default profile">Use default Logo</label>
            <input type="checkbox" name="logo">
            <input type="hidden" name="logoChecked" value="<?php echo $default_logo;?>">
           </div>

        </div>
        <!-- Note this code is taken by javascript based on its arrangement do not change html structure until you contact with administrator -->
        <div class="upload-custome-profile">
            <div class="system-profile">
                <label for="Make Custome Profile">Upload Custome Profile</label>
                <?php
                 if($custome_profile=="NULL"){
                    echo "<div class='custome-image'><img src='../assets/icons/person.png' alt=''></div>";
                 }else{
                    echo "<div class='custome-image'><img src='$custome_profile' alt=''></div>";
                 }
                 ?>
                <input type="file" name="cprofile">
                <input type="hidden" id="profilevalue" value="<?php echo $custome_profile;?>" name="profilevalue">
            </div>
            <div class="system-logo">
                <label for="Make Custome Logo">Upload Custome Logo</label>
                 <?php
                 if($custome_logo=="NULL"){
                    echo "<div class='custome-image'><img src='../assets/icons/person.png' alt=''></div>";
                 }else{
                    echo "<div class='custome-image'><img src='$custome_logo' alt=''></div>";
                 }
                 ?>
                <input type="file" name="clogo">
                <input type="hidden" id="logovalue" value="<?php echo $custome_logo;?>" name="logovalue">
            </div>
        </div>
        <input id='setting-submit' type="submit" name="sbtn" value="save">
      </div>
     </form>
</div>