<!DOCTYPE html>
<script>
var list;
var gcode;
var gname;
</script>
<div onload="check()">
<h2>Course Details</h2>
<form action="dept" method="post">
<label>Course Code:</label>
<input type="text" name="code" id="code" required />
<label>Course Title:</label>
<input type="text" name="name" id="name" required />
<br/><br/>
<label>Credit:</label>
<input type="text" name="credit" id="credit" required />
<label>Category:</label>
<select name="category" id="category">
  <option value="PE">Professional Elective</option>
  <option value="C">Compulsary Course</option>
</select><br/><br/>
<label>Program:</label>
<select name="program" id="program">
</select><br/><br/>
<label>Course Scale:</label>
<input type="theory" name="theory" id="theory" placeholder="theory" style="width:50px;" required />
<input type="programming" name="programming" id="programming" placeholder="programming" style="width:70px;" required />
<input type="placement" name="placement" id="placement" placeholder="placement" style="width:70px;" required />
<input type="prerequisite" name="prerequisite" id="prerequisite" placeholder="prerequisite" style="width:70px;" required />
<input type="problematic" name="problematic" id="problematic" placeholder="problematic" style="width:70px;" required />
<br/><br/>
<input type="button" name="submit" value="Add Entry" onclick="addcourse()"/>
<input type="button" name="submit1" value="Edit Entry" onclick="editcourse()"/>
<br/><br/>
</form>
<b><label id="error" style="color:red;"></label></b>
</div>
<div>
<h2>List of Courses</h2>
<div id="coursecontent"></div>
</div>
<script>
check();
loadoptions();
function check(){
	var xhttp = new XMLHttpRequest();
	var htmlcontent="";
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	list=JSON.parse(xhttp.responseText);
	htmlcontent="<table><tr><th>Course Code</th><th>Course Title</th><th>Program</th><th>Action</th></tr>";
	for(var i=0;i<list.courses.length;i++){
		var counter=list.courses[i];
		htmlcontent=htmlcontent+"<tr><td>"+counter["CourseCode"]+"</td><td>"+counter["CourseTitle"]+"</td><td>"+counter["Program"]+"</td>";
		htmlcontent=htmlcontent+"<td><button onclick=\"fill("+i+")\">Edit</button><button onclick=deletedept('"+counter['deptid']+"')>Delete</button></td></tr>";
	}
	htmlcontent=htmlcontent+"</table>"
	document.getElementById("coursecontent").innerHTML=htmlcontent;
	}
	 }
  xhttp.open("GET", "listofcourse", true);
  xhttp.send(null);
}
function loadoptions(){
	var xhttp = new XMLHttpRequest();
	var htmlcontent="";
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	list=JSON.parse(xhttp.responseText);
	for(var i=0;i<list.departments.length;i++){
		var counter=list.departments[i];
		htmlcontent=htmlcontent+"<option value='"+counter['deptid']+"'>"+counter["deptname"]+"</option>";
	}
	document.getElementById("program").innerHTML=htmlcontent;
	}
	 }
  xhttp.open("GET", "listofdept", true);
  xhttp.send(null);
}
function addcourse(){
	var xhttp = new XMLHttpRequest();
	var htmlcontent="";
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	msg=JSON.parse(xhttp.responseText);
	if(msg.error){
		alert("Something went wrong. Check the code");
	}else{
		alert("New entry added.");
		document.getElementById("code").value="";
		document.getElementById("name").value="";
		check();
	}
	}
	 }
	 var code=document.getElementById("code").value;
	 var name=document.getElementById("name").value;
	 var credit=document.getElementById("credit").value;
	 var category=document.getElementById("category").value;
	 var program=document.getElementById("program").value;
	 var theory=document.getElementById("theory").value;
	 var programming=document.getElementById("programming").value;
	 var placement=document.getElementById("placement").value;
	 var prerequisite=document.getElementById("prerequisite").value;
	 var problematic=document.getElementById("problematic").value;
	 if(code.length>0 && name.length>0){
	document.getElementById("error").innerHTML="";
	xhttp.open("GET", "addcourse?code="+code+"&name="+name, true);
	 xhttp.send(null);
	 }else{
		 document.getElementById("error").innerHTML="Input Fields can't be empty";
	 }
}
function fill(code,name){
	document.getElementById('code').value=code;
	document.getElementById('name').value=name;
	gcode=code;
	gname=name;
}
function editdept(){
	var xhttp = new XMLHttpRequest();
	var htmlcontent="";
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	msg=JSON.parse(xhttp.responseText);
	if(msg.error){
		alert("Something went wrong. Check the code");
	}else{
		alert("Entry edited.");
		document.getElementById("code").value="";
		document.getElementById("name").value="";
		check();
	}
	}
	 }
	 var code=document.getElementById("code").value;
	 var name=document.getElementById("name").value;
	 if(name!==gname || code!==gcode){
	document.getElementById("error").innerHTML="";
	xhttp.open("GET", "editdept?code="+code+"&name="+name+"&gcode="+gcode, true);
	 xhttp.send(null);
	 }else{
		 document.getElementById("error").innerHTML="No changes to be saved";
	 }
}
function deletedept(code){
	if (confirm("Delete the  Entry?") == true) {
    var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	msg=JSON.parse(xhttp.responseText);
	if(msg.error){
		alert("Something went wrong.");
	}else{
		alert("Entry Deleted successfully.");
		document.getElementById("code").value="";
		document.getElementById("name").value="";
		check();
	}
	}
	 }
	document.getElementById("error").innerHTML="";
	xhttp.open("GET", "deldept?code="+code, true);
	 xhttp.send(null);

} else {
    txt = "You pressed Cancel!";
}
}
</script>
