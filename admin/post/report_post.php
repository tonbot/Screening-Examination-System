<?php 
try
 {
    session_start();
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
                        case "Percentage": 
                            $f = $_POST['f']."%";  
                            $g = strval($_POST['g'])."%";  
                            $query = "SELECT * FROM result_tbl WHERE NOT score_pcent  > '$f' ";
                            $result= $connection -> get_data($query);
                            echo (json_encode($result));
                        break;

                        case "Sex":
                            $f = strval($_POST['f']);  
                            $query = "SELECT * FROM result_tbl WHERE gender ='$f'";
                            $result= $connection -> get_data($query);
                            echo (json_encode($result));
                        break;

                        case "Phone-Number": 
                            $f = strval($_POST['f']);  
                            $query = "SELECT * FROM result_tbl WHERE phone ='$f'";
                            $result = $connection -> get_data($query);
                            echo (json_encode($result));
                        break;
                          
                        case "Remark":
                            $f = strval($_POST['f']);  
                            $query = "SELECT * FROM result_tbl WHERE remark ='$f'";
                            $result= $connection -> get_data($query); 
                            echo (json_encode($result));
                          break;
                        case "ad":
                            $data = new stdClass;
                            $data->a= $_POST['a']; 
                            $data->b= $_POST['b'];  
                            $data->c= $_POST['c']; 
                            $data->d= $_POST['d']; 
                            $data->e= $_POST['f']; 
                            $data->f= $_POST['g']; 
                            $data->g= $_POST['h']; 
                            $result= $connection -> add_data($data); 
                            echo (json_encode($result));
                          break;

                        case "get_all":
                            $result= $connection -> get_all(); 
                            echo (json_encode($result));
                            break;
                        case "lo": 
                            $s = $_POST['s'];
                            $p = $_POST['p'];
                            $result = $connection -> login($s,$p);
                            if ($result != 0){
                                $_SESSION["a"] = $result[0]["username"];
                                echo(json_encode(1));
                                exit();
                            }else{
                                echo (json_encode($result));
                                exit();
                        
                            }
                            break;
                        case "re": 
                                $p = $_POST['p'];
                                $result = $connection -> retake($p);
                                echo json_encode($result);
                                break;
                         case "de": 
                                    $question_id = $_POST['question_id'];
                                    $result= $connection -> delete_question($question_id);
                                    echo json_encode($result);
                                
                            break;
              }
            
             
        }else{
                
        }
  }
}
   catch(ERRMODE_EXCEPTION $e)
    {

        echo $e;

    }
            
?>