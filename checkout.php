<!DOCTYPE html>
<html>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<head>
<style>
    body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding-top: 50px;
        }

        table {
            width: 50%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #5E8BE6;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        h2 {
            color: #333;
        }

        form {
            width: 50%;
            margin: 0 auto;
            text-align: left;
            margin-top: 20px;
        }

        input[type="text"],
        input[type="date"],
        input[type="submit"] {
            width: calc(100% - 20px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: 0;
            border-radius: 5px;
            background-color: #5E8BE6;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #4567AA;
        }
</style>
<script>
        $(function () {
            $("#checkout").datepicker({ dateFormat: 'yy-mm-dd' });
        });
    </script>
</head>

<body>
    <h2>Kamsis Check-Out</h2>

    <form method="post" action="">
        <label for="student_id">Student ID:</label><br>
        <input type="text" id="student_id" name="student_id" required><br><br>

        <label for="checkout">Check-Out Date:</label><br>
        <input type="date" id="checkout" name="checkout" required><br><br>

        <input type="submit" name="submit" value="Check-Out">
    </form>

    <?PHP include('header2.php'); ?>
    <?PHP include('studentdashboard.php'); ?>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "kamsiskpmb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST['submit'])) {
        $student_id = $_POST['student_id'];
        $checkout = $_POST['checkout'];

        // Verify if the student ID exists
        $sql = "SELECT * FROM student WHERE student_id='$student_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Update the check-out date for the student
            $update_sql = "UPDATE student SET checkout='$checkout' WHERE student_id='$student_id'";
            if ($conn->query($update_sql) === true) {
                echo "Check-out successful. Check-out date updated to: " . $checkout;
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Student ID not found. Please check the ID and try again.";
        }
    }
    $conn->close();
    ?>
</body>

</html>
