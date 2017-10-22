<?php
session_start();


$con = mysqli_connect("localhost","root","","courserec");

// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
$sql="select CurrentSem,SelectCourse from generaldetails where RollNo='".$_GET['username']."'";
$ret=mysqli_query($con,$sql);
$count=mysqli_num_rows($ret);
$row=mysqli_fetch_assoc($ret);
echo mysqli_error($con);
if($row["SelectCourse"]>0){
	echo $row["SelectCourse"];
}
?>