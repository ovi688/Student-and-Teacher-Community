		<footer>
		        
				   <small><p><?php echo date("Y", time());?> Copyright@ Kaimun Prince</p></small>
				   
				   <small><p>All right reserved</p></small>
				   
				   
				
        </footer>		
	  
	    
</body>
</html>

<?php
  // 5. Close database connection
  if(isset($connection)){
  
		mysqli_close($connection);
	
	}
?>