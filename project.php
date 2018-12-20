<!DOCTYPE html>
<html>
    <head>
	   <title>S&T Community</title>
	   <link rel="stylesheet" type="text/css" href="css/bar/bar.css"/>
	   <link rel="stylesheet" type="text/css" href="css/dark/dark.css"/>
	   <link rel="stylesheet" type="text/css" href="css/default/default.css"/>
	   <link rel="stylesheet" type="text/css" href="css/light/light.css"/>
	   <link rel="stylesheet" type="text/css" href="css/nivo-slider.css"/>
	    <link rel="stylesheet" type="text/css" href="project.css"/>
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
	<p>Our Facebook <a href="http://www.facebook.com/batista.production">link</a></p>
	</div>
	
	</div>
	</div>
	
	<div class="fix maincontent">
	
	<div class="fix sidebar">
	<h2>Main Menu</h2>
	<ul>
	<li><a href="">Home</a></li>
	<li><a href="about.html">About</a></li>
	<li><a href="registration.php">Registration</a></li>
	<li><a href="service.html">Service</a></li>
	<li><a href="contact.html">Contact & Credit</a></li>
	</ul>
	</div>
	
	<div class="fix content">
	<h2>Improving Students Relationships with Teachers</h2>
	<p>Improving students' relationships with teachers has important, positive and long-lasting implications for students' academic and social development. Solely improving students' relationships with their teachers will not produce gains in achievement.<p>However, those students who have close, positive and supportive relationships with their teachers will attain higher levels of achievement than those students with more conflictual relationships.Show more engagement in the academic content presented, display better classroom behavior, and achieve at higher levels academically. Positive teacher-student relationships draw students into the process of learning and promote their desire to learn</p> </p>
	</div>
	</div>
	
	<section> 
         
              <div id="login">
			      <div id="title1"><p align="center"><b>Login with your Student or Teacher ID</b><p></div>
				  
				  
			       <fieldset>
					<form method="POST" action="admin-panel/login.php?action=login">
					
						<p>Username :<input type="text" name="username" /></p>
						<p>Password :<input type="password" name="password" /></p>
						<input type="submit" value="Login" name="submit" class="btn btn-primary" /> 
						
					</form>
				   </fieldset>

           
				   
              </div>			  
	
	   
	   
	             
			<div id="student">
			     <div id="title2"><p align="center"><b>Students</b><p></div>
				<figure>
				    <img src="student.jpg" alt= "image not found" height="150px" width="200px">
				 </figure>
				 
				 
			     <div id="description">
				<p style="margin-top: 50px">
					 This management system is very helpful for the students. They can log in to check their result and class routine.
					 They can directly communicate with the teachers and get assignments through this education system
				 </p>
				 
				  </div>
			</div>	 
			
			<div id="teacher">	 
			
				 <div id="title3"><p align="center"><b>Teachers</b><p></div>
				 <figure>
				      <img src="teacher.jpg" alt= "image not found" height="150px" width="200px">
				 </figure>
				 
				 <p style="margin-top: 50px">
						      Teachers can upload assignments and update results.They can communicate with the students through this system.
							  This system is ideal for the teachers because they can keep all the records of the students.
				</p>
			
			</div>	
			
		 </section>
	
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
	   