<?php
// Below is script for registration page
//We start by call dbconnect file in order to get access of our database so us to store user information
require_once("../db/dbconnect.php");

//These line below is call registration function and it pass name of each input type in our register form as argument
registration($conn, $_POST['name'],$_POST['phone'],$_POST['email'], $_POST['password'], $_POST['cpassword']);

//Here is where we declare our function and pass some argument
function registration($conn, $user_name,$phone, $email, $password, $c_password)
{
    //If condition to validate or proove if user fill all value of form
if ($conn && $user_name && $phone && $email && $password && $c_password) {

    //If condition to check if user was capable to type his or her password twice without made mistake
if ($password == $c_password) {
    //we run query to see if user register was arleady exist or not
$select_query = "SELECT COUNT(users.name) as 'users_count' FROM users WHERE users.name = '$user_name'";
$select_query_execution = mysqli_query($conn, $select_query);

if ($select_query_execution) {
    //Here we circle through our query to see if there is any resut
$possible_users_count = mysqli_fetch_array($select_query_execution);
//then if statement to know if our fecth return any value and if not it means the value will be zero
if ($possible_users_count['users_count'] == 0) {

    //we create token to get newtoken for new user who register
$token = md5( rand(1000,9999));
$token = uniqid(true, $token);

//here we encript user password by using hash function(password_hash function)
$c_password = password_hash($c_password, PASSWORD_DEFAULT);

//Finally we store our new user detail
$insert_query = "INSERT INTO users (name,phone,email, password,utoken) VALUES ('$user_name','$phone','$email', '$c_password','$token')";
$insert_query_execution = mysqli_query($conn, $insert_query);
if ($insert_query_execution) {
    //After store user information then we run query to get stored 
    //information so as we can store it within a session to allow user migrate smoothly within a system
$select_query = "SELECT id, name, utoken, password from users WHERE users.email = '$user_name'";
$select_query_execution = mysqli_query($conn, $select_query);
if ($select_query_execution) {
$user_data = mysqli_fetch_array($select_query_execution);
//Then we start our session
session_start();
$_SESSION['username'] = $user_name;
$_SESSION['user_id'] = $user_data['id'];
$_SESSION['user_token'] = $user_data['utoken'];

//Then after initiate session we can allow user to get more system access
header("location:../dashbord/dashbord.php?page=currently");
exit;
}
}
} else {
$message = base64_encode("This username already exist!");
}
} else {
$message = base64_encode("Oops! Something wen't wrong!");
}
} else {
$message = base64_encode("Passwords don't match!");
}
} else {
$message = base64_encode("Please provide all credentials!");
}
//This header(re-direction) id to return feedback if user don't fill all necessary information or is arleady registered user
header("location: ../index.php?page=register&&msg=$message");
}
