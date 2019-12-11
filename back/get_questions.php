<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
$questions = array();
// take data
  $type = $_POST['type'];
  $difficulty = &$_POST['difficulty'];
  //echo $type;
  if($type=="All"){
	 $query = "SELECT * FROM Questions";
  	$results = mysqli_query($db, $query);
  	if($results){
	while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
	$questions[]=(array("Question"=>$row["Questions"],"Difficulty"=>$row["Difficulty"],"Type"=>$row["Type"]));
}  
  }
 }
 else{
  	$query = "SELECT * FROM `Questions` WHERE `Type`='$type' AND `Difficulty`='$difficulty'";
  	$results = mysqli_query($db, $query);
  	if($results){
	while ($rows = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
	$questions[]=(array("ID"=>$rows["ID"],"Question"=>$rows["Questions"],"Difficulty"=>$rows["Difficulty"],"Type"=>$rows["Type"]));
}
}
}
echo json_encode($questions);
?>