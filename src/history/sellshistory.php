<?php
require_once("../db/dbconnect.php");

$sql = "SELECT * from sells";
$query = mysqli_query($conn, $sql);

$n =1;
if(mysqli_num_rows($query) != 0){
    echo "<div class='displayed-histry'>
    <div>Number</div>
    <div>Medics</div>
    <div>Selled Dosage</div>
    <div>Selled Amount</div>
    <div>Selled Date</div> 
    <div>Delete</div> 
  </div>";
    while($datas = mysqli_fetch_array($query)){
        $id = $datas['id'];
        $name = $datas['medical_name'];
        $dose = $datas['dose'];
        $price = $datas['total_price'];
        $date = $datas['date'];

        echo "<div class='displayed-histry'>
          <div>$n</div>
          <div>$name</div>
          <div>$dose</div>
          <div>$price</div>
          <div>$date</div>
          <div class='delete'>Delete</div>
          <a style='display:none;' href='../authorized/deletemedics.php?mdid=$id&&page=Sellhistory'></a>
        </div>";
        $n++;
    }
}else{
    echo "<div class='no-sells-info'>
    <div class='info'>You don't have any sells records</div>
    <div class='btn'>
        <a href='../dashbord/dashbord.php?page=Sellsrecord'><button>Record what you Sell</button></a>
    </div>
</div>";
}
?>
