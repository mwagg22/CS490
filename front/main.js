
//Questions
function addQuestion(){
var question=encodeURIComponent(document.getElementById("question").value);
var functionName=String(document.getElementById("function_name").value);
var params=String(document.getElementById("parameters").value);
var type=String(document.getElementById("type").value);
var difficulty=String(document.getElementById("difficulty").value);
var testCases=document.getElementsByClassName("test-cases");
var questionID;
if(question==""){
	//snack
snackf('Please Enter a Question');
//alert();
}
else{
	         if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {								
				var message_res=this.responseText;
				//JSON.parse(message_res.toString());
				questionID=message_res;
				console.log(questionID);
				console.log(message_res);
				snack();
				//loadAllQuestion();
				for(var i=0;i<testCases.length;i++){
			 if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {								
				var message_res=this.responseText;
				console.log(message_res);
            }
        };
        xmlhttp.open("POST","curl/add_testCases.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("questionid="+questionID+"&testcase="+encodeURIComponent(testCases[i].getElementsByClassName("testcase")[0].value)+"&answer="+testCases[i].getElementsByClassName("testcaseanswer")[0].value);
		
		}
            }
        };
        xmlhttp.open("POST","curl/add_question.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("question="+question+"&type="+type+"&difficulty="+difficulty+"&functionname="+functionName+"&params="+params);	
		
		
	
}
}

function loadAllQuestion(){
document.getElementById("response").innerHTML='';
	         if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {								
				var message_res=this.responseText;
				var json_array=JSON.parse(message_res);
            for(i=0;i<json_array.length;i++){
			var question=json_array[i];
			document.getElementById("response").innerHTML+='<div id="question">Question:'+json_array[i].Question+'Type:'+json_array[i].Type+'Difficulty:'+json_array[i].Difficulty+'</div>';
               console.log(json_array[i]);
            }
			}
        };
        xmlhttp.open("POST","curl/get_questions.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("type=All");	
	
}

//create exam
function loadQuestionBank_e(){
document.getElementById("QuestionBankResponse_E").innerHTML='';
var type=String(document.getElementById("typeE").value);
var difficulty=String(document.getElementById("difficultyE").value);
	         if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {								
				var message_res=this.responseText;
				var json_array=JSON.parse(message_res);
            for(i=0;i<json_array.length;i++){
			var question=json_array[i];
			document.getElementById("QuestionBankResponse_E").innerHTML+='<div class="question" style="display: inline-flex;width:100%;"><p>Question: '+json_array[i].Question+'</p><button type="add" data-id="'+json_array[i].ID+'" onclick="addQuestionToExam(this)" style="margin-left: auto;margin-top: auto;margin-bottom: auto;">Add</button></div>';
			console.log(json_array[i]);
            }
			}
        };
        xmlhttp.open("POST","curl/get_questions.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("type="+type+"&difficulty="+difficulty);	
	
}

function loadQuestionBank(){
document.getElementById("QuestionBankResponse").innerHTML='';
var type=String(document.getElementById("typeQ").value);
var difficulty=String(document.getElementById("difficultyQ").value);
	         if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {								
				var message_res=this.responseText;
				var json_array=JSON.parse(message_res);
            for(i=0;i<json_array.length;i++){
			var question=json_array[i];
			document.getElementById("QuestionBankResponse").innerHTML+='<div class="question"><p>Question: '+json_array[i].Question+'</p></div>';
               console.log(json_array[i]);
			   
            }
			}
        };
        xmlhttp.open("POST","curl/get_questions.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("type="+type+"&difficulty="+difficulty);	
	
}


function addQuestionToExam(btn){
var question_id=btn.getAttribute("data-id");
var quizNum=document.getElementById("quizNum").value;
var points=document.getElementById("points").value;
var constraint=document.getElementById("constraints").value;
if(points==""||quizNum==""){
	//snack
snackf('Please fill in points/quiz number');
//alert();
}
else{
	         if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {								
				var message_res=this.responseText;
				snack();
			}
        };
        xmlhttp.open("POST","curl/add_quiz.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("quiznum="+quizNum+"&question_id="+question_id+"&points="+points+"&constraint="+constraint);	
	
}
}

function Logout(){
window.location.href = "login.html";
}

function snack() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
function snackf(txt) {
  var x = document.getElementById("snackbar-f");
  x.innerHTML=txt;
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}