<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'mw288');
// check if login_user is posted
  $question_id = $_POST['question_id'];
  
  	$query = "DELETE FROM `testcases` WHERE `Question_ID`='$question_id';DELETE FROM `questions` WHERE `ID`='$question_id';DELETE FROM `quizes` WHERE `Question_ID`='$question_id';DELETE FROM `studentanswers` WHERE `Question_ID`='$question_id';DELETE FROM `comments` WHERE `Question_ID`='$question_id';DELETE FROM `output` WHERE `Question_ID`='$question_id';";
  	$results = mysqli_multi_query($db, $query);
  	if ($results) {
  	  echo json_encode("Removed Question");
  	}else {
  		echo json_encode("error occured");
  	}
?>
