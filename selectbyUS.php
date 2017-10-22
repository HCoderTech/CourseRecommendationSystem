<?php
$response=array();
class selectbyUS{
	function selectUS($username){
		$con = mysqli_connect("localhost","root","","courserec");
        global $response;
// Check connection
if (mysqli_connect_errno())
  {
  die("Failed to connect to MySQL: " . mysqli_connect_error());
  }
  $sql="SELECT c.`CourseCode`,c.`CourseTitle`,c.`Rating`,c.`TotalVotes`,c.`Description`,c.`Theory`*s.`Theory`+c.`Programming`*s.`Programming`+c.`Placement`*s.`Placement`+c.`Prerequisite`*s.`Prerequisite`+c.`Problematic`*s.`Problematic` as sump FROM `coursedetails` c,`studentsettings` s WHERE s.RollNo='".$username."' and c.`CourseCode` not in (SELECT RealCourseCode from coursetaken where RollNo='".$username."') and c.Category='PE' order by sump desc";
  $ret=mysqli_query($con,$sql);
  $rows=array();
		while($row = mysqli_fetch_assoc($ret)){
			$sql1="select coursetaken.GradePoints,coursetaken.RealCourseCode,ccourses.CourseTitle from coursetaken,ccourses where coursetaken.RealCourseCode in (select Prerequisite from prerequirement where CourseCode='".$row["CourseCode"]."') and coursetaken.RollNo='".$username."' and ccourses.CourseCode=coursetaken.RealCourseCode";
			$ret1=mysqli_query($con,$sql1);
			$remarks="";
			while($row1 = mysqli_fetch_assoc($ret1)){
				if($row1["GradePoints"]<8){
					$remarks=$remarks.$row1["CourseTitle"].",";
				}
			}
			if($remarks!=="")
				$remarks="You have scored less on ".$remarks;
			else
				$remarks="No remarks.";
			$row["Remarks"]=$remarks;
			$rows[]=$row;
		}
		$response["courses"]=$rows;
      echo json_encode($response);  
	}
}
$s=new selectbyUS();
$s->selectUS($_GET["username"]);

?>