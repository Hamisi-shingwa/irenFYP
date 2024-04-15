  <?php
   require_once("../db/dbconnect.php");
   $token = $_SESSION['user_token'];

   $sql = "SELECT profile from users where utoken='$token'";
   $query = mysqli_query($conn, $sql);
    
   if(mysqli_fetch_array($query)[0] != 'NULL'){
     $photo = mysqli_fetch_array($query)[0];
     echo "<div class='photo'><a href='./dashbord.php?page=userprofile'><img src='$photo' alt=' '></a></div>";
   }else{
    echo "<div class='photo'><a href='./dashbord.php?page=userprofile'><img src='../assets/icons/person.png' alt=' '></a></div>";
   }
 ?> 

