    <?php
    include "../system_alerts/searchexpired.php";
   
     if($expired > 0){
       echo " <div class='alert-container'>

         <div class='alerts-number'>$expired alerts</div>
         <div class='alert-message'>
          <a href='./dashbord.php?page=Expiredmedics_less'>Dosage of some medics was  arleady or near by to expire click to view it</a>
         </div>
         </div>";
     }
  
    ?>
      