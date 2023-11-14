<?PHP include('header.php'); ?>
<?PHP include('sidebar.php'); ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kamsiskpmb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$roomno = $_POST['roomno'];

// Update query
$sql = "UPDATE rooms SET registerdate = '$new_registerdate', WHERE roomno = '$roomno'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<body>

<form action="update.php" method="post">
  Room Number: <input type="text" name="roomno"><br>
  New Register Date: <input type="text" name="new_registerdate"><br>
  <input type="submit" value="Update Data">
</form>

</body>
</html>
