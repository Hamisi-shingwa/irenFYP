<?php
session_start();
error_reporting(0);
$token = $_SESSION['user_token'];
require_once('../db/dbconnect.php');

$sname = $_POST['sname'];
$uaddress = $_POST['uaddress'];
$aboutcontent = $_POST['aboutcontent'];
    $profile = $_POST['profile'] ? "true" : "NULL";
    $logo = $_POST['logo']  ? "true" : "false";
$profileChecked = $_POST['profileChecked']; 
$logoChecked = $_POST['logoChecked'];
$cprofile = $_FILES['cprofile'];
$clogo = $_FILES['clogo']; 
$profilevalue = $_POST['profilevalue'];
$logovalue = $_POST['logovalue'];
$hasCustomeLogo = $logovalue;
$hasCustomeprofile = $profilevalue;
//Then lets us create function for upload file

$profile=="NULL" ? $profileChecked = "false" : $profileChecked = "true";
$logo=="false" ? $logoChecked = "false" : $logoChecked = "true";

function fileUploads($myfile){
  $fileSource = $myfile['tmp_name'];
  $name = $myfile['name'];
  $ext = explode('.',$name);
  $actualExt = strtolower(end($ext));
  $uid = uniqid(true, $name).'.'.$actualExt;
  $destination = "../assets/server/".$uid;
  move_uploaded_file($fileSource, $destination);
  return $destination;
}

if(!empty($cprofile['tmp_name'])){
    $hasCustomeprofile = fileUploads($cprofile); 

}
if(!empty($clogo['tmp_name'])){
    $hasCustomeLogo = fileUploads($clogo);
}

//then after all code to run syschronized lets us update our data
$chageValue = "UPDATE system_setting SET system_name='$sname', default_profile='$profileChecked',custome_profile='$hasCustomeprofile',
default_logo='$logoChecked',custome_logo='$hasCustomeLogo',about_content='$aboutcontent',physical_address='$uaddress' where 
utoken='$token'";

$query = mysqli_query($conn, $chageValue);
if($query){
    header("location:../dashbord/dashbord.php?page=Setting&&status=success");
}

?>