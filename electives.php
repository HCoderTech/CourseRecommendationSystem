<?php
session_start();
error_reporting(0);
if(!$_SESSION["login"] or $_SESSION["login"]===false){
	header("Location:index");
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="seekbar.css" rel="stylesheet" type="text/css"/>
<script src="seekbar.js" type="text/javascript"></script>
<link href="./css/elective.css" rel="stylesheet" type="text/css">
<title>Select Electives</title>
</head>
<body onload="getCoursesbyUserRollNo()">
<script>
var course;
var page;
var method;
var n;
selCourses=new Array();
</script>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
   <div class="modal-header">
    <span class="close">&times;</span>
    <center><h2>User Specific Settings</h2></center>
  </div>
  <div class="modal-body">
  <table>
 <tr onclick="updateValue()">
 <td><b>Theory</b></td>
 <td style="width:100%;"><div class="seekbar" data-seekbar-value="<?php echo $_SESSION["Theory"]?>"></div></td>
 <td><div class="seekbarvalues"></div></td>
	</tr>		
<tr onclick="updateValue()">
 <td><b>Programming</b></td>
 <td><div class="seekbar" data-seekbar-value="<?php echo $_SESSION["Programming"]?>"></div></td>
 <td><div class="seekbarvalues"></div></td>
	</tr>	
<tr onclick="updateValue()">
 <td><b>Placement<b></td>
 <td><div class="seekbar" data-seekbar-value="<?php echo $_SESSION["Placement"]?>"></div></td>
 <td><div class="seekbarvalues"></div></td>
	</tr>	
<tr onclick="updateValue()">
 <td><b> Diversity </b></td>
 <td><div class="seekbar" data-seekbar-value="<?php echo $_SESSION["Prerequisite"]?>"></div></td>
 <td><div class="seekbarvalues"></div></td>
	</tr>	
<tr onclick="updateValue()">
 <td><b>Problematic</b></td>
 <td><div class="seekbar" data-seekbar-value="<?php echo $_SESSION["Problematic"]?>"></div></td>
 <td><div class="seekbarvalues"></div></td>
	</tr>		
 </table>
 <br/>
 <center><input class="button" id="save" type="submit" value="Save Settings" onclick="saveSettings();getCoursesbyUserRollNo();"></center>
  </div>
  <div class="modal-footer">
    <h3>Set your preferences to get better results.</h3>
  </div>
  </div>

</div>


<div id="mModal" class="modal">
<div class="modal-content1">
   <div class="modal-header">
    <span class="close">&times;</span>
    <center><h2 id="sylheader">Syllabus</h2></center>
  </div>

<div class="modal-body" id="mbody">
</div>
 <div class="modal-header">
    <center><h2><?php echo "Date : ".date('d-m-Y');?></h2></center>
  </div>
</div>
</div>




<ul>
  <li id="logo"><img src="logo.jpg" style="float:left;height:100%;width:100px;" /></li>
  
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn"><?php echo $_SESSION["FirstName"]; ?></a>
    <div class="dropdown-content">
      <a href="#" onclick="showSettings()">Settings</a>
      <a href="logout">Logout</a>
    </div>
  </li>
  <li><a href="#news" onclick="location.href='profile';">Profile</a></li>
  <li><a href="#home" onclick="location.href='dashboard';">Home</a></li>
  
</ul>
<br/>
<div id="selectc" style="float: left;font-size:18px;margin-left:30px;">
</div>
<div id="selection" style="float: right">Get By: <select id="selector" onchange="myselection()">
  <option value="0">User Preference</option>
  <option value="1">Similar Users</option>
</select>
</div>
<div id="coursecontent">
</div>
<br/><br/>
<div class="center">
  <div class="pagination" id="pagination">
  </div>
</div>
</body>
<script>
// Get the modal
getCurrentStatus();
var modal = document.getElementById('myModal');
var modal1 = document.getElementById('mModal');
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
var span1 = document.getElementsByClassName("close")[1];
span.style.display="none";
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

span1.onclick = function() {
    modal1.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
/*window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}*/

function checkActive(){
	<?php
	if($_SESSION["Active"]==0){
	?>
	
	modal.style.display = "block";
	<?php
	}
	?>
}
function showSettings(){
	modal.style.display = "block";
	var span = document.getElementsByClassName("close")[0];
	span.style.display="inline";

}

function showSyllabus(course,title){
	var modal = document.getElementById('mModal');
	modal.style.display = "block";
	var span1 = document.getElementsByClassName("close")[1];
	span1.style.display="inline";
	var mbody=document.getElementById("mbody");
	var mhead=document.getElementById("sylheader");
	mhead.innerHTML="Syllabus : "+title+"("+course+")";
	var client = new XMLHttpRequest();
	client.open('GET', 'syllabus/'+course+'.txt');
	client.onreadystatechange = function() {
	var mbody=document.getElementById("mbody");
	mbody.innerHTML=client.responseText;
	}
client.send();
}

function showRemarks(course,title,remarks){
	var modal = document.getElementById('mModal');
	modal.style.display = "block";
	var span1 = document.getElementsByClassName("close")[1];
	span1.style.display="inline";
	var mbody=document.getElementById("mbody");
	var mhead=document.getElementById("sylheader");
	mhead.innerHTML="Remarks : "+title+"("+course+")";
	
	
	var mbody=document.getElementById("mbody");
	mbody.innerHTML=remarks;
	
}


function showReviews(course,title){
	var modal = document.getElementById('mModal');
	modal.style.display = "block";
	var span1 = document.getElementsByClassName("close")[1];
	span1.style.display="inline";
	var mbody=document.getElementById("mbody");
	var mhead=document.getElementById("sylheader");
	mhead.innerHTML="Reviews : "+title+"("+course+")";
	var client = new XMLHttpRequest();
	client.open('GET', 'getreviews?course='+course);
	client.onreadystatechange = function() {
	var mbody=document.getElementById("mbody");
	mbody.innerHTML=client.responseText;
	}
client.send();
}

function updateValue(){
	var sbv=document.getElementsByClassName('seekbarvalues');
	var sb=document.getElementsByClassName('seekbar');
	document.getElementById("save").value = "Save Settings";
	var span = document.getElementsByClassName("close")[0];
span.style.display="none";
	for(var i=0;i<sb.length;i++){
		sbv[i].innerHTML=sb[i].getAttribute('data-seekbar-value');
	}

}

function saveSettings(){
	var sbv=document.getElementsByClassName('seekbarvalues');
	var v1=sbv[0].innerHTML;
	var v2=sbv[1].innerHTML;
	var v3=sbv[2].innerHTML;
	var v4=sbv[3].innerHTML;
	var v5=sbv[4].innerHTML;
	 var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("save").value = "Saved";
	 	<?php
	$con = mysqli_connect("localhost","root","","courserec");

// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
  $sql="SELECT * from studentsettings where RollNo='".$_SESSION["RollNo"]."'";
$ret=mysqli_query($con,$sql);
$count=mysqli_num_rows($ret);
if($count==1){
	$row=mysqli_fetch_assoc($ret);
	$_SESSION["Theory"]=$row["Theory"];
	$_SESSION["Programming"]=$row["Programming"];
	$_SESSION["Placement"]=$row["Placement"];
	$_SESSION["Prerequisite"]=$row["Prerequisite"];
	$_SESSION["Problematic"]=$row["Problematic"];
}
mysqli_close($con);
	?>
	 var span = document.getElementsByClassName("close")[0];
	span.style.display="inline";
	<?php $_SESSION["Active"]=1; ?>
    }
  };
  var val="<?php echo $_SESSION["RollNo"]; ?>";
 xhttp.open("GET", "savesetting?v1="+v1+"&v2="+v2+"&v3="+v3+"&v4="+v4+"&v5="+v5+"&RollNo="+val, true);
  xhttp.send(null);
}
function myselection(){
	var s=document.getElementById("selector").value;
	if(s=="0")
		getCoursesbyUserRollNo();
	else
		getCoursesbyUserCollaboration();
}
function getCoursesbyUserRollNo(){
	var username="<?php echo $_SESSION['RollNo'] ?>";
	 var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	course=JSON.parse(xhttp.responseText);
	page=1;
	method="US";
	//function call_
	paginate_result(page,8,method);
	paginate_link(page);
	}
	 }
  xhttp.open("GET", "selectbyUS?username="+username, true);
  xhttp.send(null);
}
function paginate_link(p){
	if(p=="prev"){
	if(page-1>0)	
	page=page-1;	
	}else if(p=="next"){
		if(page+1<=Math.ceil(course.courses.length/8))	
		page=page+1;
	}else{
	page=p;
	}
	var htmlcontent="<a href=\"#\" onclick=\"paginate_link('prev')\">&laquo;</a>";
	for (var i = 1; i <= Math.ceil(course.courses.length/8); i++) {
	if(i==page){
		htmlcontent=htmlcontent+"<a href=\"#\" class=\"active\" onclick=\"paginate_link("+i+")\">"+i+"</a>";
	}else{
		htmlcontent=htmlcontent+"<a href=\"#\" onclick=\"paginate_link("+i+")\">"+i+"</a>"
	}
	}
    htmlcontent=htmlcontent+"<a href=\"#\" onclick=\"paginate_link('next')\">&raquo;</a>";
	document.getElementById("pagination").innerHTML=htmlcontent;
	paginate_result(page,8,method);
}
function paginate_result(page,perpage,method){
	var htmlcontent="";
	for (var i = (page-1)*8; i < course.courses.length && i<(page-1)*8+8; i++) {
    var counter = course.courses[i];
//	if(counter["CourseTitle"].length<=24)
	//counter["CourseTitle"]=counter["CourseTitle"]+"<br/>";
   if(method=="US"){
	if(selCourses.includes(counter["CourseCode"])){   
    htmlcontent=htmlcontent+"<div class=\"floated_img \" style='background:grey;' id=\""+counter["CourseCode"]+"div"+"\"><center><h4 style=\"font-size: 13px;font-weight: bold; display:inline;\" class=\"tooltip\">"+counter["CourseTitle"]+"<span class=\"custom info\"><img src=\"./images/Info.png\" alt=\"Information\" height=\"48\" width=\"48\"/><em>"+counter["CourseTitle"]+"</em>"+counter["Description"]+"</span></h4><br/><h4 style=\"font-size: 13px;font-weight: bold;display:inline;\">("+counter["CourseCode"]+")</h4><br/><img src=\"images/"+counter["CourseCode"]+".png\" alt=\"Some image\" class=\"subimage\">";
	}else{
    htmlcontent=htmlcontent+"<div class=\"floated_img \" style='background:white;' id=\""+counter["CourseCode"]+"div"+"\"><center><h4 style=\"font-size: 13px;font-weight: bold; display:inline;\" class=\"tooltip\">"+counter["CourseTitle"]+"<span class=\"custom info\"><img src=\"./images/Info.png\" alt=\"Information\" height=\"48\" width=\"48\"/><em>"+counter["CourseTitle"]+"</em>"+counter["Description"]+"</span></h4><br/><h4 style=\"font-size: 13px;font-weight: bold;display:inline;\">("+counter["CourseCode"]+")</h4><br/><img src=\"images/"+counter["CourseCode"]+".png\" alt=\"Some image\" class=\"subimage\">";

	}
	
	}else{
	if(selCourses.includes(counter["CourseCode"])){   	
	htmlcontent=htmlcontent+"<div class=\"floated_img\" style='background:grey;' id=\""+counter["CourseCode"]+"div"+"\"><center><h4 style=\"font-size: 13px;font-weight: bold;display:inline;\">"+counter["CourseTitle"]+"</h4><br/><h4 style=\"font-size: 13px;font-weight: bold;display:inline;\">("+counter["CourseCode"]+") (EG : "+counter["ExpGrade"]+")</h4><br/><img src=\"images/"+counter["CourseCode"]+".png\" alt=\"Some image\" class=\"subimage\">";
	}else{
	htmlcontent=htmlcontent+"<div class=\"floated_img\" style='background:white;' id=\""+counter["CourseCode"]+"div"+"\"><center><h4 style=\"font-size: 13px;font-weight: bold;display:inline;\">"+counter["CourseTitle"]+"</h4><br/><h4 style=\"font-size: 13px;font-weight: bold;display:inline;\">("+counter["CourseCode"]+") (EG : "+counter["ExpGrade"]+")</h4><br/><img src=\"images/"+counter["CourseCode"]+".png\" alt=\"Some image\" class=\"subimage\">";
	}
   }
   htmlcontent=htmlcontent+"<div><b>Rating :</b> "+counter["Rating"]+"/5 ("+counter["TotalVotes"]+" votes)</div><br/>";
	htmlcontent=htmlcontent+"<div class=\"buttons\"><span class=\"myButton\" id=\"myButton\" onclick=\"showSyllabus('"+counter["CourseCode"]+"','"+counter["CourseTitle"]+"');\">Syllabus</span>";
	htmlcontent=htmlcontent+"<span class=\"myButton\" id='"+counter["CourseCode"]+"' onclick=\"selectCourses('"+counter["CourseCode"]+"','"+counter["CourseTitle"]+"','"+counter["Remarks"]+"')\">";
	if(selCourses.includes(counter["CourseCode"]))
	htmlcontent=htmlcontent+"UnSelect</span>";
	else
	htmlcontent=htmlcontent+"Select</span>";	
	htmlcontent=htmlcontent+"<span class=\"myButton\" id=\"myButton\" onclick=\"showReviews('"+counter["CourseCode"]+"','"+counter["CourseTitle"]+"');\">Reviews</span>";
    //htmlcontent=htmlcontent+"<span class='myButton' onclick=\"showRemarks('"+counter["CourseCode"]+"','"+counter["CourseTitle"]+"','"+counter["Remarks"]+"')\">Remarks</span>";
	
	htmlcontent=htmlcontent+"</div></center></div>";
	}
	document.getElementById("coursecontent").innerHTML=htmlcontent;
}
Array.prototype.remove = function() {
    var what, a = arguments, L = a.length, ax;
    while (L && this.length) {
        what = a[--L];
        while ((ax = this.indexOf(what)) !== -1) {
            this.splice(ax, 1);
        }
    }
    return this;
};
function savedb(){
	var username="<?php echo $_SESSION['RollNo'] ?>";
	var CurrentSem="<?php echo $_SESSION['CurrentSem'] ?>";
	 var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	alert(xhttp.responseText);
	if(n==0){
		document.getElementById("selectc").innerHTML="<b>"+n+" Courses need to be selected</b><span class='myButton'>Submitted</span>";
	}
	}
	 }
	var index;
	var coursestring="";
	for (index = selCourses.length - 1; index >= 0; --index) {
    coursestring=coursestring+"&course[]="+(selCourses[index]);
	} 
  xhttp.open("GET", "saveselectc?username="+username+"&CurrentSem="+CurrentSem+coursestring, true);
  xhttp.send(null);
}
function selectCourses(course,title,remarks){
	if(document.getElementById(course).innerHTML=="Select" && n>0){
		document.getElementById(course).innerHTML="UnSelect";
		document.getElementById(course+"div").style.backgroundColor="grey";
		n=n-1;
		if(remarks!=="No remarks."){
		remarks=remarks+"<br/> You can go ahead and select the course";
		showRemarks(course,title,remarks);
		}
		selCourses.push(course);
		if(n!==0)
		document.getElementById("selectc").innerHTML="<b>"+n+" Courses need to be selected</b>";
		else
			document.getElementById("selectc").innerHTML="<b>"+n+" Courses need to be selected</b><span class='myButton' onclick='savedb()'>Submit</span>";
		console.log(selCourses);
	}else if(n>0){
		document.getElementById(course).innerHTML="Select";
		document.getElementById(course+"div").style.backgroundColor="white";
		selCourses.remove(course);
		n=n+1;
		document.getElementById("selectc").innerHTML="<b>"+n+" Courses need to be selected</b>";
		console.log(selCourses);
	}else if(n==0 && document.getElementById(course).innerHTML=="UnSelect" ){
		document.getElementById(course).innerHTML="Select";
		document.getElementById(course+"div").style.backgroundColor="white";
		selCourses.remove(course);
		n=n+1
		document.getElementById("selectc").innerHTML="<b>"+n+" Courses need to be selected</b>";
		console.log(selCourses);
	}
}
function getCoursesbyUserCollaboration(){
	var username="<?php echo $_SESSION['RollNo'] ?>";
	 var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	course=JSON.parse(xhttp.responseText);
	page=1;
	method="UC";
	//function call_
	paginate_result(page,8,method);
	paginate_link(page);
	}
	 }
  xhttp.open("GET", "selectbyUC?username="+username, true);
  xhttp.send(null);
}

function getCurrentStatus(){
	var username="<?php echo $_SESSION['RollNo'] ?>";
	 var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	n=xhttp.responseText;
	if(n>0){
		document.getElementById("selectc").innerHTML="<b>"+n+" Courses need to be selected</b>";
	}
	}
	 }
  xhttp.open("GET", "generalstatus?username="+username, true);
  xhttp.send(null);
}

</script>
</html>