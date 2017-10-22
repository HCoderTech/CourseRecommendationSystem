<?php
require 'sendmail.php';
$to=$_POST['emailid'];

$con = mysqli_connect("localhost","root","","courserec");

// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }

$sql="SELECT * from `user` where `email`='".$to."'";
$ret=mysqli_query($con,$sql);
$count=mysqli_num_rows($ret);
$row = mysqli_fetch_assoc($ret);
$firstname=$row["firstname"];
$rollno=$row["rollno"];
$password=$row["password"];
$subject="Password Recovery";
$body="Hello ".$firstname.",\nYour Roll No.: ".$rollno."\nYour Password :".$password.".\n";


email($to,$firstname,$subject,$body);
header("Location:index?result=sendmail&count=".$count);
	exit();
?>