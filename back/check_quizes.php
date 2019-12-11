<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
// check if login_user is posted
  $quiz = array();
  	$query = "SELECT * FROM Quizes";
  	$results = mysqli_query($db, $query);
  	while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
	$quiz[] = (array("quiznum"=>$row["Quiz_Num"]));
	}
	echo json_encode($quiz);
?>