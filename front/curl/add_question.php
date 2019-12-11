<?php
  $question = rawurlencode($_POST['question']);
  $difficulty = &$_POST['difficulty'];
  $type = &$_POST['type'];
  $function_name = &$_POST['functionname'];
  $parameters = &$_POST['params'];
  $ch = curl_init();
  
  curl_setopt($ch, CURLOPT_URL, "http://afsaccess2.njit.edu/~mw288/cs490/mid/add_question.php");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, "question=$question&difficulty=$difficulty&type=$type&function_name=$function_name&parameters=$parameters");

  $result = curl_exec($ch);
  
  curl_close($ch);

?>