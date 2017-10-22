<?php
session_start();
$con = mysqli_connect("localhost","root","","courserec");
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
$sql="Update generaldetails set SelectCourse=SelectCourse-".sizeof($_GET['course'])." where RollNo='".$_GET['username']."'";
$ret=mysqli_query($con,$sql);
 $count=0;
 for($i=0;$i<sizeof($_GET['course']);$i++){ 
$sql="insert into selectedcourse values('".$_GET['username']."','".$_GET['course'][$i]."',".$_GET['CurrentSem'].")";
$ret=mysqli_query($con,$sql);
$count=$count+1;
 }
if($count==sizeof($_GET['course'])){
	echo "All details saved";
}else{
	echo "Something went wrong";
}
?>