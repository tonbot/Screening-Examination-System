<?php


 class dbconnection 
 {
   
   private  $pdo = null;
   private  $c_count = 0;

   private  $password="";
   private  $user="root";

    function __construct(){
     //making connection to the database
        try
            {
                $host="localhost";
                $dbname="ekirs_exam";
                $this -> pdo = new PDO("mysql:host=$host; dbname=$dbname", $this -> user, $this -> password );
                $this -> pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
            } 
        catch(PDOException $e)
            {
                echo ($e->getMessage());
            }
    }

/** login */
public function get_data($query) {    
    $result = $this->pdo->prepare($query);
    $result->execute([ ]);
    return  $this->validateResponse($result);
    
}


//get all question
public function get_all() {   
    $query      = "SELECT * FROM question_tbl"; 
    $result = $this->pdo->prepare($query);
    $result->execute([]);
    return  $this->validateResponse($result);
}


function add_data($data){  
    $query      = "SELECT * FROM question_tbl WHERE question_id = :question_id";
    $result = $this->pdo->prepare($query);
    $result->execute
        ([
            ':question_id'    => $data -> g,
        ]);
 
        $response = $this->validateRes($result);
 
        if($response -> data != 0){
             return $response->data = 1;           
            } 
        else
            {  
                /** create new entry */
                $query     = "INSERT INTO question_tbl(question_id, question, opt1, opt2, opt3, opt4, correct_opt) VALUES (:question_id, :question, :opt1, :opt2, :opt3, :opt4, :correct_opt)";
                $statement = $this->pdo->prepare($query);
                $statement->execute
                    ([
                        ':question_id' => $data -> g,
                        ':question'     => $data -> a,
                        ':opt1'         => $data -> b,
                        ':opt2'         => $data -> c,
                        ':opt3'         => $data -> d,
                        ':opt4'         => $data -> e,
                        ':correct_opt' => $data -> f,
                    ]);
                        if ($statement)
                            {
                                return $response -> data = "true";
                            }
                        else
                            {
                                return $response -> data = "false";
                            }
            }
 
 }  

 /** login */
public function login($s, $p) {    
    $query  = "SELECT * FROM admin_tbl WHERE username = :username AND password = :password" ;
    $result = $this->pdo->prepare($query);
    $result->execute
        ([
            ':username' => $s,
            ':password'   => $p,
        ]);
    return   $this->validateResponse($result);
    
}

function delete_question($question_id){
    $response = new stdClass();
    $query  = "DELETE FROM question_tbl WHERE question_id = :question_id";
    $result = $this->pdo->prepare($query);
    $result->execute
        ([
            'question_id' => $question_id
        ]);
    if($result){
        $response -> data = "true";
        return $response;
    }else{
        $response -> data = "false";
        return $response;
    }
}


function retake($p){
    $response = new stdClass();
    $query  = "DELETE FROM result_tbl WHERE phone = :phone";
    $result = $this->pdo->prepare($query);
    $result->execute
        ([
            ':phone' => $p,
        ]);
    if($result->rowCount() > 0){
        $response -> data = "true";
        return $response;
    }else{
        $response -> data = "false";
        return $response;
    }
}
/** validate database response */
private function validateResponse($result){
    if ($result -> rowCount() > 0)
        {
            $result -> setFetchMode(PDO::FETCH_ASSOC);
            $result = $result -> fetchall();
            $response = $result;
            return $response;
        }
     else
        {
            return 0;
        }

}


// ** validate database response */
public function validateRes($result){
    $response = new stdClass();
    if ($result -> rowCount() > 0)
        {
            $result -> setFetchMode(PDO::FETCH_ASSOC);
            $result = $result -> fetchall();
            $response -> data = $result;
            return $response;
        }
    else
        {
            $response -> data = 0;
            return $response;
        }

}


 }
 ?>