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
        <div class="container mt-5">
            <div class="card shadow-lg">
                <div class="card-header">
                    <h5>View Result</h5>
                </div>
                <div class="card-body"><!-- start of card body-->
                    <h6 class="card-title" >Query result based on: </h6>
                    <div class="form-group w-25">
                        <select id="my-select" class="form-control select shadow" name="" >
                            <option>--SELECT OPTION--</option>
                            <option hidden>Percentage</option>
                            <option>Sex</option>
                            <option>Phone-Number</option>
                            <option>Remark</option>
                        </select>
                    </div>
                    <div class="row" id="row"> <!-- start row-->
                        <div class="col-sm-2 from">
                            <h6><label for="From">From</label></h6>
                            <input class="form-control" type="number" name="" id="from">
                        </div>
                        <div class="col-sm-2 to" hidden>
                            <h6><label for="To">To</label></h6>
                            <input class="form-control" type="number" name="" id="to">
                        </div>
                        <div class="col-sm-2 sex" >
                          <div class="form-group">
                            <h6><label for="sex">Gender Category</label></h6>
                            <select class="form-control select" name="" id="gender_value">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-2 remark">
                          <div class="form-group">
                            <h6><label for="sex">Remark Category</label></h6>
                            <select class="form-control select" name="" id="remark_value" >
                                <option>Pass</option>
                                <option>Fail</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-sm-2 action">
                            <h6><label for="To">Action</label></h6>
                            <button class=" btn btn-primary get shadow">Get Report</button>
                        </div>
                    </div><!-- end row-->
                </div><!-- end of card body-->          
            </div>
            <div class= "mt-5 mb-5 bg-white shadow p-3">
          
                        <table class="table table-bordered table-center  table-striped table-hover" id="dataresult">
                        <thead class="thead-dark ">
                                <tr>
                                    <th>#</th>
                                    <th>Surname</th>
                                    <th>Phone</th>
                                    <th>Sex</th>
                                    <th>Section A</th>
                                    <th>Section B</th>
                                    <th>Section C</th>
                                    <th>Section D</th>
                                    <th>Total score</th>
                                    <th>Score Percentage</th>
                                    <th id="remarkTable">Remark</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                </div>
        </div>
    </main>
</body>
</html>
