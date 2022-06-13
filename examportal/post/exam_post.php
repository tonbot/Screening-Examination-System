<?php
 session_start();
try
 {
   
    if ($_SERVER['REQUEST_METHOD']=="POST")
        {
           /*getting form data*/
            $check = $_POST['e'];
              if(isset($check))
              {
                    #making database connection
                    include_once "../controller/dbconnection.php";
                    $connection=new dbconnection;
                    #if connection not null

                  switch($check)
                  {
                        case "gq": 
                           /** get question */
                           
                            $result= $connection -> get_question();
                            echo json_encode($result);
                            exit();
                        
                        break;

                        case "cp":
                            $data3 = new stdClass();
                            $data3->a = $_SESSION["a"];
                            $data3->b = $_SESSION["b"];
                            $data3->c = $_SESSION["c"];
                            $data3->d = $_SESSION["d"];
                            $data3->e = $_SESSION["e"];
                            $data3->ansA = json_decode($_POST["ansA"]);
                            $data3->ansB = json_decode($_POST["ansB"]);
                            $data3->ansC = json_decode($_POST["ansC"]);
                            $data3->ansD = json_decode($_POST["ansD"]);
                            $data3->qA   = json_decode(json_encode($_POST["qA"]));
                            $data3->qB   = json_decode(json_encode($_POST["qB"]));
                            $data3->qC   = json_decode(json_encode($_POST["qC"]));
                            $data3->qD   = json_decode(json_encode($_POST["qD"]));
                            $result= $connection -> computes($data3);
                            echo ($result);
                            exit();
                        break;

                        case "lo": 
                            $s = $_POST['s'];
                            $p = $_POST['p'];
                            $result = $connection -> login($s,$p);
                            if ($result != 0){
                                $_SESSION["a"] = $result[0]["firstName"];
                                $_SESSION["b"] = $result[0]["middleName"];
                                $_SESSION["c"] = $result[0]["lastName"];
                                $_SESSION["d"] = $result[0]["phone"];
                                $_SESSION["e"] = $result[0]["gender"];
                                echo(json_encode(1));
                                exit();
                        
                            }else{
                                echo (json_encode($result));
                                exit();
                        
                            }
                        break;
                        

                  }
              }
            
             
        }else{
                
        }
    
}
   catch(ERRMODE_EXCEPTION $e)
    {

        echo $e;

    }
            
?>