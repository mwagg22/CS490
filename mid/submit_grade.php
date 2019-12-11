<?php
  $student_id = $_POST['student_id'];
  $quiz_num = &$_POST['quiz_num'];
  $score = &$_POST['score'];
  $released = &$_POST['released'];

  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/back/submit_grade.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "student_id=$student_id&quiz_num=$quiz_num&score=$score&released=$released");

  $result = curl_exec($ch);
  
  curl_close($ch);

?>