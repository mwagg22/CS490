<?php

  if(isset($_POST['isteacher'])){
   $quiznum = $_POST['quiznum'];
   $isteacher = $_POST['isteacher'];
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/mid/check_taken.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "quiznum=$quiznum&isteacher=$isteacher");

  $result = curl_exec($ch);
  
  curl_close($ch);
  }
  else
  {
   $id = $_POST['id'];

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/mid/check_taken.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "id=$id");

  $result = curl_exec($ch);
  
  curl_close($ch);  
	  
	  
  }
  
?>