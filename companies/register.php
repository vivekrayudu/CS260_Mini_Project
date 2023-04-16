<?php
// Connect to database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "miniproject";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $min_qualification = $_POST["min_qualification"];
    $min_marks = $_POST["min_marks"];
    $salary_package = $_POST["salary_package"];
    $interview_mode = $_POST["interview_mode"];
    $recruiting_since = $_POST["recruiting_since"];

    // Insert data into database
    $sql = "INSERT INTO company (name, email, password, min_qualification, min_marks, salary_package, interview_mode, recruiting_since) VALUES ('$name', '$email', '$password', '$min_qualification', '$min_marks', '$salary_package', '$interview_mode', '$recruiting_since')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Company Registration</title>
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

		input[type="text"], input[type="email"], input[type="password"] ,input[type="number"]{
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
            width: 100%;
		}

		input[type="submit"]:hover {
			background-color: #BFEFFF;
			color: #444;
			transform: scale(1.1);
		}
		h1 {
			background-color: blueviolet;
			color: #fff;
			padding: 10px;
			text-align: center;
			font-size: 40px;
		}
	</style>
</head>
<body>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <h1>Company Registration</h1>
        <label>Name:</label>
        <input type="text" name="name" required><br>

        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Password:</label>
        <input type="password" name="password" required><br>

        <label>Minimum Qualification:</label>
        <input type="text" name="min_qualification" required><br>

        <label>Minimum Marks:</label>
        <input type="number" name="min_marks" required><br>

        <label>Salary Package:</label>
        <input type="number" name="salary_package" required><br>

        <label>Interview Mode:</label>
        <select name="interview_mode" required>
            <option value="Online/Written">Online/Written</option>
            <option value="Online/Interview">Online/Interview</option>
            <option value="Offline/Written">Offline/Written</option>
            <option value="Offline/Interview">Offline/Interview</option>
        </select><br>

        <label>Recruiting Since:</label>
        <input type="text" name="recruiting_since" required><br>

        <input type="submit" value="Register">
        <br><br>Already a user? <a href="index.php" class="button">Login</a>
    </form>
</body>
</html>

