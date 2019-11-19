<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'mw288');
// check if login_user is posted
  $quiz_id = $_POST['quiz_id'];
  $student_id = &$_POST['student_id'];
  $question_id = &$_POST['question_id'];
  $expected = &$_POST['expected'];
  $output = &$_POST['output'];
  $points = &$_POST['points'];

  $queryO = "INSERT INTO Output (Quiz_ID,Student_ID,Question_ID,Expected,Output,Points) VALUES ('$quiz_id','$student_id','$question_id','$expected','$output','$points')";
  	$resultsO = mysqli_query($db, $queryO);
	if($resultsO){
	echo "Successful add outputs\n";
	}
?>
