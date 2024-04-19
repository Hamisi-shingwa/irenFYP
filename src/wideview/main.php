<?php
session_start();

//we check if someone access system is not login user
if(!$_SESSION['user_token'] && !$_SESSION['username']){
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iren pharmacy management system fyp</title>
    <link rel="stylesheet" href="../public/css/index.css">
    <link rel="stylesheet" href="../public/css/home.css">
    <link rel="stylesheet" href="../public/css/dashbord.css">
    <link rel="stylesheet" href="../public/css/records.css">
    <link rel="stylesheet" href="../public/css/authorized.css">
    <link rel="stylesheet" href="../public/css/seached.css">
</head>
<body>
<script src="../public/js/vanila/pre-loader.js"></script>
    <div class="main-container">
        <?php require "./wideviewinnav.php"?>
        <div class="medical_displayed">    
            <?php require "../searched/medical_list.php"?>
        </div>
    </div> 
    <div class='dialog-container'>
          <div class='dialog-message'>Are you sure want to delete it?</div>
          <div class='dialog-action'>
            <div class='yes'><button>Yes</button></div>
            <div class='no'><button>No</button></div>
          </div>
        </div>   
</body>
<script src="../public/js/vanila/dashbord.js"></script>
</html>