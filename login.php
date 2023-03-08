<?php 
	if (isset($_GET['unParam']))
	{
		$tempUn = $_GET['unParam'];
		echo "<script type='text/javascript'>alert('Wrong username-password combination');</script>";							
	}
	else if(isset($_GET['regSucc']))
	{
		$tempUn = $_GET['regSucc'];

		echo "<script type='text/javascript'>alert('Registarion Successful!');</script>";
	}                                 //If the username-password combination is wrong, the user is redirected to the login page.
									  //By default, the values of the username-password textboxes get cleared when the user is redirected.


	else  						      // This method saves the username inserted in the respective textbox, so that the user will not	
	{								  // need to retype it if it was correct and only the password was wrong.
		$tempUn = '';
	}
	
?>

<html>
	<head>
		<title>tempname</title>
	</head>
	<body>
	<center><img src = "images/logo.png"></center>
		<center><h2>Log In</h2></center><br>
			<br>
			<br>
		
		<center><form action = "authentication.php" method = "post">
			<label> Username </label>
			<input type = "text" value = "<?php echo $tempUn;?>" name = "username" required><br>
			
			
			
			<label> Password </label>
			<input type = "password" name = "password" required><br>
			
			<button type = "submit"> Submit</button>
		</form></center>
		
		<center>Don't have an account yet?</center>
		<center><a href = "register.php">
			Click here to register.<br> <!-- converts this in clickable link format. If clicked, the user gets redirected to the register form.-->

		</a></center>
	<style>
		
		body
		{
			margin: 0;
			background: rgb(0,0,0);
			background: linear-gradient(0deg, rgba(0,0,0,1) 0%, rgba(24,93,152,1) 100%);
		}

	</style>		
	</body>
</html>