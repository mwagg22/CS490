<?php

  $id = $_POST['id'];
  $quiznum = &$_POST['quiznum'];
  $question_id = &$_POST['question_id'];
  $answer= &$_POST['answer'];
  $answer=rawurlencode($answer);
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/mid/submit_quiz.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "id=$id&quiznum=$quiznum&question_id=$question_id&answer=$answer");

  $result = curl_exec($ch);
  
  curl_close($ch);
  
?>