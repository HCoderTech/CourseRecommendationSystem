<?php
session_start();
error_reporting(0);
if(!$_SESSION["login"] or $_SESSION["login"]===false){
	header("Location:index");
}
?>
<!DOCTYPE html>
<html>
<head>
<link href="seekbar.css" rel="stylesheet" type="text/css"/>
<link href="profile.css" rel="stylesheet" type="text/css"/>
<script src="seekbar.js" type="text/javascript"></script>
<link href="./css/elective.css" rel="stylesheet" type="text/css">
<title>My Profile</title>
</head>
<script>
function loadpage(page){
	document.getElementById("framecontent").src=page;
}
</script>
<body>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
   <div class="modal-header">
    <span class="close">&times;</span>
    <center><h2>User Specific Settings</h2></center>
  </div>
  <div class="modal-body">
  <table>
 <tr onclick="updateValue()">
 <td><b>Theory</b></td>
 <td style="width:100%;"><div class="seekbar" data-seekbar-value="<?php echo $_SESSION["Theory"]?>"></div></td>
 <td><div class="seekbarvalues"></div></td>
	</tr>		
<tr onclick="updateValue()">
 <td><b>Programming</b></td>
 <td><div class="seekbar" data-seekbar-value="<?php echo $_SESSION["Programming"]?>"></div></td>
 <td><div class="seekbarvalues"></div></td>
	</tr>	
<tr onclick="updateValue()">
 <td><b>Placement<b></td>
 <td><div class="seekbar" data-seekbar-value="<?php echo $_SESSION["Placement"]?>"></div></td>
 <td><div class="seekbarvalues"></div></td>
	</tr>	
<tr onclick="updateValue()">
 <td><b> Diversity </b></td>
 <td><div class="seekbar" data-seekbar-value="<?php echo $_SESSION["Prerequisite"]?>"></div></td>
 <td><div class="seekbarvalues"></div></td>
	</tr>	
<tr onclick="updateValue()">
 <td><b>Analytical</b></td>
 <td><div class="seekbar" data-seekbar-value="<?php echo $_SESSION["Problematic"]?>"></div></td>
 <td><div class="seekbarvalues"></div></td>
	</tr>		
 </table>
 <br/>
 <center><input class="button" id="save" type="submit" value="Save Settings" onclick="saveSettings();getCoursesbyUserRollNo();"></center>
  </div>
  <div class="modal-footer">
    <h3>Set your preferences to get better results.</h3>
  </div>
  </div>

</div>
<ul>
  <li id="logo"><img src="logo.jpg" style="float:left;height:100%;width:100px;" /></li>
  
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn"><?php echo $_SESSION["FirstName"]; ?></a>
    <div class="dropdown-content">
      
      <a href="logout">Logout</a>
    </div>
  </li>
  <li><a href="#">Profile</a></li>
  <li><a href="#home" onclick="location.href='dashboard';">Home</a></li>
</ul>


<div id="sidebar">
<img src="images/<?php echo $_SESSION["ImageFile"];?>" width="140" height="140" style="border-radius:50%;margin:10px;"/>
<br/>
<span style="font-size:24px;"><b><?php echo $_SESSION["FirstName"]." ".$_SESSION["LastName"]; ?> </b></span>
<br/><br/>
<link rel="stylesheet" href="CSS3 Menu_files/css3menu1/style.css" type="text/css" /><style type="text/css">._css3m{display:none}</style>
<input type="checkbox" id="css3menu-switcher" class="c3m-switch-input">
<ul id="css3menu1" class="topmenu">
	<li class="switch"><label onclick="" for="css3menu-switcher"></label></li>
	<li class="topfirst" onclick="loadpage('profgeneral')"><a href="#" style="width:95%;"><img src="CSS3 Menu_files/css3menu1/service1.png" alt=""/>General</a></li>
	<li class="topmenu" onclick="loadpage('profacad')"><a href="#" style="width:95%;"><img src="CSS3 Menu_files/css3menu1/256sub1.png" alt=""/>Academics</a></li>
	<li class="topmenu" onclick="loadpage('profrev')"><a href="#" style="width:95%;"><img src="CSS3 Menu_files/css3menu1/smile1.png" alt=""/>Reviews</a></li>
	<li class="topmenu" onclick="loadpage('profrat')"><a href="#" style="width:95%;"><img src="CSS3 Menu_files/css3menu1/bfavour.png" alt=""/>Rating</a></li>
	<li class="toplast" onclick="loadpage('profcontact')"><a href="#" style="width:95%;"><img src="CSS3 Menu_files/css3menu1/mobile.png" alt=""/>Contact</a></li>
</ul>

</div>
<div>
  <iframe id="framecontent" src="profgeneral">
</div>
</body>
</html>