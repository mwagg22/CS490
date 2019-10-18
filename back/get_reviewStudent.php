<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
$review=array();
$questions=array();
$answers=array();
// check if login_user is posted
  $quizId = $_POST['quizId'];
  $studentId = &$_POST['quizNum'];
  	$query = "SELECT * FROM Graded WHERE Quiz_ID='$quizId' AND Student_ID='$studentId'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
		$row = mysqli_fetch_array($results, MYSQLI_ASSOC);
		$grade = new \stdClass();
	  $grade->grade = $row['Score'];
		array_push($review,$grade);
		$query2 = "SELECT * FROM Questions INNER JOIN Quizes ON Questions.ID = Quizes.Question_ID WHERE (Quizes.ID='$quizID')";
		$results2 = mysqli_query($db, $query2);
		while($row2=mysqli_fetch_array($results2, MYSQLI_ASSOC)){
			$questions[]=(array("Question"=>$row2["Questions"],"Difficulty"=>$row2['Difficulty'],"Type"=>$row2["Type"]));
			}
			
		$query3 = "SELECT * FROM StudentAnswers WHERE Quiz_ID='$quizID' AND Student_ID='$studentId'";
		$results3 = mysqli_query($db, $query3);
		while($row3=mysqli_fetch_array($results3, MYSQLI_ASSOC)){
			$answers[]=(array("Answer"=>$row2["Answers"]));
			}
		array_push($review,$questions,$answers);
		echo json_encode($review);
		}
		
		else {
  		echo json_encode("No such user found in database");
  	}

?>
