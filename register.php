<?php

if(isset($_GET['errorMsg']))
{
	echo "<script type='text/javascript'>alert('". $_GET['errorMsg']. "');</script>";

}

?>

<html>
	<head>
		<title>tempname</title>
	</head>
	<body>
	<center><img src = "images/logo.png"></center>
		<center><h2>Register</h2></center><br>
			<br>
			<br>
		
		<center><form action = "registration.php" method = "post"> 
			<label> Username </label>
			<input type = "text" name = "username" required><br>						
			
			<label> Password </label>
			<input type = "password" name = "password" required><br>

			<label> Confirm Password </label>
			<input type = "password" name = "repassword" required><br>
			
			<button type = "submit"> Submit</button>
		</form></center>
		
		<center>Already have an account?</center>
		<center><a href = "login.php">
			Click here to log in.<br> <!-- converts this in clickable link format. If clicked, the user gets redirected to the login form.-->
			


		<style>
		
			body
			{
				margin: 0;
				background: rgb(0,0,0);
				background: linear-gradient(180deg, rgba(0,0,0,1) 0%, rgba(24,93,152,1) 100%);
			}

		</style>

	</body>


	
</html>