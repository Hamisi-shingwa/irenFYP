    <?php
    include "../system_alerts/searchexpired.php";
   
     if($expired > 0){
       echo " <div class='alert-container'>

         <div class='alerts-number'>$expired alerts</div>
         <div class='alert-message'>
           <p> Dosage of some medics was  arleady or near by to expire<a href='./dashbord.php?page=Expiredmedics_less'>click here to view it</a></p>
          
         </div>
         </div>";
     }
  
    ?>
      