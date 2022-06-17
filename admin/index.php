<?php 
   # including bootstrap resources 
   include_once('resources/include.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKIRS ADMIN</title>
    <link rel="shortcut icon" href="resources/images/ekirs.ico">
    <!-- custom resources -->
    <link rel="stylesheet" href="resources/customCss/index.css">
    <script src="resources/customJs/index.js"></script>
</head>
<body>
    <!-- header section -->
    <header>
       <?php include_once('resources/header.php'); ?>
    </header>
    <!-- main section -->
    <main>
        <div class="row">
                 <div class="col-lg-8 col1">
                     <div class="heading">WELCOME TO EKIRS JOB APPLICATION ADMIN CONTROL</div>
                     <div class="heading_text py-2">
                         <p>Only admin can access should proceed to login</p>
                     </div>

                 </div>
                 <div class="col-lg-4 col2">
                     <div id="message" class="py-3"></div>
                     <div class="heading2">To continue please login here :</div>
                     <div class="inputbox"><input class="form-control" type="text" id="surname" name="" placeholder="username"  autocomplete="off" required></div>
                     </br>
                     <div class="inputbox"><input class="form-control" type="password" id="phone" name="" placeholder="password"  autocomplete="off" required></div>
                     <div class="bttn"><button class="btn btn-primary shadow-lg" type="button" id="login"> Login <i class="continue-arrow fas fa-long-arrow-alt-right"></i><i class="progress-circle fa fa-circle-notch fa-spin" style="font-size:24px; display:none"></i></button></div>
                </div>
        </div>
   </main>
    <!-- footer section -->
   <footer>

   </footer>
</body>
</html>