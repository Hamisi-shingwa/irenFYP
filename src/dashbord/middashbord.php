<div class="middashbord-container">
    <div class="top">
        <div class="login-status">LOGED</div>
        <div class="warning-container">
           <?php
            include "../system_alerts/searchedwarning.php";
           if($lessdose > 0){
            echo"
            <div class='warning-size'>($lessdose)</div>
            <a href='./dashbord.php?page=warningList'><div class='warning-info'>avaiable warning</div></a> ";
           
           }elseif($lessdose==0){
            echo"
            <div class='warning-size'>(0)</div>
           <div class='warning-info'>avaiable warning</div> 
            ";
           }
           ?>
        </div>
    </div>
    <div class="downside">
        <div class="current-status"> 
             <?php if(isset($_GET['page'])){
                echo $_GET['page']; 
            }
            else echo "sells"?></div>
        <div class="reft-link">
            <div class="av-link">
                <div class="icons"><img src="../assets/icons/backup.png" alt=""></div>
                <a href="./dashbord.php?page=Sellhistory"><div class="text">Sell history</div></a>
            </div>
            <div class="av-link">
                <div class="icons"><img src="../assets/icons/add.png" alt=""></div>
                <a href="./dashbord.php?page=Addmedics"><div class="text">Add Medics</div></a>
            </div>
            <div class="av-link">
                <div class="icons"><img src="../assets/icons/new.png" alt=""></div>
                <a href="./dashbord.php?page=Sellsrecord"><div class="text">New sells</div></a>
            </div>
            <div class="av-link">
                <div class="icons"><img src="../assets/icons/notification.png" alt=""></div>
                <?php
              
                if($expired==0){
                   echo "<a href='./dashbord.php?page=Expiredmedics_less'><div class='text'>Expired</div></a>";
                }elseif($expired > 0){
                    echo "<a href='./dashbord.php?page=Expiredmedics_less'><div class='text danger'>Expired($expired)</div></a>";
                }
                elseif($warning=='warning'){
                    echo "<a href='./dashbord.php?page=Expiredmedics'><div class='text warning'>Expired</div></a>";
                }
                ?>
            </div>
        </div>
    </div>
</div>