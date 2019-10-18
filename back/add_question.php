<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
// check if login_user is posted
  $question = $_POST['question'];
  $difficulty = &$_POST['difficulty'];
  $type = &$_POST['type'];
  
  	$query =="insert into `Questions` (`ID`, `Questions`,`Difficulty`,`Answers``,Type`) VALUES ('', '$question','$difficulty',,'','$type')";
  	$results = mysqli_query($db, $query);
  	if ($results) {
  	  echo("success");
  	}else {
  		echo json_encode("error occured");
  	}
?>