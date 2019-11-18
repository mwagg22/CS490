<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'mw288');
// check if login_user is posted
  $student_id = $_POST['student_id'];
  $quiz_num = &$_POST['quiz_num'];
  $score = &$_POST['score'];
  $released = &$_POST['released'];
  
  	$query = "Update Graded SET Score='$score',Released='$released' WHERE Student_ID='$student_id' AND Quiz_ID='$quiz_num'";
  	$results = mysqli_query($db, $query);
  	if ($results) {
  	  echo("successly submitted grade");
  	}else {
  		echo json_encode("error occured. retry later");
  	}
?>
