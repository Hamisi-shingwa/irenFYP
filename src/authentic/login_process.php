<?php
require_once("../db/dbconnect.php");
//initiation of script to handle login activities

function handleLogin($username, $password)
{
global $conn;

if ($username || $password) {
//Select relevant credential from database
$credential = "SELECT id, name, utoken, password from users WHERE email = '$username'";

//to run sql query direct to our database
$query = mysqli_query($conn, $credential);


//to check if a runed query do not return null and fetch its information
if ($query) {
$data = mysqli_fetch_array($query);
//check if runed query returned with information or not

if ($data) {
//if  fetch return true it means has data
//lets us compaire a given data with user password

$pass = $data['password'];
if (password_verify($password, $pass)) {
    //direct user to its account
    session_start();
    $_SESSION['username'] = $data['name'];
    $_SESSION['user_id'] = $data['id'];
    $_SESSION['user_token'] = $data['utoken'];
  
   
    //Then after initiate session we can allow user to get more system access
    header("location:../dashbord/dashbord.php?page=currently");
exit;
       
} else {
    $msg =  "Wrong username or password!";
    $msg = base64_encode($msg);
    header("location:../index.php?page=login&&msg=$msg");
}
} else {
$msg =  "Wrong username or password!";
$msg = base64_encode($msg);
header("location:../index.php?page=login&&msg=$msg");
}
} else {
echo "Oops, Something went wrong!";
}
} else {
$msg =  "Please, provide the required cridentials!";
$msg = base64_encode($msg);
header("location:../index.php?page=login&&msg=$msg");
}
}

handleLogin($_POST['email'], $_POST['password']);
