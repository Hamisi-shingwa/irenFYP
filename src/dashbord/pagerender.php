<?php
$page =="Sellsrecord" ? require "../records/addsellsrecord.php": "";
$page =="Addmedics" ? require "../records/addnewmedics.php": "";
$page =="AddsingleMedics" ? require "../records/addsinglemedics.php": "";
$page =="Sellhistory" ? require "../history/sellshistory.php": "";
$page =="userprofile" ? require "../authorized/edituserprofile.php": "";
$page =="Setting" ? require "../authorized/changesystemsetting.php": "";
$page =="EditMedics" ? require "../authorized/editmedics.php": "";
$page =="Expiredmedics_less" ? require "../system_alerts/lesexpiredlist.php": "";
$page =="warningList1" ? require "../system_alerts/leswarninglist.php": "";
$page =="searched" ? require "../searched/searched_medics.php": "";
?>