<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
// check if login_user is posted
  $questionid = $_POST['questionid'];
  $testcase = &$_POST['testcase'];
  $answer = &$_POST['answer'];
  
  	$query = "INSERT INTO TestCases (Question_ID,Test_Case,Expected) VALUES ('$questionid','$testcase','$answer')";
  	$results = mysqli_query($db, $query);
  	if ($results) {
  	  echo("success");
  	}else {
  		echo json_encode("error occured");
  	}
?>
