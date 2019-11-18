<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'mw288');
$quizes = array();

  	$query = "SELECT DISTINCT Quiz_Num FROM Quizes";
  	$results = mysqli_query($db, $query);
  	if($results){
	while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
	$quizes[]=(array("quizNum"=>$row["Quiz_Num"]));
}
}
echo json_encode($quizes);
?>