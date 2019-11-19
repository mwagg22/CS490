<?php
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'mw288');
  $quiznum = $_POST['quiznum'];
  $question_id = &$_POST['question_id'];
  $points = &$_POST['points'];
  $constraint = &$_POST['constraint'];
//check if quiz exists in available table. if not then we create it
$avail_query="SELECT * FROM Available WHERE Quiz_Num='$quiznum'";
$available=mysqli_query($db,$avail_query);
if(mysqli_num_rows($available)==0){
	$student_query="SELECT * FROM Users WHERE Type='student'";
	$student_list=mysqli_query($db,$student_query);
	while($row=mysqli_fetch_array($student_list, MYSQLI_ASSOC)){
		$id=$row['ID'];
		$addav="INSERT INTO `Available`(`Quiz_Num`, `Student_ID`, `Taken`) VALUES ('$quiznum','$id','0')";
	$addAvaiablility=mysqli_query($db,$addav);			
	}
}

// adds question quiz
$question_query="SELECT * FROM `Quizes` WHERE `Quiz_Num`='$quiznum' AND `Question_ID`='$question_id'";
$question_results=mysqli_query($db,$question_query);
if(mysqli_num_rows($question_results)==0){
  	$query ="INSERT INTO `Quizes` (`Quiz_Num` ,`Question_ID`,`Points`,`Constraints`) VALUES ('$quiznum','$question_id','$points','$constraint')";
  	$results = mysqli_query($db, $query);
  	if ($results) {
	  echo json_encode("successfully added question to quiz");
  	}else {
  		echo json_encode("Failed to add question quiz");
  	}
}
else{
	echo json_encode("Question aleady exists in quiz");
}
?>