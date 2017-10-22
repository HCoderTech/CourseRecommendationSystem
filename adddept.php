<?php
$response=array();
class AddDept{
	function AddDepartment(){
		$con = mysqli_connect("localhost","root","","courserec");
        global $response;
// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
  $sql="Insert into department values('".$_GET["code"]."','".$_GET["name"]."')";
  if(mysqli_query($con,$sql))
	{	
	$response["error"]=false;
	}else{
	$response["error"]=true;
	}
      echo json_encode($response);  
	}
}
$s=new AddDept();
$s->AddDepartment();
?>