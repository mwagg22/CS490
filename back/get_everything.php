<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
$questions = array();
$quiznum = $_POST['quiznum'];
 $question_id = $_POST['question_id'];
 $query = "SELECT * FROM `TestCases` INNER JOIN `Questions` ON `TestCases`.`Question_ID` = `Questions`.`ID` INNER JOIN `Quizes` ON `TestCases`.`Question_ID` = `Quizes`.`Question_ID` WHERE `TestCases`.`Question_ID`='$question_id' AND `Quiz_Num`='$quiznum'";

  	$results = mysqli_query($db, $query);
	while($row = mysqli_fetch_array($results)) {
		$questions[]=(array("Test_Case"=>$row['Test_Case'],"Points"=>$row['Points'],"Expected"=>$row['Expected'],"Function_Name"=>$row['Function_Name'],"Parameters"=>$row['Parameters'],"Constraints"=>$row['Constraints']));
        // Print the entire row data
}
echo json_encode($questions);
	//echo json_encode($results);
?>