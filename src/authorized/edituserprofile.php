<?php
require_once("../db/dbconnect.php");
//let take available profile informmation
$token = $_SESSION['user_token']; 
$sql = "SELECT users.name,phone,email,profile from users where users.utoken='$token'";
$query = mysqli_query($conn, $sql);

if($query){
    $datas = mysqli_fetch_array($query);
    $name = $datas['name'];
    $phone = $datas['phone']; 
    $email = $datas['email'];
    $profile = $datas['profile'];
   
}else{
    $message = base64_encode("something wrong while try to retrieve your information");
    header("location:../dashbord/dashbord.php?page=userprofile?msg=$message");
}

?>
<div class='form-container edit-user-container'>
    <h4>USER PROFILE</h4>
   <form action="../authorized/edituserprofile_process.php" method="post" enctype="multipart/form-data">
   <div class='profile-picture'>
       <?php if($profile=="NULL"){
        echo "<img src='../assets/icons/person.png' alt=''>";
       }else echo " <img src='$profile' alt=''>"
       ?>
        <input type='file' name='profile' id='profileInput'>
        <input type='hidden' name='hidden' id='hiddenFile' value='<?php echo $profile?>'>
    </div>
    <div class='down-info'>
        <div class='top-downinfo'>
            <div class='left-downifo'>
                <Label>Full Name</Label>
                <input type='text' name='name' value='<?php echo $name?>' required></div>
            <div class='right-downifo'>
                <Label>Phone</Label>
                <input type='text' name='phone'  value='<?php echo $phone?>' required></div>
            </div>
        </div>
        <div class='down-downinfo'>
        <div class='left-downifo'>
                <Label>Email</Label>
                <input type='email' name='email'  value='<?php echo $email?>' required></div>
            <div class='right-downifo'>
                <Label></Label>
                <input type='submit' name='sbtn' value='Edit'></div>
            </div>
        </div>
    </div>
  
   </form>
   
   <?php if(isset($_GET['status'])){
       $info = $_GET['status'];
       if($info=="success"){
        echo "
        <div class='added-feedback'>
        <div class='feedbackIcon'><img src='../assets/icons/Tick.png' alt=''></div>
        <div class='status'>Successfull added</div>
  
    </div>";

       }
    }
    
    ?>
      
</div>
<div class="feedback-element <?php if(isset($_GET['msg'])) echo "show"?>">
            <div class="empty"></div>
            <p><?php if(isset($_GET['msg'])) echo base64_decode($_GET['msg']); ?></p>
         </div>