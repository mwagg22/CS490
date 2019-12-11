<?php

    $quiznum = $_POST['quiznum'];
	$question_id = &$_POST['question_id'];
	$points = &$_POST['points'];
	$constraint = &$_POST['constraint'];
    
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/mid/add_quiz.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "quiznum=$quiznum&question_id=$question_id&points=$points&constraint=$constraint");

  $result = curl_exec($ch);
  
  curl_close($ch);

?>