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

  $sql = "DELETE from medics where id='$mdid'";
  $query = mysqli_query($conn, $sql);

  if($query){
    $page == "lesexpired" ? header("location:../dashbord/dashbord.php?page=Expiredmedics_less") : "";
    $page == "leswarning" ? header("location:../dashbord/dashbord.php?page=warningList1") : "";
  }
}
?>