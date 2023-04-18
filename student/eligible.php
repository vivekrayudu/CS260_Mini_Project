<?php
require 'config.php';
?>

<?php
    session_start();
    $emp_id = $_SESSION['sess_user'];
      
?>

<?php
$sql = "select * from companyregister where compname not in(
  (select compname from reject) union
  (select compname from sd where sd.rollno='$emp_id') union
  (select companyregister.compname from companyregister,sd where companyregister.salary<sd.salary and sd.rollno='$emp_id'))";
$result = mysqli_query($conn, $sql);

// Display the list of companies on the web page

echo "<table style='border-collapse: collapse; margin: 20px; border: 2px solid #333;'>";
echo "<tr><th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Company Name</th>
<th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Type</th>
<th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Mode</th>
<th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Salary</th>
<th style='border: 2px solid #333; padding: 10px; color: #fff; background-color: #333;'>Update</th>
</tr>";

while ($row = mysqli_fetch_assoc($result)) {
  echo "<tr>";
  
  echo "<td style='border: 2px solid #333; padding: 10px;'>" . $row['compname'] . "</td>";
  echo "<td style='border: 2px solid #333; padding: 10px;'>" . $row['type'] . "</td>";
  echo "<td style='border: 2px solid #333; padding: 10px;'>" . $row['mode'] . "</td>";
  echo "<td style='border: 2px solid #333; padding: 10px;'>" . $row['salary'] . "</td>";
  echo "<td style='border: 2px solid #333;style='padding: 10px;'><a href='apply.php?id=" . $row["compname"] . "' style='padding: 5px 10px; background-color: #007bff; color: #fff; text-decoration: none; border-radius: 3px;'>Apply Now</a></td>";
  echo "</tr>";
}

echo "</table>";


mysqli_close($conn);
?>
<?php
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<script>
if("<?php echo $message; ?>" !== '') {
  alert("<?php echo $message; ?>");
}
</script>