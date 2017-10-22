<?php
error_reporting(0);
$con = mysqli_connect("localhost","root","","courserec");

if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
  $sql="SELECT u.RollNo,u.Comment,u.TimeOfComment FROM `userreviews` u WHERE u.CourseCode='".$_GET["course"]."'";
$ret=mysqli_query($con,$sql);
$count=mysqli_num_rows($ret);
echo "<div><h1>Reviews</h1><table id='content' style='font-size:24px;'>";
while($row=mysqli_fetch_assoc($ret)){
	echo "<tr><td><b>".$row['RollNo']." says :</b></td><td style='20px;'></td></tr>";
	echo "<tr><td colspan=2><i>\"".$row['Comment']."\"</i></td></tr>";
	echo "<tr><td colspan=2 style='text-align:right;'><b><i>on ".$row['TimeOfComment']."</i></b></td></tr>";
}
if($count==0){
	echo "<tr><td>No Reviews yet.</td></tr>";
}
echo "</table></div>";
?>