<?php
$medic = $_GET['medics'];
?>

<div class="delete-feeback-container">
    <div class="h2">Deleted complete</div>
    <div class="info">
      <div class="text-info">
      You delete <?php echo $medic?> This is no longer available within database
      </div>
      <a class='back-dashbord' href="./dashbord.php?page=currently"><button>Go to dashboard</button></a>
    </div>
</div>