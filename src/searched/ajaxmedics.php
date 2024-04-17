<?php
session_start();
$token = $_SESSION['user_token'];
 require_once("../db/dbconnect.php");

 $sql = "SELECT medical_name from medics where utoken='$token'";
 $query = mysqli_query($conn, $sql);

 $mydata = [];
 while($datas = mysqli_fetch_array($query)){
    array_push($mydata, $datas);
 }
 echo json_encode($mydata);

?>