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
				header('login.php'); //if the user is not logged in, then redirect them to login
			}
			$id = $_GET['id'];
	?>


	<div class="site-wrap">
	<center><div id="result" ></div></center> <!-- This is where the messages are displayed -->
		<form method='post'>
			<center>
				<input autocomplete='off' name= "message" type='text' placeholder="Message" />
				<input type="submit" value="Send" name="submit">
			</center>


		</form>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script>
			var div = document.getElementById("result");
			div.scrollTop = div.scrollHeight;
			function autoRefresh_div(){
				$("#result").load("msgf.php?id=<?php echo $id; ?>");// a function which will load data from other file into div
			}
			setInterval('autoRefresh_div()', 500); //will call the above function every half function
		</script>

		<?php
			$my_id = $_SESSION['id'];
			$message = mysqli_real_escape_string($connect, $_POST['message']); //sql injection prevention
			if(isset($_POST['submit'])){
				$sql2 = "INSERT INTO `msgs` (`id`, `msgs`, `from`, `to`) VALUES (NULL, '$message', '$my_id', '$id')"; //puts the message into database
				if($query2 = mysqli_query($connect, $sql2)){
					echo "Success";

				}else {
					echo "Error 500:62";
				}
		}
		?>
		</div>
	</body>
</html>





