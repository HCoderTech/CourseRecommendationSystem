<?php
$response=array();
class ListCourse{
	function ListCourses(){
		$con = mysqli_connect("localhost","root","","courserec");
        global $response;
// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
  $sql="SELECT * from coursedetails";
  $ret=mysqli_query($con,$sql);
  $rows=array();
		while($row = mysqli_fetch_assoc($ret)){
			$rows[]=$row;
		}
		$response["courses"]=$rows;
      echo json_encode($response);  
	}
}
$s=new ListCourse();
$s->ListCourses();
?>