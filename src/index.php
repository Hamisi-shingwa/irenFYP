<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iren pharmacy management system fyp</title>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/css/index.css">
    <link rel="stylesheet" href="./public/css/home.css">
    <link rel="stylesheet" href="./public/css/authentic.css">
</head>
<body>
    <div class="main-container">
        <?php require "./home/exnavbar.php"?>
        <?php require "./home/publicsection.php"?>
        <div class="public-section">
            <div class="left-section">
                <?php require "./home/publicaside.php"?>
            </div>
           <div class="right-section">
            <?php 
            $page = "";
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }
             if($page){
                require "./pageviewer/pageviewer.php";
             }
             else{
               require "./home/carousal.php";
             }
            ?>
          
           </div>
        </div>
    </div>
</body>
<script src="public/js/template/jquery.js" type="text/javascript"></script>
	<script src="public/js/template/bootstrap.min.js" type="text/javascript"></script>
	<script src="public/js/template/google-code-prettify/prettify.js"></script>
	
	<script src="public/js/template/bootshop.js"></script>
    <script src="public/js/template/jquery.lightbox-0.5.js"></script>
</html>