<?php
  $question_id = $_POST['questionid'];
  $testcase = rawurlencode($_POST['testcase']);
  $answer= rawurlencode($_POST['answer']);
  
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://localhost/cs490/mid/add_testCases.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "question_id=$question_id&testcase=$testcase&answer=$answer");

  $result = curl_exec($ch);
  
  curl_close($ch);
  
?>