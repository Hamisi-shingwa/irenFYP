<div class='form-container edit-user-container'>
    <h4>USER PROFILE</h4>
   <form action="../authorized/edituserprofile_process.php">
   <div class='profile-picture'>
        <img src='../assets/icons/person.png' alt=''>
        <input type='file' name='profile' id='profileInput'>
    </div>
    <div class='down-info'>
        <div class='top-downinfo'>
            <div class='left-downifo'>
                <Label>Full Name</Label>
                <input type='text' name='name' value='Hamisi'></div>
            <div class='right-downifo'>
                <Label>Phone</Label>
                <input type='text' name='phone' value='078799'></div>
            </div>
        </div>
        <div class='down-downinfo'>
        <div class='left-downifo'>
                <Label>Email</Label>
                <input type='email' name='email' value='Hamis@gmail.com'></div>
            <div class='right-downifo'>
                <Label></Label>
                <input type='submit' name='sbtn' value='Edit'></div>
            </div>
        </div>
    </div>
  
   </form>
   
   <?php if($n='1'){
    //    $info = $_GET['status'];
    //    if($info=="success"){
        echo "
        <div class='added-feedback'>
        <div class='feedbackIcon'><img src='../assets/icons/Tick.png' alt=''></div>
        <div class='status'>Successfull added</div>
  
    </div>";

       }
    // }
    
    ?>
      
</div>
<div class="feedback-element <?php if(isset($_GET['msg'])) echo "show"?>">
            <div class="empty"></div>
            <p><?php if(isset($_GET['msg'])) echo base64_decode($_GET['msg']); ?></p>
         </div>