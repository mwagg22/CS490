<?php

  $id = $_POST['id'];
  $quiznum = $_POST['quiznum'];
  $question_id = $_POST['question_id'];
  $answer= rawurlencode($_POST['answer']);
  //rawurldecode
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/back/submit_quiz.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "id=$id&quiznum=$quiznum&question_id=$question_id&answer=$answer");

  $result = curl_exec($ch);
  
  curl_close($ch);

  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/back/get_everything.php");
  curl_setopt($ch, CURLOPT_POST, 2);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "quiznum=$quiznum&question_id=$question_id");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
  $results = json_decode(curl_exec($ch),true);
  print_r ($results);
  echo "Num:".count($results);
  curl_close($ch);
$Comments=array();
$TestCases_Outputs=array();
  	foreach ($results as $row){
		$testcase=$row['Test_Case'];
		$points=$row['Points'];
		$ppq=$points/(3+count($results));
		//echo $ppq;
		//echo "\n".mysqli_num_rows($results);
		$expected_tCaseA=$row['Expected'];
		$expected_funName=$row['Function_Name'];
		$expected_param=$row['Parameters'];
		$expected_constraint=$row['Constraints'];
		if($expected_constraint!="None")
		{
		$ppq=$points/(4+count($results));
		}
		$answer_spliced=explode("\n", rawurldecode($answer));
		$answer_funName=(substr($answer_spliced[0], strpos($answer_spliced[0], " ")+1, strpos($answer_spliced[0], "(")-strpos($answer_spliced[0], " ")-1));
		$answer_param=(substr($answer_spliced[0], strpos($answer_spliced[0], "(")+1, strpos($answer_spliced[0], ")")-1-strpos($answer_spliced[0], "(")));
		//echo $answer_funName;
	//create php file			
		$myfile = fopen("../mid/testanswer.py", "w") or die("Unable to open file!");;
		$txt = $answer_spliced[0];
		$txt.="\n";
		$i=0;
		for ($i = 1; $i < count($answer_spliced); $i++)  {
			$txt.="\t".$answer_spliced[$i]."\n";
			if(strpos($answer_spliced[$i],":")){
			$txt.="\t";	
			}
        }
		$txt.="\nprint(";
		$txt.=$answer_funName."(";
		$txt.=$testcase;
		$txt.="))";
		fwrite($myfile, $txt);
        $output = exec("python testanswer.py");
		// grading
		//function name
		if(count($Comments)==0){
		if($answer_funName!=$expected_funName){
		$cnt="Wrong Function Name -".$ppq;
		array_push($Comments,array($quiznum,$question_id,$id,$cnt,0));		
		}
		else{
		$cnt="Right Function Name +".$ppq;
		array_push($Comments,array($quiznum,$question_id,$id,$cnt,0));	
		}
		//parameters
		if($answer_param!=$expected_param){
		$cnt="Wrong Parameter -".$ppq;
		array_push($Comments,array($quiznum,$question_id,$id,$cnt,0));					
		}
		else{
		$cnt="Right Parameter +".$ppq;
		array_push($Comments,array($quiznum,$question_id,$id,$cnt,0));	
		}
		//syntax
		if(!strpos(rawurldecode($answer),":")){
		$cnt="Missing Colon : -".$ppq;
		array_push($Comments,array($quiznum,$question_id,$id,$cnt,0));					
		}
		else{
		$cnt="Contains Colon : +".$ppq;
		array_push($Comments,array($quiznum,$question_id,$id,$cnt,0));	
		}
		//constraint
		if($expected_constraint!="None"){
		if(!strpos(rawurldecode($answer),$expected_constraint)){
		$cnt="Missing requirenment: ".$expected_constraint." -".$ppq;
		array_push($Comments,array($quiznum,$question_id,$id,$cnt,0));		
		}
		else{
		$cnt="Requirenment of : ".$expected_constraint." met +".$ppq;
		array_push($Comments,array($quiznum,$question_id,$id,$cnt,0));	
		}
		}
		}
		//test case output
		if($output!=$expected_tCaseA){
		array_push($TestCases_Outputs,array($quiznum,$id,$question_id,$expected_tCaseA,$output,0));
		}
		else{
		array_push($TestCases_Outputs,array($quiznum,$id,$question_id,$expected_tCaseA,$output,$ppq));	
		}
		fclose($myfile);
		exec("rm testanswer.py");
	}
//insert comments
	  foreach ($Comments as $row) {
		 $Val1 = $row[0];
        $Val2 = $row[1];
        $Val3 = $row[2];
		$Val4 = rawurlencode($row[3]);
        $Val5 = $row[4];
		$ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/back/add_comment.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "quiznum=$Val1&question_id=$Val2&student_id=$Val3&comment=$Val4&teacher_cnt=$Val5");

  $result = curl_exec($ch);
  
  
  curl_close($ch);
    }
	//insert testcase output
	foreach ($TestCases_Outputs as $row) {
        $Val1 = $row[0];
        $Val2 = $row[1];
        $Val3 = $row[2];
		$Val4 = $row[3];
        $Val5 = $row[4];
		$Val6 = $row[5];
		$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/back/add_output.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "quiz_id=$Val1&student_id=$Val2&question_id=$Val3&expected=$Val4&output=$Val5&points=$Val6");

  $result = curl_exec($ch); 
  curl_close($ch);
}		
?>