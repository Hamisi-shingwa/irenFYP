<div class="form-container">
    <h4>LOGIN</h4>
    <form id="loginForm" action="./authentic/login_process.php" method="post">
         <div class="input-element">
            <div class="lable">Email</div>
             <input type="email" name="email">
         </div>
         <div class="input-element">
            <div class="lable">Passcode</div>
             <input type="password" name="password">
         </div>
         <div class="signed-in">
            <div class="emptyElement"></div>
            <div class="buttonElement">
                <button class="login-button" type="submit" name="sbtn">Sign in</button>
                <span>OR</span>
                <button class="login-button"><a href="./index.php?page=register">Register now</a></button>
            </div>
         </div>
         <div class="password-recall"></div>
         <div class="feedback-element <?php if(isset($_GET['msg'])) echo "show"?>">
            <div class="empty"></div>
            <p><?php if(isset($_GET['msg'])) echo base64_decode($_GET['msg']); ?></p>
         </div>
    </form>
</div>