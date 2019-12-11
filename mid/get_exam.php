<?php

  $id = $_POST['id'];
  
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/back/get_exam.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "id=$id");

  $result = curl_exec($ch);
  
  curl_close($ch);
?>