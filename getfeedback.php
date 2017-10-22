<?php
session_start();
error_reporting(0);

$con = mysqli_connect("localhost","root","","courserec");

// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
$sql="select CourseCode,CourseTitle from coursedetails where CourseCode in (select RealCourseCode from coursetaken where RollNo='".$_GET['RollNo']."') and CourseCode not in (select CourseCode from userreviews where RollNo='".$_GET['RollNo']."')";
$ret=mysqli_query($con,$sql);
$count=mysqli_num_rows($ret);
echo "<div><h1>Add Reviews</h1><table id='content' style='font-size:24px;'>";
while($row=mysqli_fetch_assoc($ret)){
	echo "<tr style='text-align:center;'><td><b>".$row['CourseCode']."</b></td><td><b>".$row['CourseTitle']."</b></td></tr>";
	echo "<tr><td colspan=2 style='text-align:center;'><textarea id='".$row['CourseCode']."' rows=4 cols=50></textarea></td></tr>";
	echo "<tr><td style='text-align:center;'>Rating :</td><td style='text-align:center;'><select id='rate".$row['CourseCode']."' style='width:80px;height:40px;font-size:18px;'><option value='5'>5</option><option value='4'>4</option><option value='3'>3</option><option value='2'>2</option><option value='1'>1</option></select></td></tr>";
	echo "<tr><td colspan=2 onclick=\"subta('".$row['CourseCode']."');\" style='text-align:center;'><input class=\"button\" type=\"submit\" value=\"Submit Feedback\"></td></tr>";
	}
echo "</table></div>";
?>