<?php
$con = mysqli_connect("localhost","root","","courserec");

// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
  $sql="Update studentsettings set Theory=".$_GET["v1"].",Programming=".$_GET["v2"].",Placement=".$_GET["v3"].",Prerequisite=".$_GET["v4"].",Problematic=".$_GET["v5"]." where RollNo='".$_GET["RollNo"]."'";
  mysqli_query($con,$sql);
  echo mysqli_error($con);
  $sql="Update studentdetails set Active=1 where RollNo='".$_GET["RollNo"]."'";
  mysqli_query($con,$sql);
?>