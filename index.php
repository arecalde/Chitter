<html>
<head>
	<?php
		include 'includes/head.php'; //contains stylesheets that are needed for the page
	?>

  		<style>
			input {
				width: 45%;
			}
			#result{
				height:80%;
				width: 100%;
				overflow:auto;
				overflow-x: hidden;
				border-width: 1px;
				border-style: solid;
			}
		</style>
</head>

<body>
	<?php
		include 'includes/nav.php'; //contains the nav bar, includes the database and functions library
		if(!loggedIn()){
			header('location: login.php'); //if the user is not logged in, then redirect them to login
		}
	?>


	<div class="site-wrap">
		<div id="result"></div> <!-- The Messages Will Be Loaded Into This Div-->
		<form method='post'>
			<center>
				<input autocomplete='off' name= 'message' type='text' placeholder='Message' /> <!-- This is how the user posts into chat -->
				<input type="submit" value"Send" name="submit">
			</center>
		</form>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>
			var div = document.getElementById("result");
			div.scrollTop = div.scrollHeight;
			function autoRefresh_div()
			{
			 $("#result").load("includes/chatf.php");// a function which will load data from this file into the result div
			}

			setInterval('autoRefresh_div()', 500); //every half a second execute above function
		</script>

		<?php
			$my_id = $_SESSION['id'];
			$message = mysqli_real_escape_string($connect, $_POST['message']); //prevent sql injection
			if(isset($_POST['submit'])){
				$sql2 = "INSERT INTO `chat` (`id`, `msgs`, `from`) VALUES (NULL, '$message', '$my_id')"; //insert msg into database
				if($query2 = mysqli_query($connect, $sql2)){//execute query
					echo "Success"; //indicate the message was sent successfully
				}
				else {
					echo "Query Failed Error 500:60";
				}
			}
		?>
	</div>
  
    <script src="js/index.js"></script>

</body>
</html>
