

<html>
<head>
	<?php include 'includes/head.php'; ?>
</head>
<body>


<?php
		include 'includes/nav.php';
		if(loggedIn()){
			header('index.php'); //only users not yet logged in should see this page	
		}
	?>


<div class="site-wrap">
	<center>
		<?php
			if (!$_GET['email'] && !$_GET['code']){
				header("Location: index.php"); //if a user reaches this page in error, then redirect them
			}

			$email = $_GET['email'];
			$code = $_GET['code'];

			$sql = "SELECT * FROM users WHERE email='$email'";//find the email that the user originated from
			$query = mysqli_query($connect, $sql);
			$get = mysqli_fetch_assoc($query);
			$check = $get['password'];
			$id = $get['id'];
			if($code == sha1(md5($check))) //method used for generating email code
			{
				$sql2 = "UPDATE `weplay`.`users` SET `active` = '1' WHERE `users`.`id` = '$id'"; //mark the user as active
				if ($query2 = mysqli_query($connect, $sql2)){
					echo "<h1>Account Activated</h1><br /><a href='login.php'>Click To Login</a>"; //invite the user to login
				}
			}
		?>
	</center>
</div>

</body>
</html>




