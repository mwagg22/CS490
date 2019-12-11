<?php

   $quiznum = $_POST['quiznum'];
   $studentid = &$_POST['studentid'];
  
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/mid/get_review.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "quiznum=$quiznum&studentid=$studentid");

  $result = curl_exec($ch);
  
  curl_close($ch);
  
?>