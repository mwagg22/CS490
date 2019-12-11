<?php
  $question_id = $_POST['question_id'];
  
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/back/delete_question.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "question_id=$question_id");

  $result = curl_exec($ch);
  
  curl_close($ch);

?>