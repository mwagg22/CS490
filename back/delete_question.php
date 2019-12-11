<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
// check if login_user is posted
  $question_id = $_POST['question_id'];
  
  	$query = "DELETE FROM `Testcases` WHERE `Question_ID`='$question_id';DELETE FROM `Questions` WHERE `ID`='$question_id';DELETE FROM `Quizes` WHERE `Question_ID`='$question_id';DELETE FROM `Studentanswers` WHERE `Question_ID`='$question_id';DELETE FROM `Comments` WHERE `Question_ID`='$question_id';DELETE FROM `Output` WHERE `Question_ID`='$question_id';";
  	$results = mysqli_multi_query($db, $query);
  	if ($results) {
  	  echo json_encode("Removed Question");
  	}else {
  		echo json_encode("error occured");
  	}
?>
