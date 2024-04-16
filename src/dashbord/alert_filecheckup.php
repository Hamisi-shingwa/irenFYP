<?php
//this file look for what alert file to be render on dashbord based on current state of medics
include "../system_alerts/searchexpired.php";//This is file that search if there is any medics expired or not

if($expired > 0){
    //Note variable expired is found in searchexpired file so don't be comfused
    require "../system_alerts/alertexpired.php";
}

?>