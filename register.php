
<html>
	<head>
		<?php
			include 'includes/head.php'; //contains stylesheets that are needed for the page
		?>
	<style>
		ul li {
			list-style-type: none;
		}
		input {
			width: 49%;
			height: 50px;
		}
	</style>
	</head>
	<body>


		<?php include 'includes/nav.php';?>


	<div class="site-wrap">
		<center>
			<ul style='display:inline-block'>
				<li>
					<h3>Register</h3>
					<br />
					<form method="post">
						<input placeholder="First Name" type="text" name= "firstname" />
						<input placeholder="Last Name" type="text" name="lastname" /><br />
						<input placeholder="Username" type="text" name="username" />
						<input placeholder="Email" type="text" name="email" /><br />
						<input placeholder="Password" type="password" name="password" />
						<input placeholder="Confirm" type="password" name="repassword" /><br />
						<input id='button' type="submit" value="Register" name='submit'/>
					</form>
					Already Have An Account? Login <a href='login.php'>here</a>
				</li>
			</ul>
					<b><center style="align:center">
						<?php

						if (isset($_POST['submit'])){
							$fname = mysqli_real_escape_string($connect, $_POST['firstname']);
							$lname = mysqli_real_escape_string($connect, $_POST['lastname']);
							$fname[0] = strtoupper($fname[0]);
							$lname[0] = strtoupper($lname[0]);
							//make the first letters of the first and last name caps, for uniformity
							$username = mysqli_real_escape_string($connect, $_POST['username']);
							$email = mysqli_real_escape_string($connect, $_POST['email']);
							$password = md5($_POST['password']);
							$repassword = md5($_POST['repassword']);
							$nohash = $_POST['password']; //used to check for password length
							$email_code = sha1(md5($password)); //method for generating email code
							$usql = "SELECT * FROM users WHERE username='$username'"; //used to check if username is taken
							if($uquery= mysqli_query($connect, $usql)){
								if(mysqli_num_rows($uquery)==0){
									$ucheck = 1;
								}
								else {
									echo "Username Taken";
								}
							}

							$esql = "SELECT * FROM users WHERE email='$email'"; //used to see if email has already been taken
							if($equery= mysqli_query($connect, $esql)) //used to see if email has already been taken 
							{
								if(mysqli_num_rows($equery) == 0){
									$echeck = 1;
								}
								else {
									echo "Email Already In Use. Login <a href='login.php'>Here</a>";
									
								}
							}
							if($password == $repassword){ //making sure passwords match
								$pcheck = 1;
							}
							else {
								echo "Passwords Do Not Match";	
							}

							if (strlen($nohash) > 6){ //making sure passwords are a solid length
								$plcheck = 1;
							}
							else{
								echo "Passwords Need To Be More Than 6 Characters";
							}

							if (strlen($username) > 5 && strlen($username) < 25){ //making sure usernames are between 5-25 characters
								$ulcheck = 1;

							}
							else{
								echo "Usernames Need To Be Between 5 And 25 Characters";
							}

							for ($i = 0; $i < strlen($email); $i++){ //check to see if format of email is correct
								if($email[$i] == '@'){
									$elcheck =1;
								}
							}
							if (!$elcheck){
								echo "Use A Real Email";
							}


							if($pcheck == 1 && $echeck == 1 && $ucheck == 1 && $plcheck == 1 && $ulcheck == 1 && $elcheck == 1){

								$sql = "INSERT INTO `weplay`.`users` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `active`)".
									  " VALUES (NULL, '$fname', '$lname', '$username', '$password', '$email', '0');";
								if($query = mysqli_query($connect, $sql)){ //completes registration
									echo "Registration Successful. Check Your Email To Activate Your Account";
									$subject = "Account Activation";
									$mailheader = "From: EchoFactor \r\n";

									$formcontent = "
									Username: $username
									\n
									Password: $nohash
									\n
									Activation Link: http://echofactor.com/weplay/activate.php?email=".$email."&code=".$email_code."

									\n

									Welcome to We Play! We are pretty new, but we are always adding more, check back regularly.
									";
									mail($email, $subject, $formcontent, $mailheader) or die("Error!");

									header("Location: login.php"); //send mail and redirect to login if registration succesfully 
								}
								else {
									echo "Registration unsuccessful Error Code: 500-139";
								}

							}
							else {
								echo "Registration unsuccessful Error Code: 500-144";
							}


						}
						?>
					</center></b>
			</center>
		</div>
	</body>
</html>



