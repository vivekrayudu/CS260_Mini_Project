<?php
include 'config.php';
session_start();

//If there is no session user, then redirect to login page 
if (!isset($_SESSION['sess_user'])) {
	header("location: index.php");
}

//Find various fields for an employee and save them in variables for display purposes 
$empid = $_SESSION['sess_user'];

// Fetch all student details
$query = "SELECT * FROM student WHERE email='$empid'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['logout'])) {
    // Clear all session variables
    session_unset();
    
    // Destroy the session
    session_destroy();
    
    // Redirect to the login page or homepage
    header('Location: index.php');
    exit;
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Dashboard</title>
	<style>
		body {
			font-family: Arial, Helvetica, sans-serif;
			margin: 0;
			padding: 0;
		}

		.header {
			background-color: blueviolet;
			color: #fff;
			padding: 10px;
			text-align: center;
			font-size: 15px;
		}

		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: center;
			padding: 20px;
		}

		.card {
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
			border-radius: 5px;
			margin: 10px;
			flex-basis: 300px;
			padding: 20px;
		}

		h2 {
			font-size: 20px;
			margin-bottom: 10px;
		}

		p {
			font-size: 16px;
			line-height: 1.5;
			margin-bottom: 20px;
		}

		a {
			background-color: blueviolet;
			color: #fff;
			border: none;
			border-radius: 5px;
			padding: 10px;
			font-size: 18px;
			font-weight: bold;
			cursor: pointer;
			text-align: center;
			display: block;
			width: 90%;
			margin-top: 20px;
			transition: all 0.3s ease-in-out;
		}

		a:hover {
			background-color: #BFEFFF;
			color: #444;
			transform: scale(1.1);
			text-decoration: none;
		}

		.logout {
			position: absolute;
			top: 20px;
			right: 20px;
		}

		.logout a {
			background-color: #f44336;
			margin-top: 0;
			margin-right: 0;
			padding: 5px 10px;
			font-size: 14px;
			border-radius: 3px;
			display: inline-block;
		}
        ul {
			list-style-type: none;
			padding-left: 0;
			margin-bottom: 20px;
		}

		li {
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<div class="header">
		<h1>Student Dashboard</h1>
		<div class="logout" name="logout"><a href="index.php">Logout</a></div>
	</div>

	<div class="container">
		<div class="card">
        <h2>Personal Information</h2>
	        <ul>
	        	<li><strong>Name:</strong> <?php echo $row['name']; ?></li>
	        	<li><strong>Email:</strong> <?php echo $row['email']; ?></li>
	        	<li><strong>Roll No:</strong> <?php echo $row['rollno']; ?></li>
	        	<li><strong>Age:</strong> <?php echo $row['age']; ?></li>
	        </ul>
            <br><br><br><br>
            
			<a href="#">Edit</a>
		</div>

		<div class="card">
            <h2>Academic Information</h2>
	            <ul>
	            	<li><strong>Batch Year:</strong> <?php echo $row['batch_year']; ?></li>
	            	<li><strong>Department:</strong> <?php echo $row['dept']; ?></li>
	            	<li><strong>Specialization:</strong> <?php echo $row['specialization']; ?></li>
	            	<li><strong>Area of Interest:</strong> <?php echo $row['area_of_interest']; ?></li>
	            	<li><strong>10th Marks:</strong> <?php echo $row['marks_10']; ?></li>
	            	<li><strong>12th Marks:</strong> <?php echo $row['marks_12']; ?></li>
	            	<li><strong>CPI:</strong> <?php echo $row['cpi']; ?></li>
	            </ul>
			<a href="#">Edit</a>
		</div>

		<div class="card">
            <h2>Companies</h2>
            <?php if ($row['is_placed'] == '1'): ?>
                <ul>
                    <li><strong>Is Placed:</strong> Yes</li>
                    <li><strong>Placement Package:</strong> <?php echo $row['placement_package']; ?></li>
                </ul><br><br><br><br><br><br><br>
                <a href="eligible.php">ELigible Companies</a>
            <?php else: ?>
                <p>You are not placed yet.</p>
                <br><br><br><br><br><br><br><br>
                <a href="eligible.php">Eligible Companies</a>
            <?php endif; ?>
        </div>

	</div>

</body>
</html>











	