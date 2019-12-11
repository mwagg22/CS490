<?php
  $question_id = $_POST['question_id'];
  $testcase = rawurlencode($_POST['testcase']);
  $answer= rawurlencode($_POST['answer']);
  
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/back/add_testCases.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "question_id=$question_id&testcase=$testcase&answer=$answer");

  $result = curl_exec($ch);
  
  curl_close($ch);
  
?>