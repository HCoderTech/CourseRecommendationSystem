<?php
session_start();
$con = mysqli_connect("localhost","root","","courserec");

// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
$username=$_POST['rollno'];
$password=$_POST['password'];
$loginmode=$_POST['loginmode'];
if($loginmode=="user"){
$sql="SELECT * from studentdetails where RollNo='".$username."' and Password='".$password."'";
$ret=mysqli_query($con,$sql);
$count=mysqli_num_rows($ret);
if($count==1){
	$row=mysqli_fetch_assoc($ret);
	$_SESSION["login"]=true;
	$_SESSION["RollNo"]=$row["RollNo"];
	$_SESSION["FirstName"]=$row["FirstName"];
	$_SESSION["LastName"]=$row["LastName"];
	$_SESSION["Dept"]=$row["Dept"];
	$_SESSION["Program"]=$row["Program"];
	$_SESSION["DateOfBirth"]=$row["DateOfBirth"];
	$_SESSION["ImageFile"]=$row["ImageFile"];
	$_SESSION["Active"]=$row["Active"];
	$_SESSION["login"]=true;
	$sql="SELECT Sem,GPA FROM `studentsummary` WHERE `RollNo`='".$username."'";
	$ret=mysqli_query($con,$sql);
	$_SESSION["SemMarks"]="";
	while($row=mysqli_fetch_assoc($ret)){
		$_SESSION["SemMarks"]=$_SESSION["SemMarks"].$row["Sem"].",".$row["GPA"].";";
	}
	$sql="SELECT CurrentSem,CGPA FROM `generaldetails` WHERE `RollNo`='".$username."'";
	$ret=mysqli_query($con,$sql);
	
	while($row=mysqli_fetch_assoc($ret)){
		$_SESSION["CurrentSem"]=$row["CurrentSem"];
		$_SESSION["CGPA"]=$row["CGPA"];
	}
	
	
	header("Location:dashboard");
	exit();
}else{
	header("Location:index?result=fail");
	exit();
}}else{
	$sql="SELECT * from admins where Username='".$username."' and Password='".$password."'";
	$ret=mysqli_query($con,$sql);
	$count=mysqli_num_rows($ret);
	if($count==1){
		$_SESSION["login"]=true;
		$_SESSION["username"]=$username;
		header("Location:admindashboard");
		mysqli_close($con);
		exit();
	}
}
?>