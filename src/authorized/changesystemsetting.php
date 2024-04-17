<div class="form-container">
    <h4>SYSTEM SETTING</h4>
     <form action="../authorized/changesystemsetting_process.php" method="post" id="system-setting">
     <div class="top-system-content">
        <label for="System Name">System Name</label>
        <input class='setting-input' type="text" name="sname">
        <label for="User Address">User Address</label>
        <input class='setting-input' type="text" name="uaddress">
        <label for="About Content">About Content</label>
        <textarea name="aboutcontent" id="aboutcontent" cols="30" rows="10"></textarea>
      </div>
      <div class="bellow-system-content">
        <div class="use-default-profile">
           <div class="left-one">
           <label for="Use default profile">Use default profile</label>
            <input type="checkbox" name="profile">
           </div>
           <div class="right-one">
           <label for="Use default profile">Use default profile</label>
            <input type="checkbox" name="logo">
           </div>

        </div>
        <div class="upload-custome-profile">
            <div class="system-profile">
                <label for="Make Custome Profile">Make Custome Profile</label>
                <div class="custome-image"><img src="../assets/icons/person.png" alt="img"></div>
                <input type="file" name="cprofile">
            </div>
            <div class="system-logo">
                <label for="Make Custome Logo">Make Custome Logo</label>
                <div class="custome-image"><img src="../assets/icons/person.png" alt=""></div>
                <input type="file" name="clogo">
            </div>
        </div>
        <input type="submit" name="sbtn" value="save">
      </div>
     </form>
</div>