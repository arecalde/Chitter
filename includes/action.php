<html>
<head>
<?php 
	include 'functions.php'; //functions library and session start
	include 'connect.php'; //database link
?>
</head>
<body>

<?php

$act = $_GET['act']; //see what the user wants to accomplish
$id = $_GET['id']; //get the id of the person they wish to interact with
$my_id = $_SESSION['id'];
if($act == "addCntct"){
	$sql = "INSERT INTO `weplay`.`cntcs` (`id`, `one`, `two`) VALUES (NULL, '$my_id', '$id')"; //add a person to contacts
	$query= mysqli_query($connect, $sql);
	header('location: ../contact.php');
}

//more actions could be added in the future

?>
</body>
</html>

