<?php 
   session_start();
   if( !isset($_SESSION['a']) ){
       header("Location: logout.php");
       exit();
   }
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
    <link rel="shortcut icon" href="resources/imageS/ekirs.ico">
</head>
<body>
    <!-- header section -->
    <header>
       <?php include_once('resources/header.php'); ?>
    </header>
     <!-- main section -->
     <main>
         <div class="container mt-5">
             <div class="row">
                 <div class="col-sm-3">
                     <div class="card">
                         <div class="card-header">
                             <h6>Add Question</h6>
                         </div>
                         <div class="card-body text-center">
                           <p class="card-text">You can add as many quetion you want here</p>
                           <a href="add_question.php" class="btn btn-primary">Proceed</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <div class="card">
                         <div class="card-header">
                             <h6>View All Question</h6>
                         </div>
                         <div class="card-body text-center">
                           <p class="card-text">View all added questions you want here</p>
                           <a href="view_question.php" class="btn btn-primary">Proceed</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <div class="card">
                         <div class="card-header">
                             <h6>View Result</h6>
                         </div>
                         <div class="card-body text-center">
                           <p class="card-text">you can view all exam reports here</p>
                           <a href="result.php" class="btn btn-primary">Proceed</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <div class="card" disabled="disabled">
                         <div class="card-header">
                             <h6>Edit Question</h6>
                         </div>
                         <div class="card-body text-center">
                           <p class="card-text">You can add as many quetion you want here</p>
                           <a href="#" class="btn btn-primary">Proceed</a>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </main>
</body>
</html>