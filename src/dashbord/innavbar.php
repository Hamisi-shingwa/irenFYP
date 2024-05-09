<?php
require_once("../db/dbconnect.php");
$token = $_SESSION['user_token'];

$sql = "SELECT medical_name from medics where utoken='$token'";
$query1 = mysqli_query($conn, $sql);

?>
<div class="exnav_container">
<div class="exnav_header">
<div class="exnav_text">Welcome !</div>
<div class="exnav_dashbord"></div>
</div>

<div class="exnav_jumbotron">
<div class="exnav_jumbotrone_content">
<div class="system_logo">
<?php require "../home/systemlogo.php"?>
</div>
<div class="search_element_contaner">
<div class="search_element">
<div class="search_icon"><img src="../assets/icons/search_FILL0_wght400_GRAD0_opsz48.png" alt=""></div>
<input type="text" class="exnav_search" id='inav-search'>
</div>
<div class="exnav_select_element">
<select name="select_element" id="select">
    <option value="">Select Medics</option>
    <?php
    while($datas = mysqli_fetch_array($query1)){
        $mdname = $datas['medical_name'];
        echo "<option value='$mdname'>$mdname</option>";  
    }
    ?>
</select>
</div>
<div class="exnavgo_btn">
<button id='innavbutton'>GO</button>
</div>
</div>

<div class="exnavbar-link-element">
<a href="../wideview/main.php?page=allMedics">Available medics</a>
<a href="./dashbord.php?page=Addmedics">New medics</a>
<div class="exnav_login_btn">
<a href='../authentic/logout.php'><button class="exnavlogin_btn btncolor">Logout</button></a>
</div>
</div>
</div>
</div>
</div>