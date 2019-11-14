<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
// check if login_user is posted
  $question = $_POST['question'];
  $difficulty = &$_POST['difficulty'];
  $functionN = &$_POST['difficulty'];
  $parameters = &$_POST['type'];
  $type = &$_POST['type'];
  $answer = &$_POST['answer'];
  
  	$query = "INSERT INTO Questions (Questions,Difficulty,Function_Name,Parameters,Type) VALUES ('$question','$difficulty','$functionN','$parameters','$type')";
  	$results = mysqli_query($db, $query);
  	if ($results) {
	$last_id = mysqli_insert_id($db);
  	  echo json_encode($last_id);
  	}else {
  		echo json_encode("error occured");
  	}
?>
