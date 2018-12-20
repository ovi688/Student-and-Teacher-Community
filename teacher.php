<?php


	// 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "education";
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  
  // Test if connection occurred.
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>teachers profile</title>
<link rel="stylesheet" type="text/css" href=" profiles.css" media="screen">
</head>

<body>
     <header>
	      <div id="banner">
                <p align="center" ><img src="education logo.png" alt="Student Education manager" height="240" width="300"> </p>
		    </div>
	 </header>
	 
	 
	 
	  <section>
	     <p>WELCOME:
		              <?php
	
	                      $i = $_GET['id'];
	                      $query = "SELECT username FROM login WHERE id = {$i}";
	                      $result = mysqli_query($connection, $query);
	
	                      while($name = mysqli_fetch_assoc($result)){
		                  echo " " . $name['username'];
	
	                         }
					   ?>
		 </p>
		 <p> DESIGNATION:
		               <?php
					   
				          $i = $_GET['id'];
					      $query =" SELECT designation FROM login WHERE id = {$i}" ;
						  $result = mysqli_query($connection, $query);
						  
						  while($designation = mysqli_fetch_assoc($result)){
						  
						  if($designation == 1) {
						    
							  echo "Student";
							  }
							  
					      else{
						  
						      echo "Teacher";
							  
							  }
							  
							 } 
						  
						  
					   ?>
		 </p>
		 
		          <form method="POST" action="">
                         <p>Semester
		                 <select name="semester">
							<option>1.1</option>
							<option>1.2</option>
							<option>2.1</option>
							<option>2.2</option>
							<option>3.1</option>
							<option>3.2</option>
							<option>4.1</option>
							<option>4.2</option>
							<option>5.1 (archi)</option>
							<option>5.2(archi)</option>
						</select>
						 </p>
						 
						
						 <p>Students mane :<input type="text" name="username" /></p>
						 <p> ID :<input type="text" name="username" /></p>
						 <p> :<input type="text" name="username" /></p>
						 <p>Username :<input type="text" name="username" /></p>
					     <p>Username :<input type="text" name="username" /></p>
						 
						  
		 
	  </section>
	  
	   
	 
	 	<?php
		
			include_once("footer.php");
		
		?>
</body>
</html>