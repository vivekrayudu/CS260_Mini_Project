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
	<h2>Student Registration Form</h2>
	<form method="post" action="register.php">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" required><br>

		<label for="age">Age:</label>
		<input type="number" id="age" name="age" required><br>

		<label for="marks_10">Marks in Class 10:</label>
		<input type="number" id="marks_10" name="marks_10" required><br>

		<label for="marks_12">Marks in Class 12:</label>
		<input type="number" id="marks_12" name="marks_12" required><br>

		<label for="marks_sem1">Marks in Semester 1:</label>
		<input type="number" id="marks_sem1" name="marks_sem1" required><br>

		<label for="marks_sem2">Marks in Semester 2:</label>
		<input type="number" id="marks_sem2" name="marks_sem2" required><br>

		<label for="marks_sem3">Marks in Semester 3:</label>
		<input type="number" id="marks_sem3" name="marks_sem3" required><br>

		<label for="marks_sem4">Marks in Semester 4:</label>
		<input type="number" id="marks_sem4" name="marks_sem4" required><br>

		<label for="marks_sem5">Marks in Semester 5:</label>
		<input type="number" id="marks_sem5" name="marks_sem5" required><br>

		<label for="marks_sem6">Marks in Semester 6:</label>
		<input type="number" id="marks_sem6" name="marks_sem6" required><br>

		<label for="specialization">Specialization:</label>
		<input type="text" id="specialization" name="specialization" required><br>

		<label for="area_of_interest">Area of Interest:</label>
		<input type="text" id="area_of_interest" name="area_of_interest" required><br>

		<label for="batch_year">Batch Year:</label>
		<input type="number" id="batch_year" name="batch_year" required><br>

		<label for="is_placed">Placed in a Company:</label>
		<select id="is_placed" name="is_placed" required>
			<option value="1">Yes</option>
			<option value="0">No</option>
		</select><br>

		<label for="placement_package">Placement Package:</label>
		<input type="number" id="placement_package" name="placement_package"><br>

		<input type="submit" value="Submit">
	</form>
</body>
</html>

