<!DOCTYPE html>
<script>
var list;
var gcode;
var gname;
</script>
<div onload="check()">
<h2>Department</h2>
<form action="dept" method="post">
<label>Enter the Department Code:</label>
<input type="text" name="code" id="code" required /><br/><br/>
<label>Enter the Department Name:</label>
<input type="text" name="name" id="name" required />
<br/><br/>
<input type="button" name="submit" value="Add Entry" onclick="adddept()"/>
<input type="button" name="submit1" value="Edit Entry" onclick="editdept()"/>
<br/><br/>
</form>
<b><label id="error" style="color:red;"></label></b>
</div>
<div>
<h2>List of Departments</h2>
<div id="deptcontent"></div>
</div>
<script>
check();
function check(){
	var xhttp = new XMLHttpRequest();
	var htmlcontent="";
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
	list=JSON.parse(xhttp.responseText);
	htmlcontent="<table><tr><th>Department Code</th><th>Department Name</th><th>Action</th></tr>";
	for(var i=0;i<list.departments.length;i++){
		var counter=list.departments[i];
		htmlcontent=htmlcontent+"<tr><td>"+counter["deptid"]+"</td><td>"+counter["deptname"]+"</td>";
		htmlcontent=htmlcontent+"<td><button onclick=\"fill('"+counter["deptid"]+"','"+counter["deptname"]+"')\">Edit</button><button onclick=deletedept('"+counter['deptid']+"')>Delete</button></td></tr>";
	}
	htmlcontent=htmlcontent+"</table>"
	document.getElementById("deptcontent").innerHTML=htmlcontent;
	}
	 }
  xhttp.open("GET", "listofdept", true);
  xhttp.send(null);
}
function adddept(){
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
	 if(code.length>0 && name.length>0){
	document.getElementById("error").innerHTML="";
	xhttp.open("GET", "adddept?code="+code+"&name="+name, true);
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
