<?php
	
session_start();
	if(isset($_POST["username"]) and isset($_POST["pass"])) {
		$conn = new mysqli('localhost','lsav','abc123','users');
		$username = $_POST['username'];
		$pass = md5($_POST['pass']);
		$query = "SELECT * FROM `people` WHERE username= '$username' and pass= '$pass'";
		$result = mysqli_query($conn,$query);
		$count = mysqli_num_rows($result);
		if ($count == 1){
			$_SESSION['username'] = $username;
			echo "Hi " . $username . ". ";
			header ("Location: members.php");
		} else { echo "Invalid login credentials."; }
	}

	mysqli_close($conn);
   		 
	
?>


<HTML>
	<HEAD>
		<TITLE>LS LAW- Login</TITLE>
		<link rel="stylesheet" href="styles.css">
	</HEAD>
	<BODY>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="acctlogin1a.php">Login</a></li>
		</ul>
		<h1>Account Login</h1>	

			<form action="acctlogin1a.php" method="post" >
			<label>Username :</label>
			<input type="text" name="username" />
			<label>Password :</label>
			<input type="password" name="pass" />
			<input type="submit" value="Log in" name="submit" />
			</form>


		<a href="register3a.php">Create Account</a>		
	</BODY>

</HTML>
