<?php
 require_once("../db/dbconnect.php");
 $medic = $_GET['medic'];
 $token = $_SESSION['user_token'];

 $sql = "SELECT * from medics where id='$medic' AND utoken='$token'";
 $query = mysqli_query($conn, $sql);
 
 if(mysqli_num_rows($query)!=0){
  $data = mysqli_fetch_array($query);
  $id = $data['id'];
//   $mdid = $data['md_id'];
  $mdname = $data['medical_name'];
  $mddose = $data['medical_dosage'];
  $expiredTime = $data['expiring_date'];
  $adddedTime = $data['added_date'];
  $mdprice = $data['total_price'];
 }else{
  echo "You forgi route";
 }
 ?>
 
 <div class="form-container add-singlemedics-container">
    <h4>Edit Last inserted <?php echo $mdname?></h4>
    <form action="../authorized/editfirstadded_process.php" method="post" id='add-single-medics'>
        <div class="input-container">
            <input type="hidden" name="id" value="<?php echo $id?>">
            <input type="hidden" name="mddosage" value="<?php echo $mddose?>">
            <input type="hidden" name="mdname" value="<?php echo $mdname?>">
            <input type="hidden" name="mdid" value="<?php echo $mdid?>">
            <input type="hidden" name="expiringDate" value="<?php echo $expiredTime?>">
            <input type="hidden" name="addedDate" value="<?php echo $adddedTime?>">
            <label for="Available Dosage">Available Dosage</label>
            <input type="text" placeholder="type dosage amount" name="mdosage" value="<?php echo $mddose?>">
            <label for="Total price">Total price</label>
            <input type="text" name="price" value="<?php echo $mdprice?>">
            <label for="Expiring Da te">Expiring Date</label>
            <input type="date" name="expiredOn" value="<?php echo $expiredTime?>">
        </div>
        <div class="submit-button">
            <input type="submit" name='sbtn' id='single-submit' value="Edit">
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
        <div class='status'>Successfull Edited</div>
  
    </div>
  </div>";
       }
    }
    
    ?>  
 </div>

    