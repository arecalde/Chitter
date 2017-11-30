<?php 

include 'includes/connect.php'; //includes database
include 'includes/functions.php'; //includes function library and starts session
session_destroy(); //destroys session which destroys session variable
 header('location: login.php'); //redirect the user to the login page
?>
