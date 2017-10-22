<?php
$response=array();
class DelDept{
	function DelDepartment(){
		$con = mysqli_connect("localhost","root","","courserec");
        global $response;
// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
  $sql="delete from department where deptid='".$_GET["code"]."'";
  if(mysqli_query($con,$sql))
	{	
	$response["error"]=false;
	}else{
	$response["error"]=true;
	}
      echo json_encode($response);  
	}
}
$s=new DelDept();
$s->DelDepartment();
?>