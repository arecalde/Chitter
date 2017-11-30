<?php 
	include 'functions.php';
	include 'connect.php';
?>
<ul class="navigation">
	<li class="nav-item"><a href="index.php">Home</a></li>
	<?php if(loggedIn()){ //certain links should only be shown to people logged on?>
	<li class="nav-item"><a href="directory.php">Members Directory</a></li>
	<li class="nav-item"><a href="contact.php">Contacts</a></li>
	<li class="nav-item"><a href="logout.php">Logout</a></li>
	<?php } else { //other links should only be shown to people not logged on ?>
	<li class="nav-item"><a href="login.php">Login</a></li>
	<li class="nav-item"><a href="register.php">Register</a></li>
	<?php }?>
</ul>

<input type="checkbox" id="nav-trigger" class="nav-trigger" />
<label for="nav-trigger"></label>


