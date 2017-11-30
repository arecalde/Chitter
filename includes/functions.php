<?php 
session_start();
function loggedIn() {

		return (isset($_SESSION['id']) OR ($_COOKIE['id'])); //if the user has a cookie set or a sesion id set then they are considered logged in
}
function getField($link, $id, $field){ //gets indicated field from database based on the given id
	$sql = "SELECT * FROM users WHERE id=$id";
	$query = mysqli_query($link, $sql);
	$run = mysqli_fetch_assoc($query);
	$result = $run[$field];
	return $result;
}
	?>
