<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
$questions = array();
// check if login_user is posted
  $difficulty = $_POST['difficulty'];
  $type = &$_POST['type'];
  if($type=="All"){
	 $query = "SELECT * FROM questions WHERE difficulty='$difficulty'";
  	$results = mysqli_query($db, $query);
  	if($result){
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$questions[]=(array("Question"=>$row["Questions"],"Difficulty"=>$row["Difficulty"],"Type"=>$row["Type"]));
}  
  }
 }
 else{
  	$query = "SELECT * FROM questions WHERE difficulty='$difficulty' AND type='$type'";
  	$results = mysqli_query($db, $query);
  	if($result){
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	$questions[]=(array("Question"=>$row["Questions"],"Difficulty"=>$row["Difficulty"],"Type"=>$row["Type"]));
}
}
}
echo json_encode($questions);
}
?>