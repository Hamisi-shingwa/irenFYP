<?php
 if(isset($_GET['page'])){
    $page = $_GET['page'];
    $lookpage = ['login','register'];
    if(in_array($page, $lookpage)){
        echo "<img src='./assets/icons/RenderedMedics0002.png' alt=''>";
    }else{
        echo "<img src='../assets/icons/RenderedMedics0002.png' alt=''>";
    }
 }else{
    echo "<img src='./assets/icons/RenderedMedics0002.png' alt=''>";
 }
?>
