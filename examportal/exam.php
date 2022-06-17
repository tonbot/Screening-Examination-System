<?php 
    session_start();
    if( !isset($_SESSION['a']) || !isset($_SESSION['b']) || !isset($_SESSION['d'])){
        header("Location: logout.php");
        exit();
    }
     else{
    include_once "controller/dbconnection.php";
    $connection=new dbconnection;
    $check = $connection -> check($_SESSION['d']);
    if($check != 0 ){
        header("Location: error.php");
        exit();
    }   
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
    <title>EKIRS CBT</title>
    <link rel="shortcut icon" href="resources/images/ekirs.ico">
    <!-- custom resources -->
    <link rel="stylesheet" href="resources/customCss/exam.css">
    <script src="resources/customJs/exam.js"></script>
    
</head>
<body>
      <!-- header section -->
      <header>
       <?php include_once('resources/header.php'); ?>
      </header>

      <!-- main -->
      <main>    
                <!-- section one -->
                <div class="card card_section">
                    <div class="card-header">
                       Section
                    </div>
                    <div class="card-body text-center card-body1">
                        <a href="#" class="btn btn-primary mb-2" id="section1">Section 1</a>
                        <a href="#" class="btn btn-primary mb-2" id="section2">Section 2</a>
                        <a href="#" class="btn btn-primary mb-2" id="section3">Section 3</a>
                        <a href="#" class="btn btn-primary mb-2" id="section4">Section 4</a>
                        <!-- <a href="#" class="btn btn-danger mb-2"  id="submit_mobile">Submit</a> -->
                    </div>
                </div>
                <h5 class="card-title text-center pt-3 mobile_score" >Total Score : <span id="score_mobile" ></span></h5>
                <!-- end of section one -->
                <!-- section two -->
                <div class="card card_section2">
                    <div class="card-header">
                        Total Score
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title" id="score"></h5>
                        <a href="#" class="btn btn-primary" id="submit">Submit</a>
                    </div>
                </div>
                <!-- end of section two -->
              <!-- section three -->
            <div class="container bg-light shadow container1">
                <div class="title_container row">
                    <div class="col-sm-6">
                        <h4 id="track"> Question <span id=current_question></span> of <span id=total_question></span>    </h4>
                    </div>
                    <div class="col-sm-6 ">
                        <h4 class="text-right" id=timer>Time-left : <span id=minute>10</span> : <span id=second>60</span>  </h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="question" id="question" ></div>
                        <p class="hr"><hr/></p>
                        <div class="option">
                            <form method="post">
                            <input type="radio"  value="1" name="option" id="radA"><span class="option_Text" id="optionA"></span><br/>
                            <input type="radio"  value="2" name="option" id="radB"><span class="option_Text" id="optionB"></span><br/>
                            <input type="radio"  value="3" name="option" id="radC"><span class="option_Text" id="optionC"></span></span><br/>
                            <input type="radio"  value="4" name="option" id="radD"><span class="option_Text" id="optionD"></span><br/>
                            </form>
                        </div>
                        <p class="hr"><hr/></p>
                        <div class="row rowbtn">
                            <div class="col-sm-9">
                                <button class="shadow mr-3" id="previous"><i class="fa fa-angle-left"></i> Previous</button>
                                <button class="shadow  mr-3" id="next" >Next <i class="fa fa-angle-right"></i></button>
                                <button class="shadow btn btn-danger" id="next_section" > Next Section <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i></button>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
            <!-- end of section three -->
      </main>
    
</body>
</html>