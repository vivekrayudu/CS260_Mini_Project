<?php
require 'config.php';
if (isset($_POST['submit'])) {
	$empid = $_POST['email'];
	$pwd1 = $_POST['password'];
	
	// select query to check if profile exists 
	$query = "SELECT * FROM student WHERE email='$empid' and pwd1='$pwd1'";
	$result = mysqli_query($conn, $query);
	
	//If there exists a row with the given credentials, then redirect to respective profile page otherwise stay on same page by alert 
	if (mysqli_num_rows($result) != 0) {
		session_start();
		$_SESSION['sess_user'] = $empid;
		header("Location: profile.php");
	} else {
		echo "<script>alert('Invalid email or password.')</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Login and Registration Form</title>
	<style>
		form {
			max-width: 500px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			border-radius: 5px;
			text-align: center;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}

		input[type="text"], input[type="email"], input[type="password"] {
			display: block;
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-bottom: 10px;
		}

		input[type="submit"] {
			background-color: blueviolet;
			color: #fff;
			border: none;
			border-radius: 5px;
			padding: 10px;
			font-size: 18px;
			font-weight: bold;
			cursor: pointer;
			transition: all 0.3s ease-in-out;
		}

		input[type="submit"]:hover {
			background-color: #BFEFFF;
			color: #444;
			transform: scale(1.1);
		}
	</style>
</head>
<body>
	<form action="#" method="POST">
		<h1>Student Login</h1>
		<label for="email"><h3>WebMail:</h3></label>
		<input type="email" id="email" name="email" required>

		<label for="password"><h3>Password:</h3></label>
		<input type="password" id="password" name="password" required>

		<input type="submit" id="submit" name="submit" value="Login">
		No credentials yet? <a href="register.php">Register</a>
	</form>

	
</body>
</html>
