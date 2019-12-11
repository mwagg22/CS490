<?php
// connect to the database
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
// check if login_user is posted
  $quiznum = $_POST['quiznum'];
  $question_id = &$_POST['question_id'];
  $student_id = &$_POST['student_id'];
  $comment = &$_POST['comment'];
  $teacher_cnt = &$_POST['teacher_cnt'];
  
  if($teacher_cnt==0){
  	$queryC ="INSERT INTO Comments (Quiz_ID,Question_ID,Student_ID,Comment,TeacherComment) VALUES ('$quiznum','$question_id','$student_id','$comment','$teacher_cnt')";
    $resultsC=mysqli_query($db, $queryC);
	if($resultsC){
	echo "Successful add comment\n";
	}else {
  		echo json_encode("error occured");
  	}
  }
  else{
	  $check_cmt="SELECT * FROM Comments WHERE Student_ID='$student_id' AND Quiz_ID='$quiznum' AND Question_ID='$question_id' AND TeacherComment='$teacher_cnt'";
	  $check_res=mysqli_query($db,$check_cmt);
	  if(mysqli_num_rows($check_res)!=0){
  	$queryC ="UPDATE Comments SET Quiz_ID='$quiznum',Question_ID='$question_id',Student_ID='$student_id',Comment='$comment',TeacherComment='$teacher_cnt' WHERE Student_ID='$student_id' AND Quiz_ID='$quiznum' AND Question_ID='$question_id' AND TeacherComment='$teacher_cnt'";
	$resultsC=mysqli_query($db, $queryC);
	if($resultsC){
	echo "Successful updated comment\n";
	}else {
  		echo json_encode("error occured");
  	}
	  }
	  else{
		$queryC ="INSERT INTO Comments (Quiz_ID,Question_ID,Student_ID,Comment,TeacherComment) VALUES ('$quiznum','$question_id','$student_id','$comment','$teacher_cnt')";
    $resultsC=mysqli_query($db, $queryC);
	if($resultsC){
	echo "Successful add comment\n";
	}else {
  		echo json_encode("error occured");
  	}  
	  }
  }
?>
