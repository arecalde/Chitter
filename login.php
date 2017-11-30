<!DOCTYPE html>
<html >
<head>
	<?php
		include 'includes/head.php'; //contains stylesheets that are needed for the page
	?>

	<style>
		
		ul li {
			list-style-type: none;
		}
		input {
			width: 100%;
			height: 50px;
		}
	</style>
</head>

<body>
	<?php 
		include 'includes/nav.php'; //contains the nav bar, includes the database and functions library
	?>

<div class="site-wrap">
	<center>



		<ul style='display:inline-block'>
	<li>
		<h3>Login To Your Account</h3>
		<br />
		<form method="post" >
			<input placeholder="Email" type="text" name= "email" /><br />
			<input placeholder="Password" autocomplete="off" type="password" name="password"><br />
			<input id='button' type="submit" value="Login" name='submit'/>
		</form>
		Don't Have An Account? Register<a href='register.php'> here</a>
	</li>

	<center>
	<b>
	<?php
		if(isset($_POST['submit'])){
			$email = mysqli_real_escape_string($connect, $_POST['email']); //eliminate the need for sql injection
			$password = md5($_POST['password']);
			$sql= "SELECT * FROM users WHERE email='$email'"; //see if the email is in the system
			$sql2= "SELECT * FROM users WHERE email='$email' AND password='$password'"; //see if the email and the password match up

			if($query= mysqli_query($connect, $sql)){
				if(mysqli_num_rows($query) == 1){ //run code if email is found
					if($query2= mysqli_query($connect, $sql2)){
						if(mysqli_num_rows($query2) == 1){ //run code if email and password are found
							$get = mysqli_fetch_assoc($query);

							if($get['active'] == 1){ //check to see if user has activated their account
								$_SESSION['id']= $get['id']; //officially logs user in			
			 					header('location: index.php'); //redirects to the index

							}
							else{
								echo "Check your email to activate your account.";
								}
						}
						else {
							echo "Password Incorrect";
						}
					}
					else{
						echo "Error";
						}
				}
				else{
				echo "Email Not Found";
			}
			}
			else{
				echo "Login Failed Error Code: 500";
			}
		}
	?>
	</b>
	</center>

	</center>
</div>
  
    <script src="js/index.js"></script>

</body>
</html>
