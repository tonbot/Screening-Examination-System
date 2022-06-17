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
    <link rel="shortcut icon" href="resources/images/ekirs.ico">
    <link rel="stylesheet" href="resources/customCss/report.css">
    <script src="resources/customJs/index.js"></script>
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
                           <p class="card-text">you can view and download in any format exam report here</p>
                           <a href="result.php" class="btn btn-primary">Proceed</a>
                         </div>
                     </div>
                 </div>
                 <div class="col-sm-3">
                     <div class="card" disabled="disabled">
                         <div class="card-header">
                             <h6>Exam Retake/h6>
                         </div>
                         <div class="card-body text-center">
                           <p class="card-text">You can allow canditate to retake exam here</p>
                           <a href="#" class="btn btn-primary open">Proceed</a>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </main>

     <script>
        $(".open").click(function(){
           $("#my-modal").modal("show");
        });
     </script>

</body>
</html>
<div id="my-modal" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Allow Exam Retake</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-primary" role="alert">
                   Enter below the phone number of the candidate to allow the retake of the exam
                </div>
                <div id="message"></div>
                <p><input class="form-control" type="number" id="phones" placeholder="Enter phone number"></p>
                <p class="text-right"><button class="btn btn-danger allow">Allow</button></p>
            </div>
        </div>
    </div>
</div>