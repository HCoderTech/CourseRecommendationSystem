<?php
$response=array();
class EditDept{
	function EditDepartment(){
		$con = mysqli_connect("localhost","root","","courserec");
        global $response;
// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
  $sql="update department set deptid='".$_GET["code"]."',deptname='".$_GET["name"]."' where deptid='".$_GET["gcode"]."'";
  if(mysqli_query($con,$sql))
	{	
	$response["error"]=false;
	}else{
	$response["error"]=true;
	}
      echo json_encode($response);  
	}
}
$s=new EditDept();
$s->EditDepartment();
?>