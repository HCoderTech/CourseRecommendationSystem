<?php
session_start();
error_reporting(0);
$con = new mysqli("localhost", "root", "", "courserec");
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql="select CourseCode,CourseTitle from coursedetails where CourseCode in(select Course from (SELECT REPLACE(CourseCode,'14','15') as Course from coursetaken where RollNo='".$_GET["RollNo"]."') as Temp where Course not in (select CourseCode from userreviews where RollNo='".$GET["RollNo"]."'))";
$result = $con->query($sql);
$count=mysqli_num_rows($ret);
echo $count;
echo "<div><h1>Add Reviews</h1><table id='content' style='font-size:24px;'>";
while($row = $result->fetch_assoc()){
	echo "<tr><td><b>".$row['CourseCode']."</b></td><td><b>".$row['CourseTitle']."</b></td></tr>";
	echo "<tr><td colspan=2><textarea rows=4 cols=50></textarea></td></tr>";
	echo "<tr><td colspan=2 style='text-align:right;'><input class=\"button\" type=\"submit\" value=\"Submit Feedback\"></td></tr>";
}
echo "</table></div>";
?>