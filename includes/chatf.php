<?php

include 'connect.php'; //load database from file
include 'functions.php'; //functions library and session start
$my_id = $_SESSION['id'];

$sql = "SELECT * FROM chat ORDER BY id DESC"; //gets the messages based on the order they were inserted into the database
$a = 0;
if ($query = mysqli_query($connect, $sql)){
	while($run = mysqli_fetch_assoc($query)){
		$a++;
		$msg = $run['msgs'];
		$from = $run['from'];
		$fname = getField($connect, $from, "firstname");
		$lname = getField($connect, $from, "lastname");
		$name = $fname." ".$lname;
		$color;
		if ($a % 2 == 0) {
			$color = "white";
		}
		else{
			$color = "#e0e0eb";
		} //color alternates each msg
		if($from != $my_id){
			echo "<div class='col-md-12' style='border-style: solid; border-width: 1px, 0px, 0px 0px;  background-color: $color; font-size: 24px; text-align: 'left' '>
					<div class='col-md-6' style=''>
						<b>".$name."</b>: ".$msg."
					</div>
					<div class='col-md-6'></div>
				</div>"; //formatted in a way that will put it on the left
		}
		else {
			echo "<div class='col-md-12' style='border-style: solid; border-width: 1px, 0px, 0px 0px;  background-color: $color; font-size: 24px; text-align: 'left' '>
					<div class='col-md-6'></div>
					<div class='col-md-6' style=''>
						<b>".$name."</b>: ".$msg."
					</div>
				</div>"; //formatted in a way that will put it on the right
		}
	}
}
else {
	echo "Query Failed";
} //*/
?>
