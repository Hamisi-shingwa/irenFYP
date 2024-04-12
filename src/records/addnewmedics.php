
<div class="form-container">
    <h4>ADD MEDICAL BLOCK</h4>
    <form id="addnewMedic" action="../records/addnewmedics_process.php" method="post">
        <div class="topInfo">
            <div class="left-details">
              <label for="Categort/Department">Department</label>
              <input type="text" name="category" placeholder="eg surgery">
            </div>
            <div class="right-details">
              <label for="Medical Name">Medical Name</label>
              <input type="text" name="medicalname" placeholder="eg paracetum">
            </div>
        </div> 
        <div class="topInfo">
            <div class="left-details">
              <label for="Total dosage">Total dosage</label>
              <input type="text" name="dosage" placeholder="Eg 2 or 2.5">
            </div>
            <div class="right-details">
              <label for="Price per dose">Price per dose</label>
              <input type="text" name="price" placeholder="eg 20000">
            </div>
        </div>
        <div class="topInfo">
            <div class="left-details">
            <label for="Expired On">Expired On</label>
            <input type="date" name="expiredOn">
            </div>
            <div class="right-details">
                <div class="emty"></div>
             <input type="submit" name="sbtn" value="Add">
            </div>
        </div>
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
   