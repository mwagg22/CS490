<?php
  $quiznum = $_POST['quiznum'];
  $question_id = &$_POST['question_id'];
  $student_id = &$_POST['student_id'];
  $comment = &$_POST['comment'];
  $teacher_cnt = &$_POST['teacher_cnt'];
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/mid/add_comment.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "quiznum=$quiznum&question_id=$question_id&student_id=$student_id&comment=$comment&teacher_cnt=$teacher_cnt");

  $result = curl_exec($ch);
  
  curl_close($ch);

?>