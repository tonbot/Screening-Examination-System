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
    <!-- custom resources -->
    <link rel="stylesheet" href="resources/customCss/add_question.css">
    <script src="resources/customJs/add_question.js"></script>
 </head>
 <body>
    <!-- header section -->
    <header>
       <?php include_once('resources/header.php'); ?>
    </header>
    <!-- main section -->
    <main>
        <div class="container mt-5 w-50 mb-5">
            <div class="card shadow">
                <div class="card-header">
                     <h5 class="card-title">Add new question</h5>
                </div>
                <div class="card-body">
                        <div id="message"></div>                    
                        <input id="question_id" class="form-control mb-2" type="number" name="" placeholder = "Question Id" autocomplete = "off" reqired>
                        <input id="question" class="form-control mb-2" type="text" name="" placeholder = "Enter Question"  autocomplete = "off" reqired>
                        <input id="option1" class="form-control mb-2" type="text" name="" placeholder = "Option 1"  autocomplete = "off" reqired>
                        <input id="option2" class="form-control mb-2" type="text" name="" placeholder = "Option 2"  autocomplete = "off" reqired>
                        <input id="option3" class="form-control mb-2" type="text" name="" placeholder = "Option 3"  autocomplete = "off" reqired>
                        <input id="option4" class="form-control mb-2" type="text" name="" placeholder = "Option 4" autocomplete = "off" reqired>
                        <input id="correct_opt" class="form-control" type="number" name="" placeholder = "Correct Option"  autocomplete = "off" reqired>
                        <p class="text-right"><button class="btn btn-primary mt-3 mr-3 shadow" id="saves" type="button" >Save</button><button class="btn btn-primary mt-3" hidden>Edit</button></p>
                </div>
                
            </div>
        </div>
    </main>
 </body>
 </html>