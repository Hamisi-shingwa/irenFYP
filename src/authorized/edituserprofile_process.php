<?php
require_once("../db/dbconnect.php");
session_start();
$token = $_SESSION['user_token'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$profile = $_FILES['profile'];
$hidden = $_POST['hidden'];
$file = "";
 
//let us check user has profile or not
if(!empty($profile['tmp_name'])){ 
    $temfile = $profile['tmp_name'];
    $filename = $profile['name'];
    $ext = explode('.',$name);
    $actualExt = strtolower(end($ext));
    $unid = uniqid(true,$filename).'.'.$actualExt;
    $destination = "../assets/server/".$unid;
    move_uploaded_file($temfile, $destination);
    $file = $destination;
}else{
    $file = $hidden;
}

$update = "UPDATE users SET users.name='$name',phone='$phone',email='$email',users.profile='$file' where users.utoken='$token'";
$query = mysqli_query($conn, $update);

if($query){
    header("location:../dashbord/dashbord.php?page=userprofile&&status=success");
}
