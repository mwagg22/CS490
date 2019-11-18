<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'mw288');
if(isset($_POST['isteacher'])){
// check if login_user is posted
  $quiznum = $_POST['quiznum'];
  $students = array();
  	$query = "SELECT * FROM Available WHERE Quiz_Num='$quiznum' AND Taken='1'";
  	$results = mysqli_query($db, $query);
  	while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
	$studentID=$row['Student_ID'];
	$query2 = "SELECT * FROM Users WHERE ID='$studentID'";
	$results2=mysqli_query($db,$query2);
	$row2 = mysqli_fetch_array($results2, MYSQLI_ASSOC);
	$students[] = (array("studentID"=>$studentID,"studentName"=>$row2["Name"]));
	}
	echo json_encode($students);
}
else
{
  $id = $_POST['id'];
  $quiz = array();
  	$query = "SELECT * FROM Available WHERE Student_ID='$id' AND Taken='1'";
  	$results = mysqli_query($db, $query);
  	while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){
	$quiz[] = (array("quiznum"=>$row["Quiz_Num"]));
	}
	echo json_encode($quiz);	
}
?>