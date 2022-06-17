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
    <link rel="stylesheet" href="resources/customCss/result.css">
    <script src="resources/customJs/result.js"></script>
 </head>
 <body>
    <!-- header section -->
    <header>
       <?php include_once('resources/header.php'); ?>
    </header>
    <!-- main section -->
    <main>
        <div class="container1 px-5 mt-5 mb-5 bg-white p-5">
               <table class="table table-bordered table-striped table-hover shadow sheetjs" id="question_table">
                            <thead class="thead-dark ">
                                <tr>
                                    <th>#</th>
                                    <th>question_id</th>
                                    <th>Question</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww</td>
                                    <td>22222222</td>
                                </tr>
                            </tbody>
                 </table>
        </div>
    </main>
 </body>
 </html>
 <!-------------------------------------------------> 
 <!-- The Modal -->
 <div class="modal fade " id="editQuestion">
  <div class="modal-dialog  modal-dialog-centered  ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Question<h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="frmContainer">
            <form action="" method="post">
                <div class="form-group">
                <div id="message">                  
                        <input id="section" class="form-control mb-2" type="text" name="" placeholder = "section" autocomplete = "off" reqired>
                        <input id="question" class="form-control mb-2" type="text" name="" placeholder = "Enter Question"  autocomplete = "off" reqired>
                        <input id="option1" class="form-control mb-2" type="text" name="" placeholder = "Option 1"  autocomplete = "off" reqired>
                        <input id="option2" class="form-control mb-2" type="text" name="" placeholder = "Option 2"  autocomplete = "off" reqired>
                        <input id="option3" class="form-control mb-2" type="text" name="" placeholder = "Option 3"  autocomplete = "off" reqired>
                        <input id="option4" class="form-control mb-2" type="text" name="" placeholder = "Option 4" autocomplete = "off" reqired>
                        <input id="correct_opt" class="form-control" type="number" name="" placeholder = "Correct Option"  autocomplete = "off" reqired>
                        <p class="text-right"><button class="btn btn-primary mt-3 mr-3 shadow" id="saves" type="button" >Update</button><button class="btn btn-primary mt-3" hidden>Edit</button></p>
                </div>
            </form>
        </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      </div>

    </div>
  </div>
</div>
 <!-------------------------------------------------->
 