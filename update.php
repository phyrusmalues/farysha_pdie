<?PHP include('header.php'); ?>
<?PHP include('sidebar.php'); ?>

<?php
// Establishing a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kamsiskpmb";
$connection = new mysqli($servername, $username, $password, $dbname);

// Checking the connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Checking if the form has been submitted for an update
if (isset($_POST['update'])) {
    $student_id = $_POST['student_id'];
    $new_room_no = $_POST['room_no'];

    // Updating the record in the database
    $sql = "UPDATE student SET room_no='$new_room_no' WHERE student_id='$student_id'";
    if ($connection->query($sql) === true) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $connection->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Student Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            background: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        input[type="text"] {
            width: calc(100% - 12px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 0;
            border-radius: 5px;
            background-color: #4CAF50;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }
        .goback-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #D7A94A;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        .goback-btn:hover {
            background-color: #AA8437;
        }
    </style>
</head>
<body>
    <h2 style="color: #333;">Update Student Information</h2>
    <form method="post" action="">
        <label for="student_id">Student ID:</label><br>
        <input type="text" id="student_id" name="student_id" style="margin-bottom: 15px;" ><br>

        <label for="room_no">New Address:</label><br>
        <input type="text" id="room_no" name="room_no" style="margin-bottom: 15px;" ><br>

        <input type="submit" name="update" value="Update" style="background-color: #D7A94A;"><br>


</form>
</body>


</html>
