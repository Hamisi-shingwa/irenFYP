<?php
$page =="Sellsrecord" ? require "../records/addsellsrecord.php": "";
$page =="Addmedics" ? require "../records/addnewmedics.php": "";
$page =="Sellhistory" ? require "../history/sellshistory.php": "";
$page =="userprofile" ? require "../authorized/edituserprofile.php": "";
$page =="Expiredmedics_less" ? require "../system_alerts/lesexpiredlist.php": "";
?>