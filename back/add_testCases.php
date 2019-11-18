<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'mw288');
// check if login_user is posted
  $questionid = ($_POST['question_id']);
  $testcase = $db->real_escape_string($_POST['testcase']);
  $answer = $db->real_escape_string($_POST['answer']);
  echo $testcase;
  echo $answer;
  	$query = "INSERT INTO TestCases (Question_ID,Test_Case,Expected) VALUES ('$questionid','$testcase','$answer')";
  	$results = mysqli_query($db, $query);
  	if ($results) {
  	  echo("success");
  	}else {
  		echo json_encode("error occured");
  	}
?>
