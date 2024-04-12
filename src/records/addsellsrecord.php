<?php
require_once("../db/dbconnect.php");
//here we run sql to filter available medics in our database
$sql = "SELECT medical_name from medics";
$query = mysqli_query($conn, $sql);
$hasMedics = false;
if(mysqli_num_rows($query)!=0){
    $hasMedics = true;
}
?>
<div class="form-container">
    <h4>SELLS RECORD BLOCK</h4>
    <form id="loginForm" action="../records/addsellsrecord_process.php" method="post">
        
            <label for="name" class="lable">Medical Name</label>
             <select name="medics" id="selectmedics">
                <?php
               while( $datas = mysqli_fetch_array($query)){
                 $data = $datas['medical_name'];
                   echo "<option value='$data'>$data</option>";
               }
                ?>
                
             </select>
        
            <lable class="lable">Dosage</lable>
             <input type="text" name="dosage" placeholder="eg 2 or 2.5">

            <label class="lable">Total Price</label>
             <input type="text" name="price" placeholder="price" placeholder="option">
 
         <div class="submit-in">
            <div class="emptyElement"></div>
            <div class="buttonElement">
                <button class="submit-button" type="submit" name="sbtn">Submit</button>
            </div>
</div>
         <div class="password-recall"></div>
         <div class="feedback-element <?php if(isset($_GET['msg'])) echo "show"?>">
            <div class="empty"></div>
            <p><?php if(isset($_GET['msg'])) echo base64_decode($_GET['msg']); ?></p>
         </div>
    </form>
    <?php if(isset($_GET['status'])){
       $info = $_GET['status'];
       if($info=="success"){
        echo "
        <div class='added-feedback'>
        <div class='feedbackIcon'><img src='../assets/icons/Tick.png' alt=''></div>
        <div class='status'>Successfull added</div>
  
    </div>
  </div>";
       }
    }
    
    ?>
