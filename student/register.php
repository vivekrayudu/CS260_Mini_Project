<?php
include 'config.php';

if (isset($_POST['submit'])) {
	//Save all values given in respective variables 
	
	$name = $_POST['name'];$rollno = $_POST['rollno'];$age = $_POST['age'];$batch_year = $_POST['batch_year'];
	$dept = $_POST['dept'];  $marks_10 = $_POST['marks_10']; $marks_12 = $_POST['marks_12'];
	$cpi = $_POST['cpi']; $specialization = $_POST['specialization'];
	$area_of_interest = $_POST['area_of_interest'];
	$is_placed = $_POST['is_placed'];$placement_package = $_POST['placement_package']; $email = $_POST['email'];

// 	$filename = $_FILES['resume']['name'];
// $tempFilePath = $_FILES['resume']['tmp_name'];

// // Read the file contents
// $resumeData = addslashes(file_get_contents($tempFilePath));
	
	$pwd1 = $_POST['pwd1'];
	$pwd2 = $_POST['pwd2'];
	

	//If password does not match confirm password then throw error 
	if ($pwd1 != $pwd2) {
		echo "<script>alert('Passwords do not match.')</script>";
	} else {
		//Check if user with the same employee id already exists
		$query = "SELECT * FROM student where rollno='$rollno' ";
		$result = mysqli_query($conn, $query);
		if (mysqli_num_rows($result) > 0) {
			echo "<script>alert('User already registered. Please login.')</script>";
		} else {
			//Insert new employee entry into database 
			$query = "INSERT INTO student ( name,rollno,age,batch_year,dept,marks_10,marks_12,cpi,specialization,area_of_interest,is_placed,placement_package,email,pwd1) 
				VALUES ('$name','$rollno','$age','$batch_year','$dept','$marks_10','$marks_12','$cpi','$specialization','$area_of_interest','$is_placed','$placement_package','$email','$pwd1')";

			$result = mysqli_query($conn, $query);
			//If insertion is successful, then redirect to login page else throw error 
			if ($result) {
				echo "<script>alert('User registerd!')</script>";
				header("Location: index.php");
			} else {
				echo "<script>alert('Something went wrong!')</script>";
			}
		}
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
			margin-right: 10px;
		}

		input[type="number"] {
			display: block;
			width: 50%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-bottom: auto;
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
			margin-top: 20px;
		}

		input[type="submit"]:hover {
			background-color: #BFEFFF;
			color: #444;
			transform: scale(1.1);	
		}
		#is_placed {
		    font-size: 16px;
		    padding: 5px;
		    border-radius: 5px;
		    border: 1px solid gray;
		    width: 100%;
		}
		  /* style for the "No" option */
		#is_placed option[value="0"] {
		    color: red;
		    font-weight: bold;
		}
		  /* style for the "Yes" option */
		#is_placed option[value="1"] {
		    color: green;
		    font-weight: bold;
		}
		#placement_package {
 			margin: 0 auto;
 			display: block;
		}

	</style>
</head>

<body>
	<form method="post" action="register.php">
		<h1>Student Registration Form</h1>
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" placeholder="Your Name" required><br>

		<label for="rollno">RollNo:</label>
		<input type="text" id="rollno" name="rollno" placeholder="Your RollNo" required><br>

		

		<div class="label-container">
			<label for="age">Age:</label>
			<input type="number" id="age" name="age" placeholder="Your Age" required>

			<label for="batch_year">Batch Year:</label>
			<input type="number" id="batch_year" name="batch_year" placeholder="Batch Year" required>
		</div>

		<label for="dept">Department:</label>
		<input type="text" id="dept" name="dept" placeholder="Your Department" required><br>

		<div class="label-container">
			<label for="marks_10">Marks in Class 10:</label>
			<input type="number" id="marks_10" name="marks_10" placeholder="Class 10 Marks" required><br>



			<label for="marks_12">Marks in Class 12:</label>
			<input type="number" id="marks_12" name="marks_12" placeholder="Class 12 marks" required><br>
		</div>
		

		<label for="cpi">Your Current CPI:</label>
		<input type="text" id="cpi" name="cpi"  placeholder="Your current CPI" required><br>

		<label for="specialization">Specialization:</label>
		<input type="text" id="specialization" name="specialization" placeholder="Specialization" required><br>

		<label for="area_of_interest">Area of Interest:</label>
		<input type="text" id="area_of_interest" name="area_of_interest" placeholder="Area of Interest" required><br>

		<label for="is_placed">Placed in a Company:</label>
		<select id="is_placed" name="is_placed" required onchange="togglePlacementPackage()">
			<option value=" " selected disabled>Select</option>
			<option value="1">Yes</option>
			<option value="0">No</option>
		</select><br></br><br>

		<div id="placement-package-container" style="display: none;">
			<label for="placement_package">Placement Package:</label>
			<input type="number" id="placement_package" name="placement_package" placeholder="Placement Package"><br>
		</div>

		<label for="email"><h3>WebMail:</h3></label>
		<input type="email" id="email" name="email" placeholder="Enter your webmail" required>

		<label for="pwd1"><h3>Password:</h3></label>
		<input type="password" id="pwd1" name="pwd1" placeholder="Password" required>

		<label for="pwd2"><h3>Confirm Password:</h3></label>
		<input type="password" id="pwd2" name="pwd2" placeholder="Confirm Password" required>

		<input type="submit" id="submit" name="submit" value="Register">

		<br><br>Already a user? <a href="index.php" class="button">Login</a> 
	</form>

	<script>
		function togglePlacementPackage() {
			var isPlaced = document.getElementById("is_placed").value;
			var placementPackageContainer = document.getElementById("placement-package-container");

			if (isPlaced == 1) {
				placementPackageContainer.style.display = "block";
			} else {
				placementPackageContainer.style.display = "none";
			}
		}
	</script>
</body>
	
	<style>
		.label-container {
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: space-between;
			margin-bottom: 10px;
		}

		.label-container label {
			margin-right: 10px;
		}
	</style>
</body>

</html>

