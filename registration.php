<?php
$ok='';
@include('database.php'); 
	if(isset($_POST['submit'])) {
	if(isset($_POST['namemain']) && isset($_POST['namemain']) && isset($_POST['name']) && $_POST['name']!='' && isset($_POST['email']) && $_POST['email']!='' && isset($_POST['pass']) && $_POST['pass']!=''){
		
		$username = trim($_POST['name']);
		$name = trim($_POST['namemain']);
		$email = trim($_POST['email']);
		$password = md5(trim($_POST['pass']));
		$department = $_POST['department'];
		$designation = $_POST['logintype'];
		
		$result = @mysql_query("SELECT * FROM login WHERE username='$username' OR email='$email'");
			if ( @mysql_num_rows($result) > 0 ) {
				$ok='Username or Email Exist<br>';
			}
			else {
				$query="INSERT INTO login VALUES ('','$username','$password','$email','$department','$designation','$name')";
				@mysql_query($query);
				$ok='Registrasion SuccessFull<br>';
			}
	
	}
	else {
	$ok='Something missing<br>';
	}
	}
?>













<!DOCTYPE html>
<html>
    <head>
	   <title>S&T Community</title>
	   <link rel="stylesheet" type="text/css" href="css/bar/bar.css"/>
	   <link rel="stylesheet" type="text/css" href="css/dark/dark.css"/>
	   <link rel="stylesheet" type="text/css" href="css/default/default.css"/>
	   <link rel="stylesheet" type="text/css" href="css/light/light.css"/>
	   <link rel="stylesheet" type="text/css" href="css/nivo-slider.css"/>
	    <link rel="stylesheet" type="text/css" href="registration.css"/>
		<link href='http://fonts.googleapis.com/css?family=Gudea' rel='stylesheet' type='text/css'>
		<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
	</head>
	
	<body>
	<div class="fix main">
	
	<div class="fix header">
	<img src="images/logo.jpg"/>
	</div>
	
	<div class="fix slider">
	<div class="slider-wrapper theme-default">
    <div class="nivoSlider" id="slider">
	<img src="images/banner.jpg" alt="" title="This Site is developed by Team Nexus"/>
	<img src="images/banner1.jpg" alt=""/>
	<img src="images/banner2.jpg" alt="" title="#htmlcaption"/>
	<img src="images/banner4.jpg" alt=""/>
	</div>
	
	<div class="nivo-html-caption" id="htmlcaption">
	<p>Our Facebook <a href="http://www.facebook.com/windows.lovers.msp">link</a></p>
	</div>
	
	</div>
	</div>
	
	<div class="fix maincontent">
	
	<div class="fix sidebar">
	<h2>Main Menu</h2>
	<ul>
<li><a href="project.php">Home</a></li>
	<li><a href="about.html">About</a></li>
	<li><a href="registration.php">Registration</a></li>
	<li><a href="service.html">Service</a></li>
	<li><a href="contact.html">Contact & Credit</a></li>
	</ul>
	</div>
	
	<div class="fix content">
	
	 <section>
		 
		   <div id="form">
		       <form method="POST" action="registration.php"> 
			         
					 <div id="title">
					   <p><h2>Registration form:</h2> </p>  
					 </div>  
							 <p><?php echo $ok; ?></p>
                             
                            <p>
							      <label>Name:</br>
								  <input type="text" id="name" name="namemain" maxlength="30" /></label></br>
								  
                                  <label>Username:</br>
								  <input type="text" id="name" name="name" maxlength="30" /></label></br>
							      <label>E-mail:</br>
								  <input type="email" id="email" name="email" /></label></br>
							      <label>Password:</br>
								  <input type="password" id="pass" name="pass" maxlength="20" ></label></br>
                            </p>
						
					  <fieldset>
					  <legend>Log-in-type</legend>
					         <p>
								<select name="logintype">
									<option value="1">Teacher</option>
									<option value="0">Student</option>
								</select>
					         </p>
					  </fieldset>
					  
					  <fieldset>
					  <legend>department</legend>
					         <p>
					            <select name="department">	
									<option value="EEE">EEE</option>
									<option value="CSE">CSE</option>
									<option value="CE">CE</option>
									<option value="Archi">Archi.</option>
									<option value="MPE">MPE</option>
									<option value="TE">TE</option>
									<option value="BBA">BBA</option>
								</select>
					         </p>
					  </fieldset>
					  
					  <p><input class="btn btn-success" type="submit" value="Sign up" name="submit"></p>
                      <p><input class="btn btn-danger"  type="reset" value="Reset" />
			   </form>
		     </div>
		 </section>
	
	
	</div>
	
	
	
	
	</div>
	
	
	
	<div class="fix footer">
	<p>&copy; Team Nexus, All Rights Reserved</p>
	</div>
	</div>
	<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
	<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
	
	
	</body>
	</html>
	   







































