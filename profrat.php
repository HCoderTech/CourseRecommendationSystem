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
  $sql="SELECT u.CourseCode,u.Rating,c.CourseTitle as CourseTitle FROM `userrating` u,`coursedetails` c WHERE u.CourseCode=c.CourseCode and u.RollNo='".$_SESSION["RollNo"]."'";
$ret=mysqli_query($con,$sql);
$count=mysqli_num_rows($ret);
echo "<div><h1>Ratings</h1><table class='tg' id='content' style='font-size:24px;'>";
echo "<tr><th class='th'>CourseCode</th><th class='th'>Title</th><th class='th'>Rating</th></tr>";
while($row=mysqli_fetch_assoc($ret)){
	echo "<tr class='tr'><td class='td'><b>".$row['CourseCode']."</b></td><td class='td'><b>".$row['CourseTitle']."</b></td><td class='td'><i>".$row['Rating']."/5</i></td></tr>";
}
echo "</table></div>";
?>
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