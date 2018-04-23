


<html>
<head>
	<title>Register1</title>
	<link rel="stylesheet" href="styles.css">
	<script>


	function Validate() {

		var w = document.forms["accountcreate"]["username"].value;
			if (w == "") {
			alert("Please choose a username");
			return false;
			}
		var x = document.forms["accountcreate"]["fname"].value;
			if (x == "") {
				alert ("Please provide your First Name");
				return false;
			}
				
		var y = document.forms["accountcreate"]["lname"].value;
			if (y == "") {
				alert ("Please provide your Last Name");
				return false;
			}

		var p = document.forms["accountcreate"]["pass"].value;
			if (p == "") {
				alert ("Please provide your password");
				return false;
			}
			if (p.length < 8) {
				alert ("Password is not long enough");
				return false;
			}
			if (/[a-z]/.test(p)) {} else {
				alert ("Your password is missing a lowercase letter");
				return false;	
			}
			if (/[A-Z]/.test(p)) {} else {
				alert ("Your password is missing an uppercase letter");
				return false;	
			}
			if (/[0-9]/.test(p)) {} else {
				alert ("Your password is missing a number");
				return false;	
			}	
			if (/[^a-zA-Z0-9]$/.test(p)) {} else {
				alert ("Your password is missing a symbol");
				return false;
			}
	}

	</script>

</head>

<body>

	<ul>
		<li><a href="index.php">Home</a></li>
		<li><a href="https://10.0.17.61/acctlogin1b.php">Login</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	
	<h1>Register</h1>
	<p>Please fill out the form below. It must be completed in its entirety. </p>

							<!--THE FORM  -->

	<form action="" name = "accountcreate" method="POST" onsubmit="return Validate()"> 
		<p>
        		First Name:<input type="text" name="fname">
    		</p>
    		<p>
        		Last Name:<input type="text" name="lname" >
    		</p>
		<p>
        		Username:<input type="text" name="username" >
    		</p>
		<p>Passwords must be at least 8 characters long and contain a lowercase letter, an uppercase letter, a number and a symbol. </p>
    		<p>
        		Password:<input type="password" name="pass" >
    		</p>
		<input name = 'submit' type="submit" value="Create your account">
	</form>
							<!--END OF THE FORM -->

<?php

							//CREATE CONNECTION
$conn = new mysqli('localhost','lsav','abc123','users');

							//CREATE PREPARED STATEMENT TO PROTECT VS. INJECTION

$stmt = $conn->prepare("INSERT INTO people (username, fname, lname, pass) VALUES (?, ?, ?, ?)");	
$stmt->bind_param("ssss", $username, $fname, $lname, $hashPassword);


$username = $_POST['username'];				//ASSIGN POSTED VARIABLES TO $VARIABLES
$fname= $_POST['fname'];
$lname= $_POST['lname'];
$pass= $_POST['pass'];

$hashPassword = password_hash($pass,PASSWORD_BCRYPT); 	//ADD BCRYPT TO PASSWORD

$stmt->execute();					//EXECUTE THE PREPARED STATEMENT
$stmt->close();						//CLOSE THE PREPARED STATEMENT
$conn->close();						//CLOSE THE CONNECTION


							//REDIRECT TO ACCTLOGIN AFTER FORM SUBMITTED
if(isset($_POST['submit']))				//IF FORM'S POST IS SET...
	{			
	?>						<!--EXIT PHP...-->
	<script type="text/javascript">			//START JAVASCRIPT...
		window.location = "acctlogin1b.php";	//RELOCATE TO ACCTLOGIN...
	</script>					<!--EXIT JAVASCRIPT...-->
	<?php						//START PHP...
	}						//END IF STATEMENT
?>

</body>
</html>


