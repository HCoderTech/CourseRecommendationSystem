<?php
session_start();
error_reporting(0);
if(!$_SESSION["login"] or $_SESSION["login"]===false){
	header("Location:index");
}
$con = mysqli_connect("localhost","root","","courserec");

// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
  $sql="SELECT u.CourseCode,u.Comment,u.TimeOfComment,c.CourseTitle as CourseTitle FROM `userreviews` u,`coursedetails` c WHERE u.CourseCode=c.CourseCode and u.RollNo='".$_SESSION["RollNo"]."'";
$ret=mysqli_query($con,$sql);
$count=mysqli_num_rows($ret);
echo "<div><h1>Reviews</h1><table id='content' style='font-size:24px;'>";
while($row=mysqli_fetch_assoc($ret)){
	echo "<tr><td><b>".$row['CourseCode']."</b></td><td><b>".$row['CourseTitle']."</b></td></tr>";
	echo "<tr><td colspan=2><i>\"".$row['Comment']."\"</i></td></tr>";
	echo "<tr><td colspan=2 style='text-align:right;'><b><i>on ".$row['TimeOfComment']."</i></b></td></tr>";
}
echo "</table></div>";
?>