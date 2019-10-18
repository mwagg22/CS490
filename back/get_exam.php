<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
$questions = array();
// check if login_user is posted
  $ID = $_POST['ID'];
  	$query = "SELECT * FROM Quiz WHERE ID='$ID'";
  	$results = mysqli_query($db, $query);
  	if($result){
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$query2 = "SELECT * FROM Questions WHERE ID='$row['Question_ID']'"
	result2=mysqli_query($db,$query2);
	$row2 = mysqli_fetch_array($results2, MYSQLI_ASSOC);
	$questions[]=(array("Question"=>$row2["Questions"],"Difficulty"=>$row2["Difficulty"],"Type"=>$row2["Type"]));
}
}
?>