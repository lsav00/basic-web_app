
<HTML>
	<HEAD>
		<TITLE>LS LAW- Login</TITLE>
		<link rel="stylesheet" href="styles.css">
		
		
	</HEAD>
	<BODY>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="acctlogin1b.php">Login</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		<h1>Account Login</h1>						<!--THE FORM-->

			<form method="post" >
			<label>Username :</label>
			<input type="text" name="username" id="username"/>
			<label>Password :</label>
			<input type="password" name="pass" id="pass" />
			<input type="submit" value="Log in" name="submit" id="submit" />
			</form>
										<!--END OF THE FORM-->

		<a href="register3a.php">Create Account</a>			<!--CREATE ACCOUNT LINK-->
	</BODY>

</HTML>										<!--END OF HTML-->

<?php
session_start();
if(isset($_POST["username"]) and isset($_POST["pass"])) {		//IF USERNAME & PASSWORD POSTED...
	$conn = new mysqli('localhost','lsav','abc123','users');	//CREATE A NEW CONNECTION
	$username = $_POST['username'];					//ASSIGN POSTED USERNAME TO $USERNAME
	$pass = $_POST['pass'];						//ASSIGN POSTED PASSWORD TO $PASS
	$query = "SELECT * FROM `people` WHERE username= '$username'";	//ASSIGN SELECTED USERNAME TO $QUERY
	$result = mysqli_query($conn,$query);				//ASSIGN THE QUERY TO $RESULT
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);		//ASSIGN $RESULT'S FETCHED ARRAY TO $ROW AND...
	if(password_verify($pass, $row['pass'])){			//IF PASSWORD VERIFY ($PASS AND $ROW) IS TRUE...
		$_SESSION['username'] = $username;			//CREATE A 'USERNAME' SESSION AND...
		header ("Location: members.php");			//AND RELOCATE TO MEMBERS.PHP...	
	}
 	else {
		echo "\nInvalid credentials";
		?>
		<script>
		//document.getElementById("username").disabled = true;
		//document.getElementById("pass").disabled = true;
		//document.getElementById("submit").disabled = true;
		</script>
		<?php
		}
}

mysqli_close($conn);
   		 
	
?>
