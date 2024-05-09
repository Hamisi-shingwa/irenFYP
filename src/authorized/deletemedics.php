<?php
// lets know user token
session_start();
$token = $_SESSION['user_token'];
if(!$token){
    header("location:../index.php");// prevent an attacker from directory tracing
}else{
    require_once("../db/dbconnect.php");
  $page = $_GET['page'];
  $mdid = $_GET['mdid'];
  $Medics = $_GET['medics'];
 
  $sql = "DELETE from medics where id='$mdid'";
  $query1 = mysqli_query($conn, $sql);

   $sql2 = "DELETE from last_inserted where id='$mdid'";
   $query = mysqli_query($conn, $sql2);
  if($query){
    $page == "lesexpired" ? header("location:../dashbord/dashbord.php?page=Expiredmedics_less") : "";
    $page == "leswarning" ? header("location:../dashbord/dashbord.php?page=warningList1") : "";
    $page == "searched" ? header("location:../dashbord/dashbord.php?page=searched&&medics=$Medics") : "";
    $page == "allMedics" ? header("location:../wideview/main.php?page=allMedics&&medics=$Medics") : "";
    if($page=="Sellhistory"){
      $sql2 = "DELETE from sells where id='$mdid'";
      $query = mysqli_query($conn, $sql2);
      header("location:../dashbord/dashbord.php?page=Sellhistory");
    }

  }
}
?>