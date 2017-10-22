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
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #101;
	
}

li {
    float: right;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
@media screen and (max-width: 600px){
    ul.topnav li.right, 
    ul.topnav li {float: none;}
}
#logo{
	float:left;
}
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 100; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}
/* Modal Header */
.modal-header {
    padding: 2px 16px;
    background-color: #010105;
    color: white;
}

/* Modal Body */
.modal-body {padding: 2px 16px;}

/* Modal Footer */
.modal-footer {
    padding: 2px 16px;
    background-color: #010105;
    color: white;
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
	top:30%;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top: -300px; opacity: 0} 
    to {top: 30%; opacity: 1}
}

@keyframes animatetop {
    from {top: -300px; opacity: 0}
    to {top: 30% opacity: 1}
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    text-decoration: none;
    cursor: pointer;
}
#slider {
  margin: 20px;
}
</style>
<title>My Dashboard</title>

</head>

<body onload="loadcontent()">
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
	?>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
   <div class="modal-header">
    <span class="close">&times;</span>
    <center><h2>User Specific Settings</h2><center>
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
 <td><b>Analytical</b></td>
 <td><div class="seekbar" data-seekbar-value="<?php echo $_SESSION["Problematic"]?>"></div></td>
 <td><div class="seekbarvalues"></div></td>
	</tr>		
 </table>
 <br/>
 <center><input class="button" id="save" type="submit" value="Save Settings" onclick="saveSettings()"></center>
  </div>
  <div class="modal-footer">
    <h3>Set your preferences to get better results.</h3>
  </div>
  </div>

</div>

<ul>
  <li id="logo"><img src="logo.jpg" style="float:left;height:100%;width:100px;" /></li>
  
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn"><?php echo $_SESSION["FirstName"]; ?></a>
    <div class="dropdown-content">
      <a href="#" onclick="showSettings()">Settings</a>
      <a href="#">Help</a>
      <a href="logout">Logout</a>
    </div>
  </li>
  <li><a href="#news" onclick="location.href='profile';">Profile</a></li>
  <li><a href="#home" onclick="location.href='dashboard';">Home</a></li>
  
</ul>
<center>
<style>
.tg {  
    color: #333;
    font-family: Helvetica, Arial, sans-serif;
    width: 640px; 
    border-collapse: 
    collapse; border-spacing: 0; 
}

.td, .th {  
    border: 1px solid transparent; /* No more visible border */
    height: 30px; 
    transition: all 0.3s;  /* Simple transition for hover effect */
}

.th {  
    background: #DFDFDF;  /* Darken header a bit */
    font-weight: bold;
}

.td {  
    background: #FAFAFA;
    text-align: center;
}

/* Cells in even rows (2,4,6...) are one color */        
.tr:nth-child(even) .td { background: #F1F1F1; }   

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */        
.tr:nth-child(odd) .td { background: #FEFEFE; }  

.tr .td:hover { background: #666; color: #FFF; }  
/* Hover cell effect! */
  .button {
   border: 1px solid #0a3c59;
   background: #3e779d;
   background: -webkit-gradient(linear, left top, left bottom, from(#65a9d7), to(#3e779d));
   background: -webkit-linear-gradient(top, #65a9d7, #3e779d);
   background: -moz-linear-gradient(top, #65a9d7, #3e779d);
   background: -ms-linear-gradient(top, #65a9d7, #3e779d);
   background: -o-linear-gradient(top, #65a9d7, #3e779d);
   background-image: -ms-linear-gradient(top, #65a9d7 0%, #3e779d 100%);
   padding: 10px 20px;
   -webkit-border-radius: 11px;
   -moz-border-radius: 11px;
   border-radius: 11px;
   -webkit-box-shadow: rgba(255,255,255,0.4) 0 0px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   -moz-box-shadow: rgba(255,255,255,0.4) 0 0px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   box-shadow: rgba(255,255,255,0.4) 0 0px 0, inset rgba(255,255,255,0.4) 0 1px 0;
   text-shadow: #7ea4bd 0 1px 0;
   color: #203e52;
   font-size: 17px;
   font-family: helvetica, serif;
   text-decoration: none;
   vertical-align: middle;
   }
.button:hover {
   border: 1px solid #0a3c59;
   text-shadow: #1e4158 0 1px 0;
   background: #3e779d;
   background: -webkit-gradient(linear, left top, left bottom, from(#65a9d7), to(#3e779d));
   background: -webkit-linear-gradient(top, #65a9d7, #3e779d);
   background: -moz-linear-gradient(top, #65a9d7, #3e779d);
   background: -ms-linear-gradient(top, #65a9d7, #3e779d);
   background: -o-linear-gradient(top, #65a9d7, #3e779d);
   background-image: -ms-linear-gradient(top, #65a9d7 0%, #3e779d 100%);
   color: #fff;
   }
.button:active {
   text-shadow: #1e4158 0 1px 0;
   border: 1px solid #0a3c59;
   background: #65a9d7;
   background: -webkit-gradient(linear, left top, left bottom, from(#3e779d), to(#3e779d));
   background: -webkit-linear-gradient(top, #3e779d, #65a9d7);
   background: -moz-linear-gradient(top, #3e779d, #65a9d7);
   background: -ms-linear-gradient(top, #3e779d, #65a9d7);
   background: -o-linear-gradient(top, #3e779d, #65a9d7);
   background-image: -ms-linear-gradient(top, #3e779d 0%, #65a9d7 100%);
   color: #fff;
   }
  </style>
  <br/>
  <div id='fcontent'></div>
  
</center>
</body>

<script>
// Get the modal

var modal = document.getElementById('myModal');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
span.style.display="none";
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
/*window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}*/

function subta(code){
	var RollNo="<?php echo $_SESSION["RollNo"]; ?>";
	var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		loadcontent();
	}
	 }
	 var comment=document.getElementById(code).value;
	 var rating=document.getElementById("rate"+code).value;
	 xhttp.open("GET", "setfeedback?RollNo="+RollNo+"&Comment="+comment+"&CourseCode="+code+"&Rating="+rating, true);
     xhttp.send(null);
}

function checkActive(){
	<?php
	if($_SESSION["Active"]==0){
	?>
	
	modal.style.display = "block";
	<?php
	}
	?>
}
function loadcontent(){
	var RollNo="<?php echo $_SESSION["RollNo"]; ?>";
	var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
		document.getElementById("fcontent").innerHTML=xhttp.responseText;
	}
	 }
	 xhttp.open("GET", "getfeedback?RollNo="+RollNo, true);
     xhttp.send(null);
}
function showSettings(){
	modal.style.display = "block";
	var span = document.getElementsByClassName("close")[0];
	span.style.display="inline";

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
	 var span = document.getElementsByClassName("close")[0];
	span.style.display="inline";
	<?php $_SESSION["Active"]=1; ?>
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
    }
  };
  var val="<?php echo $_SESSION["RollNo"]; ?>";
 xhttp.open("GET", "savesetting?v1="+v1+"&v2="+v2+"&v3="+v3+"&v4="+v4+"&v5="+v5+"&RollNo="+val, true);
  xhttp.send(null);
}
</script>

</html>