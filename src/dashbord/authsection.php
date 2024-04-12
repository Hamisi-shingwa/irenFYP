
  <div class="topsection_element">
    <div class="left_section_top">
        <div class="photo"><img src="../assets/icons/person.png" alt=""></div>
        <div class="infomation">
            <div class="status">Current User</div>
            <div class="name"><?php echo $_SESSION['username']?></div>
        </div>
    </div>
    <div class="right_section_top">
        <div class="active_section">
            <?php if(isset($_GET['page'])){
                echo $_GET['page'];
            }
            else echo "sells"?>
        </div>
        <div class="menu_page"><img src="../assets/icons/menu.png" alt=""></div>
    </div>
    <?php require "./displayedmenu.php"?>
  </div>
