<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
// check if login_user is posted
  $ID = $_POST['ID'];
  $password = &$_POST['password'];
  $quiz = array();
  	$query = "SELECT * FROM Available WHERE Student_ID='$ID' AND Taken='0'";
  	$results = mysqli_query($db, $query);
  	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
	$quiz[] = $row["ID"];
	}
	echo json_encode($quiz);
?>