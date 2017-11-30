<html>
	<head>
		<?php
			include 'includes/head.php'; //contains stylesheets that are needed for the page
		?>

	</head>
	<body>
		<?php
			include 'includes/nav.php'; //contains the nav bar, includes the database and functions library
			if(!loggedIn()){
				header('login.php'); //if the user is not logged in, then redirect them to login
			}
		?>


	<div class="site-wrap">


		<?php

			$sql = "SELECT * FROM users ORDER BY lastname ASC"; //order all users alphabetically A-Z
			$a = 0;
			$firstnames = array();
			$lastnames = array();
			$ids = array();
			
			if($query = mysqli_query($connect, $sql)){
				while($run = mysqli_fetch_assoc($query)){
					$firstnames[$a] = $run['firstname'];
					$lastnames[$a] = $run['lastname'];
					$ids[$a] = $run['id'];
					$a++;
				}
				$b = 0;
				while( $b <= $a ){
					if(strtoupper($lastnames[$b - 1][0]) != strtoupper($lastnames[$b][0])) 
					//if the first char of the last one and the first char of the current one are not the same,
					//print out the char, this makes it so that last names that start with A will be under the A
					{
						echo strtoupper($lastnames[$b][0])."<br />";
			
					}
					include 'popUpScript.php';
					//this script gives each person their own unique popup that will contain the option to add them as a contact, additional features could be added
					//in the future, the id is used to assure that each function is unique and each popup is unique
					$b++;
				}

			}
		?>

		</div>
	</body>
</html>





