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
echo "<div><h1>Academic Performance</h2><table id='content' style='font-size:24px;'>";
if($count==1){
	$row=mysqli_fetch_assoc($ret);
	echo "<tr><td>Roll No. :</td><td><b>".$row["RollNo"]."</b></td></tr>";
	echo "<tr><td>First Name:</td><td><b>".$row["FirstName"]."</b></td><td style='width:20px;'></td><td>Last Name:</td><td><b>".$row["LastName"]."</b></td></tr>";
	echo "<tr><td>Department :</td><td><b>".$row["Dept"]."</b></td></tr>";
	echo "<tr><td>Program :</td><td><b>".$row["Program"]."</b></td></tr>";
}
echo "</table></div>";

$sql="SELECT Replace(CourseCode,'14','15') as CourseCode,MonthYear,GradePoints,Grade,Semester from coursetaken where RollNo='".$_SESSION["RollNo"]."'";
$ret=mysqli_query($con,$sql);
echo "<div><h1>Course List</h2><table class='tg' id='content' style='font-size:24px;text-align:center;'>";
echo "<tr class='tr'><th class='th'>CourseCode</th><th class='th'>Year</th><th class='th'>Semester</th><th class='th'>GradePoints</th><th class='th'>Grade</th></tr>";
while($row=mysqli_fetch_assoc($ret))
{	echo "<tr class='tr'><td class='td'>".$row['CourseCode']."</td><td class='td'>".$row['MonthYear']."</td>";
	echo "<td class='td'>".$row['Semester']."</td><td class='td'>".$row['GradePoints']."</td><td class='td'>".$row["Grade"]."</td></tr>";
}
echo "</table></div>";

?>
<h1>Sem-wise GPA</h1>
<table class="tg">

	<?php 

	$semno=array();
	$gpa=array();
	$invBlock=explode(";",$_SESSION["SemMarks"]);
	$j=0;
	foreach($invBlock as $i){
		$tmp=explode(",",$i);
		$semno[$j++]=$tmp[0];
		$gpa[$j++]=$tmp[1];
	}

	echo "<tr class=\"tr\">";
    foreach($semno as $i){
	if(!empty($i))
	echo "<th class=\"th\">Sem : $i</th>";
	}
  echo "</tr><tr class=\"tr\">";
   foreach($gpa as $i){
	if(!empty($i))
    echo "<td class=\"td\">$i</td>";
   }
 echo "</tr>";
  ?>
  </table>

<style>
.tg {  
    color: #333;
    font-family: Helvetica, Arial, sans-serif;
    width: 640px; 
    border-collapse: 
    collapse; border-spacing: 0; 
}

.td, .th {  
    border: 1px solid transparent; /* No more visible border */
    height: 30px; 
    transition: all 0.3s;  /* Simple transition for hover effect */
}

.th {  
    background: #DFDFDF;  /* Darken header a bit */
    font-weight: bold;
}

.td {  
    background: #FAFAFA;
    text-align: center;
}

/* Cells in even rows (2,4,6...) are one color */        
.tr:nth-child(even) .td { background: #F1F1F1; }   

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */        
.tr:nth-child(odd) .td { background: #FEFEFE; }  

.tr .td:hover { background: #666; color: #FFF; }  
/* Hover cell effect! */
</style>