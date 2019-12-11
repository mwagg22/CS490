<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
// check if login_user is posted
  $student_id = $_POST['student_id'];
  $quiz_num = &$_POST['quiz_num'];
  $score = &$_POST['score'];
  $released = &$_POST['released'];
  if($released==1){
  	$query = "Update Graded SET Score='$score',Released='$released' WHERE Student_ID='$student_id' AND Quiz_ID='$quiz_num'";
  	$results = mysqli_query($db, $query);
  	if ($results) {
  	  echo("successly submitted grade");
  	}else {
  		echo json_encode("error occured. retry later");
  	}
  }
  else{
	$query = "SELECT * FROM Graded WHERE Student_ID='$student_id' AND Quiz_ID='$quiz_num'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results)==0) {
		$query2 = "INSERT INTO Graded (Student_ID,Quiz_ID,Score,Released) VALUES ('$student_id','$quiz_num','$score','$released')";
  	$results2 = mysqli_query($db, $query2);
  	  echo("successly submitted grade");
  	}else {
  		echo json_encode("populated");
  	}  
  }
?>
