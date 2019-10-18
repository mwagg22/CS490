<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
  $quizNum = $_POST['quizNum'];
  $question_id = &$_POST['question_id'];
//check if quiz exists in available table. if not then we create it
$avail_query="SELECT * FROM Available WHERE Quiz_Num='$quizNum'"
available=mysqli_query($db,$avail_query);
if(mysqli_num_rows($avaiable)==0){
	$student_query="SELECT * FROM Users WHERE Type='student'"
	$student_list=mysqli_query($db,$student_query);
	while($row=mysqli_fetch_array($student_list, MYSQLI_ASSOC){
	$addAvaiablility=mysqli_query($db,"INSERT INTO `Available`(`ID`,`Quiz_Num`,`Student_ID`,`Taken`) VALUES ('','$quizNum','$row['ID']','0')");			
	}
}

// adds question quiz

  	$query ="INSERT INTO `Quizes` (`ID`,`Quiz_Num` ,`Question_ID`) VALUES ('', '$quizNum','$question_id')";
  	$results = mysqli_query($db, $query);
  	if (result) {
	  echo json_encode("successfully added quiz");
  	}else {
  		echo json_encode("Failed to add question quiz");
  	}
?>