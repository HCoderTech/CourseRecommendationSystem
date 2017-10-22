<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Course Recommendation System</title>
  
  <link rel="stylesheet" href="style/reset.css">

  <link rel='stylesheet prefetch' href='style/font.css'>

  <link rel="stylesheet" href="style/style.css">

  
</head>
<script>
<?php if($_GET['result']=="fail"){?>
	window.alert("Wrong Username/Password combination");
<?php }
?>
</script>
<body>

<div class="pen-title">
  <h1>Course Recommendation System</h1>
</div>
<!-- Form Module-->
<div class="module form-module">
  <div class="toggle">
  
  </div>
  <div class="form">
    <h2>Password Recovery</h2>
    <form action="checkPassword" method="post">
      <input type="text" placeholder="Email ID" name="emailid" required/>
      
      <button>Recover</button>
    </form>
  </div>
  
  <div class="cta"><a href="http://localhost/MiniProject/">Go Back</a></div>
</div>
<script src='JS/jquery.js'></script>


    <script src="js/index.js"></script>

</body>
</html>