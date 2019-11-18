  
<?php

  $type = $_POST['type'];
  $difficulty = $_POST['difficulty'];
  
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://localhost/cs490/back/get_questions.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "type=$type&difficulty=$difficulty");

  $result = curl_exec($ch);
  
  curl_close($ch);
?>