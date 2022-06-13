<?php


 class dbconnection 
 {
   
   private  $pdo = null;
   private  $c_countA = 0;
   private  $c_countB = 0;
   private  $c_countC = 0;
   private  $c_countD = 0;

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
public function login($s, $p) {    
    $query  = "SELECT * FROM user WHERE lastName = :surname AND phone = :phone" ;
    $result = $this->pdo->prepare($query);
    $result->execute
        ([
            'surname' => $s,
            'phone'   => $p,
        ]);
    return   $this->validateResponse($result);
    
}

 /** get in come */
 public function get_question() {    
     $question_array = new stdClass();
     $queryA  = "SELECT * FROM question_tbl WHERE section ='A' ORDER BY RAND() LIMIT 10";
     $queryB  = "SELECT * FROM question_tbl WHERE section ='B' ORDER BY RAND() LIMIT 10";
     $queryC  = "SELECT * FROM question_tbl WHERE section ='C' ORDER BY RAND() LIMIT 10";
     $queryD  = "SELECT * FROM question_tbl WHERE section ='D' ORDER BY RAND() LIMIT 10";
     //section A
     $resultA = $this->pdo->prepare($queryA);
     $resultA->execute([]);
     $question_array -> a = $this->validateResponse($resultA); 
     //SECTION B 
     $resultB = $this->pdo->prepare($queryB);
     $resultB->execute([]);
     $question_array -> b = $this->validateResponse($resultB); 
     //section C
     $resultC = $this->pdo->prepare($queryC);
     $resultC->execute([]);
     $question_array -> c = $this->validateResponse($resultC); 
     //section D
     $resultD = $this->pdo->prepare($queryD);
     $resultD->execute([]);
     $question_array -> d = $this->validateResponse($resultD); 

     return ($question_array);
   
 } 

public function computes($data3) {
      $score_pcent = 0;
      //calculate score for each section
      $section_scoreA =  ($data3->qA != 0) ? $this->computeA($data3->qA, $data3->ansA) :  0;
      $section_scoreB =  ($data3->qB != 0) ? $this->computeB($data3->qB, $data3->ansB) :  0;
      $section_scoreC =  ($data3->qC != 0) ? $this->computeC($data3->qC, $data3->ansC) :  0;
      $section_scoreD =  ($data3->qD != 0) ? $this->computeD($data3->qD, $data3->ansD) :  0;

      $tqA = ($data3->qA != 0) ? sizeof($data3->qA) : 0;
      $tqB = ($data3->qB != 0) ? sizeof($data3->qB) : 0;
      $tqC = ($data3->qC != 0) ? sizeof($data3->qC) : 0;
      $tqD = ($data3->qD != 0) ? sizeof($data3->qD) : 0;
      
      //calculate total score
      $total_score = $section_scoreA + $section_scoreB + $section_scoreC + $section_scoreD;
      //calculate total question 
      $total_question =  $tqA +  $tqB +  $tqC +  $tqD;

       //calculate score total score percentage
       $score_pcent =  $total_score <= 0 ? $score_pcent : (($total_score * 100) /  $total_question);
       $score_pcent =  round($score_pcent , 2);
       $remark   =   $score_pcent >= 50 ? "pass" : "fail" ;

    $query     = "INSERT INTO result_tbl(lastName, phone, gender, sectionA_score, sectionB_score, sectionC_score, sectionD_score, total_score, totalScore_pcent, remark, entry_date) VALUES (:lastName, :phone, :gender, :sectionA_score, :sectionB_score, :sectionC_score, :sectionD_score, :total_score, :totalScore_pcent, :remark, :entry_date)";
    $statement = $this->pdo->prepare($query);
    $statement->execute
        ([
            ':lastName'         => $data3->c,
            ':phone'            => $data3->d,
            ':gender'           => $data3->e,
            ':sectionA_score'   => $section_scoreA,
            ':sectionB_score'   => $section_scoreB,
            ':sectionC_score'   => $section_scoreC,
            ':sectionD_score'   => $section_scoreD,
            ':total_score'      => $total_score,
            ':totalScore_pcent' => $score_pcent."%",
            ':remark'           => $remark,
            ':entry_date'       => date("Y-m-d"),
        ]);
            if ($statement)
                {
                    return $score_pcent."%";
                    exit();
                        
                }
            else
                {
                    return 0;
                    exit();
                        
                }

    return $score_pcent;
  
}







function computeA($qA, $ansA){
    $count = 0;
    $score_pcent = 0;
        do {
            if($ansA[$count] == $qA[$count] -> correct_opt){
                $this -> c_countA = $this -> c_countA + 1;
            }
            $count= $count + 1;
    }while($count <= sizeof($qA) - 1); 
    return ($this -> c_countA);

}
function computeB($qB, $ansB){
    $count = 0;
    $score_pcent = 0;
        do {
            if($ansB[$count] == $qB[$count] -> correct_opt){
                $this -> c_countB = $this -> c_countB + 1;
            }
            $count= $count + 1;
    }while($count <= sizeof($qB) - 1); 
    return ($this -> c_countB);

}
function computeC($qC, $ansC){
    $count = 0;
    $score_pcent = 0;
        do {
            if($ansC[$count] == $qC[$count] -> correct_opt){
                $this -> c_countC = $this -> c_countC + 1;
            }
            $count= $count + 1;
    }while($count <= sizeof($qC) - 1); 
    return ($this -> c_countC);

}
function computeD($qD, $ansD){
    $count = 0;
    $score_pcent = 0;
        do {
            if($ansD[$count] == $qD[$count] -> correct_opt){
                $this -> c_countD = $this -> c_countD + 1;
            }
            $count= $count + 1;
    }while($count <= sizeof($qD) - 1); 
    return ($this -> c_countD);

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