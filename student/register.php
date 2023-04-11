<?php
require 'config.php';
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
		<input type="text" id="name" name="name" required><br>

		<label for="rollno">RollNo:</label>
		<input type="text" id="rollno" name="rollno" required><br>

		<div class="label-container">
			<label for="age">Age:</label>
			<input type="number" id="age" name="age" required>

			<label for="batch_year">Batch Year:</label>
			<input type="number" id="batch_year" name="batch_year" required>
		</div>

		<div class="label-container">
			<label for="marks_10">Marks in Class 10:</label>
			<input type="number" id="marks_10" name="marks_10" required><br>



			<label for="marks_12">Marks in Class 12:</label>
			<input type="number" id="marks_12" name="marks_12" required><br>
		</div>
		

		<label for="cpi">Your Current CPI:</label>
		<input type="text" id="cpi" name="cpi" required><br>

		<label for="specialization">Specialization:</label>
		<input type="text" id="specialization" name="specialization" required><br>

		<label for="area_of_interest">Area of Interest:</label>
		<input type="text" id="area_of_interest" name="area_of_interest" required><br>

		<label for="is_placed">Placed in a Company:</label>
		<select id="is_placed" name="is_placed" required onchange="togglePlacementPackage()">
			<option value=" " selected disabled>Select</option>
			<option value="1">Yes</option>
			<option value="0">No</option>
		</select><br></br><br>

		<div id="placement-package-container" style="display: none;">
			<label for="placement_package">Placement Package:</label>
			<input type="number" id="placement_package" name="placement_package"><br>
		</div>

		<input type="submit" value="Submit">
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

