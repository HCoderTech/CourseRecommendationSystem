<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #101;
	
}

li {
    float: right;
}

li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}
@media screen and (max-width: 600px){
    ul.topnav li.right, 
    ul.topnav li {float: none;}
}
#logo{
	float:left;
}
</style>
</head>
<body>

<ul>
  <li id="logo"><img src="logo.jpg" style="float:left;height:100%;width:100px;" /></li>
  
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">MyName</a>
    <div class="dropdown-content">
      <a href="#">Settings</a>
      <a href="#">Help</a>
      <a href="#">Logout</a>
    </div>
  </li>
  <li><a href="#news">Profile</a></li>
  <li><a href="#home">Home</a></li>
  
</ul>
<center>
<h2>Summary</h2>


<table class="tg" style="undefined;table-layout: fixed; width: 604px" border=1>
<tr><td rowspan="4"><img src="images/15MX13.jpg" width="140" height="140"/></td></tr>
<tr><td colspan="3">Name : <b> Hewitt V S </b></td></tr>
<tr><td colspan="3">Program : <b> Master of Computer Application </b></td></tr>
<tr><td colspan="3">Dept : <b> Dept of Computer Applications</b></td></tr>
  <tr>
    <th>Current Sem : 4</th>
    <th colspan="2">GPA:8.23<br></th>
    <th></th>
  </tr>
  <tr>
    <td colspan="2">Total CGPA : 8.11</td>
    <td></td>
    <td></td>
  </tr>
  
</table>
<p></p>
<p></p>
<p></p>
<p></p>
<br/>
<h3>Sem-wise GPA</h3>
<table border=1>
<tr>
    <td>Sem : I</td>
    <td>Sem : II</td>
    <td>Sem : III</td>
    <td>Sem : IV</td>
  </tr>
  <tr>
    <td>8.52</td>
    <td>8.23</td>
    <td>8.32</td>
    <td>8.69</td>
  </tr>
  </table>
</center>
</body>
</html>
