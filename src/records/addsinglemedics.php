 <?php
 require_once("../db/dbconnect.php");
 $medic = $_GET['medic'];
 $token = $_SESSION['user_token'];

 $sql = "SELECT * from medics where medical_name='$medic' AND utoken='$token'";
 $query = mysqli_query($conn, $sql);
 
 if(mysqli_num_rows($query)!=0){
  $data = mysqli_fetch_array($query);
  $id = $data['id'];
  $mdcategory = $data['medical_category'];
  $mdname = $data['medical_name'];
  $mddose = $data['medical_dosage'];
  $expiredTime = $data['expiring_date'];
  $adddedTime = $data['added_date'];
 }else{
    echo "you forgi route";
    die();
 }
 ?>
 
 <div class="form-container add-singlemedics-container">
    <h4>Add <?php echo $mdname?></h4>
    <form action="../records/addsinglemedics_process.php" method="post" id='add-single-medics'>
        <div class="input-container">
            <input type="hidden" name="mdid" value="<?php echo $id?>">
            <input type="hidden" name="mddosage" value="<?php echo $mddose?>">
            <input type="hidden" name="mdname" value="<?php echo $mdname?>">
            <input type="hidden" name="mdcategory" value="<?php echo $mdcategory?>">
            <input type="hidden" name="expiringDate" value="<?php echo $expiredTime?>">
            <input type="hidden" name="addedDate" value="<?php echo $adddedTime?>">
            <label for="Available Dosage">Available Dosage</label>
            <input type="text" placeholder="type dosage amount" name="mdosage">
            <label for="Total price">Total price</label>
            <input type="text" name="price">
            <label for="Expiring Date">Expiring Date</label>
            <input type="date" name="expiredOn">
        </div>
        <div class="submit-button">
            <input type="submit" name='sbtn' id='single-submit'>
            <a href="./dashbord.php?page=searched&&medics=<?php echo $mdname?>">Cancel</a>
        </div>
        <div class="password-recall"></div>
         <div class="feedback-element <?php if(isset($_GET['msg'])) echo "show"?>">
            <div class="empty"></div>
            <p><?php if(isset($_GET['msg'])) echo base64_decode($_GET['msg']); ?></p>
         </div>
    </form>
    <?php if(isset($_GET['status'])){
       $info = $_GET['status'];
       if($info=="succes"){
        echo "
        <div class='added-feedback'>
        <div class='feedbackIcon'><img src='../assets/icons/Tick.png' alt=''></div>
        <div class='status'>Successfull Added</div>
  
    </div>
  </div>";
       }
    }
    
    ?>  
 </div>

    