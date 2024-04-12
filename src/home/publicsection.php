
  <div class="topsection_element">
    <div class="left_section_top"></div>
    <div class="right_section_top">
        <div class="active_page">Home/</div>
        <div class="active_section">
            <?php if(isset($_GET['page'])){
                echo $_GET['page'];
            }
            else echo "Landing"?>
        </div>
    </div>
  </div>
