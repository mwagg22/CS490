<?php


  
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://localhost/cs490/back/get_quizes.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS,1);

  $result = curl_exec($ch);
  
  curl_close($ch);
  
?>