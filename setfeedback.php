<?php
session_start();
error_reporting(0);

$con = mysqli_connect("localhost","root","","courserec");

// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
 date_default_timezone_set('Asia/Kolkata');
//echo date("d-M-Y H:i:s");
$sql="Insert into userreviews values('".$_GET['RollNo']."','".$_GET['CourseCode']."','".$_GET['Comment']."','".date("d-M-Y H:i:s")."')";
$ret=mysqli_query($con,$sql);
$sql="Insert into userrating values('".$_GET['RollNo']."','".$_GET['CourseCode']."','".$_GET['Rating']."')";
$ret=mysqli_query($con,$sql);
$count=mysqli_num_rows($ret);

?>