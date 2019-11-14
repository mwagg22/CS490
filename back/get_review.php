<?php
$db = mysqli_connect('sql.njit.edu', 'mw288', '1k9L0X2z', 'mw288');
$teacherComment;
$res;
$studentid=	$_POST['studentid'];
$quiznum=$_POST['quiznum'];
$queryQ = "SELECT * FROM `Quizes` INNER JOIN `Questions` ON `Quizes`.`Question_ID` = `Questions`.`ID` WHERE `Quizes`.`Quiz_Num`='$quiznum'";
$resultsQ = mysqli_query($db, $queryQ);
if($resultsQ){
while($rowQ = mysqli_fetch_array($resultsQ, MYSQLI_ASSOC)){	
$res.="<h3>Question</h3>";
$res.="<div id='question'>".$rowQ["Questions"]."</div>";
$quesID=$rowQ["Question_ID"];
$query = "SELECT * FROM Output WHERE Quiz_ID='$quiznum' AND Student_ID='$studentid' AND Question_ID='$quesID'";
$results = mysqli_query($db, $query);
if($results){
$res.="<table id='auto_correct_table'><tr><th colspan='3' style='text-align:center;'>Test Cases</th></tr><tr><th>Expected</th><th>Output</th><th>Points</th></tr>";
while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)){	
$res.="<tr><td>". $row["Expected"]."</td><td>". $row["Output"]."</td><td>". $row["Points"]."</td></tr>";	
}}
$res.="<tr><th colspan='3' style='text-align:center;'>Comments</th><tr>";
//q2 comments
$query2 = "SELECT * FROM Comments WHERE Quiz_ID='$quiznum' AND Student_ID='$studentid' AND Question_ID='$quesID'";
$results2 = mysqli_query($db, $query2);
if($results2){
while($row2 = mysqli_fetch_array($results2, MYSQLI_ASSOC)){
if($row2["TeacherComment"]==1){
$teacherComment=$row2["Comment"];
}
else{	
$res.="<tr><td colspan='3'>".$row2["Comment"]."</td></tr>";
}
}
}
$res.="</table>";

//q3 student answer
$queryA = "SELECT * FROM StudentAnswers WHERE Quiz_ID='$quiznum' AND Student_ID='$studentid' AND Question_ID='$quesID'";
$resultsA = mysqli_query($db, $queryA);
if($resultsA){
while($rowA = mysqli_fetch_array($resultsA, MYSQLI_ASSOC)){	
$res.="<h3>Teacher Comments</h3><div class='input-group'><textarea readonly id='teacher-comment' style='width:100%;' rows='10' cols='150'>".$teacherComment."</textarea></div><h3>Student Answer</h3><div class='input-group'><textarea readonly id='student-answer' style='width:100%;' rows='10' cols='150'>".$rowA["Answers"]."</textarea></div>";	
}}
}
}
echo json_encode($res);
?>