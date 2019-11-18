<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'mw288');
// check if login_user is posted
  $question = $_POST['question'];
  $difficulty = &$_POST['difficulty'];
  $functionN = &$_POST['function_name'];
  $parameters = &$_POST['parameters'];
  $type = &$_POST['type'];
  
  	$query = "INSERT INTO Questions (Questions,Difficulty,Function_Name,Parameters,Type) VALUES ('$question','$difficulty','$functionN','$parameters','$type')";
  	$results = mysqli_query($db, $query);
  	if ($results) {
	$last_id = mysqli_insert_id($db);
  	  echo json_encode($last_id);
  	}else {
  		echo json_encode("error occured");
  	}
?>
