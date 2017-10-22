 <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
 <?php
session_start();
error_reporting(0);
if(!$_SESSION["login"] or $_SESSION["login"]===false){
	header("Location:index");
}
?>
<html>
<head>
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
#sidebar{
	position:absolute;
	background:aqua;
	width:20%;
	height:90%;
	
}
.options{
	
	float:left;
	background:grey;
	width:90%;
	margin:3%;
	height:20%;
	font-size:24px;
	text-align:center;
	border-radius: 12px;
	border: 2px solid #002F20; /* Green */
	line-height:100px;
	cursor:pointer;
}
.options:hover{
	 background-color: #f44336;
	 box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
.options span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.options span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.options:hover span {
  padding-right: 25px;
}

.options:hover span:after {
  opacity: 1;
  right: 0;
}
#framecontent{
	position:absolute;
	background:#eff145;
	width:79%;
	height:89%;
	left:20%;
}
</style>
<title>My Dashboard</title></head>
<body>
<script>
function changepage(page){
	document.getElementById("framecontent").src=page;
}
</script>
<div>
<ul>
  <li id="logo"><img src="logo.jpg" style="float:left;height:100%;width:100px;" /></li>
  
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Admin</a>
    <div class="dropdown-content">
      <a href="#" onclick="showSettings()">Settings</a>
      <a href="#">Help</a>
      <a href="logout">Logout</a>
    </div>
  </li>
  <li><a href="#home" onclick="location.href='dashboard';">Home</a></li>
  
</ul>
</div>

<div id="sidebar">
	<div class="options" onclick="changepage('dept')"><span>Department</span></div>
	<div class="options" onclick="changepage('course')"><span>Courses</span></div>
	<div class="options" onclick="changepage('student')"><span>Student</span></div>
	<div class="options"onclick="changepage('stat')"><span>Statistics</span></div>
	
</div>
<div>
  <iframe id="framecontent" src="dept">
</div>

</body>
</html>