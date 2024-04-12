<?php
// pageViewer is file that respond for call file base on what user click
//We define all route in  array so as to prevent user from guesing his or her own route which is unknown by system
  $mypages = ["login","register"];
  
    if(!in_array($page, $mypages)){
        require "./pageviewer/unauthorized.php";
    }else{
        $page == "login" ? require "./authentic/login.php" : "";
        $page == "register" ? require "./authentic/register.php" : "";
    }
  
 
?>