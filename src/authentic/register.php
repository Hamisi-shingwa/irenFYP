<div class="form-container">
    <h4>REGISTER</h4>
    <form id="registerForm" action="./authentic/register_process.php" method="post">
         <div class="input-element">
            <div class="lable">Name</div>
             <input type="text" name="name">
         </div>
         <div class="input-element">
            <div class="lable">Phone</div>
             <input type="number" name="phone">
         </div>
         <div class="input-element">
            <div class="lable">Email</div>
             <input type="email" name="email">
         </div>
         <div class="input-element">
            <div class="lable">Passcode</div>
             <input type="password" name="password">
         </div>
         <div class="input-element">
            <div class="lable">Retype-Pascode</div>
             <input type="password" name="cpassword">
         </div>
         <div class="reg-button">
            <div class="empty"></div>
            <button type="submit" name="sbtn">Register</button>
         </div>
         <div class="feedback-element <?php if(isset($_GET['msg'])) echo "show"?>">
            <div class="empty"></div>
            <p><?php if(isset($_GET['msg'])) echo base64_decode($_GET['msg']); ?></p>
         </div>
    </form>
</div>