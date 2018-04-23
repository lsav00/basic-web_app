<?php
session_start();
if(!isset($_SESSION['username'])){
   header("Location:acctlogin1b.php");
}
?>

<HTML>
	<HEAD>
		<TITLE>LS LAW- Members</TITLE>
		<link rel="stylesheet" href="styles.css">
	</HEAD>
	<BODY>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="acctlogin1b.php">Login</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<h1>Members Page</h1>	

				
	</BODY>

</HTML>
