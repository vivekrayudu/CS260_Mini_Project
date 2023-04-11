<?php

require 'config.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Placement Portal</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		
		header {
			display: flex;
			align-items: center;
			background-color: #444;
			height: 70px;
			color: #fff;
			padding: 0 30px;
		}
        header {
            display: flex;
            align-items: center;
            justify-content: center; /* center align the content horizontally */
            background-color: blueviolet;
            height: 70px;
            color: #fff;
            padding: 0 30px;
        }

		
		h1 {
			font-size: 28px;
			margin: 0;
			padding: 0;
		}
		
		nav {
			display: flex;
			flex-direction: column;
			align-items: center;
			background-color: #f2f2f2;
			padding: 20px;
		}
		
		
        nav a {
            display: inline-block;
            font-size: 18px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
            margin-bottom: 70px; /* add margin between the buttons */
        }

		
		nav a:hover {
			color: #fff;
			background-color: blueviolet;
			cursor: pointer;
			transform: scale(1.5);
		}
		
		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 40px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			border-radius: 5px;
			text-align: center;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}
	</style>
</head>
<body>
	<header>
		<h1>IITP Placement Portal</h1>
	</header>
	<nav>
		<a href="student/index.php" class="button">Student</a>  
		<a href="alumni/index.php" class="button">Alumni</a>
		<a href="companies/index.php" class="button">Companies</a>
	</nav>
	<div class="container">
		<h2>Welcome to the Placement Portal</h2>
		<p>This is a platform where students, alumni, and companies can connect for job opportunities.</p>
	</div>
</body>
</html>
