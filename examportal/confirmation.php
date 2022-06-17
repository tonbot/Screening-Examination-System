<?php 
   session_start();
   if( !isset($_SESSION['a']) ){
       header("Location: logout.php");
       exit();
   }
   $a = strval($_SESSION["a"]) . " " .  strval($_SESSION["b"]) . " ". strval($_SESSION["c"]);
   $a = strtoupper($a);
   $b = strval($_SESSION["d"]);
   $c = strval($_SESSION["e"]);
   $c = strtoupper($c);
   # including bootstrap resources 
   include_once('resources/include.php');
  
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKIRS CBT</title>
    <link rel="shortcut icon" href="resources/images/ekirs.ico">
      <!-- custom resources -->
      <link rel="stylesheet" href="resources/customCss/confirmation.css">
      <script src="resources/customJs/confirmation.js"></script>
    
     
</head>
<body>
        <!-- header section -->
    <header>
       <?php include_once('resources/header.php'); ?>
    </header>

    <!-- header section -->
    <main>
        <div class="container  container1 mt-5">
            <div class="titleContainer">
                <h1>Welcome</h1>
                <p>Kindly confirm your details below. If this is not you, please logout and talk to an officer. Thanks.</p></br>
                <p>Name: <?php echo($a) ?></p>
                <p>Gender: <?php echo($c) ?></p>
                <p>Phone: <?php echo($b) ?></p>
            </div>

            <div class="row row1">
                <div class="col-sm-6  text-center">
                    <p class="text-center"> <button class="btn btn-success btnYes shadow-lg ">Start Exam </button> </p> 
                </div>

                <div class="col-sm-6 text-center ">
                    <p class="text-center"><button class="btn btn-danger btnNo shadow-lg"> Logout </button> </p>
                </div>

            </div>
        </div>
    </main>
    <script>
        $(document).ready(function (){

            $(".btnYes").click(function(){
                $('#instruction').modal('show');
                // location.href = "exam.php";
            });

            $(".continue").click(function(){
                location.href = "exam.php";
            });

            $(".btnNo").click(function(){
            location.href = "logout.php";
            });

        });
      
    </script>
</body>
</html>
<!-------------------------------------------------> 
 <div id="instruction" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Instruction</h5>
            </div>
            <div class="modal-body">
                <p>Kindly note that there are four sections, each section with 10 questions. You are required to attempt all the questions. Good luck.</p>
            </div>
            <div class="modal-footer">
                <button class=" btn btn-danger continue shadow">Continue To Exam <i class="continue-arrow fas fa-long-arrow-alt-right"></i></button>
            </div>
        </div>
    </div>
 </div>o