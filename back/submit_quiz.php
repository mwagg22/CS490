<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
// check if login_user is posted
  $id = $_POST['id'];
  $quiznum = &$_POST['quiznum'];
  $question_id = &$_POST['question_id'];
  $answer= &$_POST['answer'];
  
  $sql = "UPDATE Available SET Taken='1' WHERE Student_ID='$id' AND Quiz_Num='$quiznum'";
  	$resultsql = mysqli_query($db, $sql);
  
  	$query = "INSERT INTO StudentAnswers (Student_ID,Quiz_ID,Question_ID,Answers) VALUES ('$id','$quiznum','$question_id','$answer')";
  	$results = mysqli_query($db, $query);
  	if ($results) {
  	  echo("successly submitted question");
  	}else {
  		echo json_encode("error occured. retry later");
  	}
?>
