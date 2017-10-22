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
  $sql="SELECT * from studentdetails where RollNo='".$_SESSION["RollNo"]."'";
$ret=mysqli_query($con,$sql);
$count=mysqli_num_rows($ret);
echo "<div><h1>Contact Details</h2><table id='content' style='font-size:24px;'>";
if($count==1){
	$row=mysqli_fetch_assoc($ret);
	echo "<tr><td>Roll No. :</td><td><b>".$row["RollNo"]."</b></td></tr>";
	echo "<tr><td>First Name:</td><td><b>".$row["FirstName"]."</b></td><td style='width:20px;'></td><td>Last Name:</td><td><b>".$row["LastName"]."</b></td></tr>";
	echo "<tr><td>Department :</td><td><b>".$row["Dept"]."</b></td></tr>";
	echo "<tr><td>Program :</td><td><b>".$row["Program"]."</b></td></tr>";
	echo "<tr><td>Student's Mobile:</td><td><b>".$row["MobileStudent"]."</b></td></tr>";
	echo "<tr><td>Parents's Mobile :</td><td><b>".$row["MobileParent"]."</b></td></tr>";
	echo "<tr><td>Student's Email :</td><td><b>".$row["Email"]."</b></td></tr>";
}
echo "</table></div>";
?>