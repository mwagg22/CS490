<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
$questions = array();
// check if login_user is posted
  $id = $_POST['id'];
  	$query = "SELECT * FROM Quizes WHERE Quiz_Num='$id'";
  	$results = mysqli_query($db, $query);
  	if($results){
	while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
	$question_id=$row['Question_ID'];
	$query2 = "SELECT * FROM Questions WHERE ID='$question_id'";
	$results2=mysqli_query($db,$query2);
	$row2 = mysqli_fetch_array($results2, MYSQLI_ASSOC);
	$questions[]=(array("question_id"=>$row2["ID"],"Question"=>$row2["Questions"],"Difficulty"=>$row2["Difficulty"],"Type"=>$row2["Type"],"Points"=>$row["Points"]));
}
}
echo json_encode($questions);
?>