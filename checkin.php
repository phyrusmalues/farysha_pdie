<!DOCTYPE html>
<html>

<head>
    <title>Kamsis Check-In</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
            $("#checkin").datepicker({ dateFormat: 'yy-mm-dd' });
        });
    </script>
</head>

<body>
    <div class="container">
        <h2>Kamsis Check-In</h2>
        <form action="" method="post">
            <label for="student_id">Student ID:</label><br>
            <input type="text" id="student_id" name="student_id"><br>

            <label for="student_name">Student Name:</label><br>
            <input type="text" id="student_name" name="student_name"><br>

            <label for="s_address">Address:</label><br>
            <input type="text" id="s_address" name="s_address"><br>

            <label for="semester">Semester:</label><br>
            <select id="semester" name="semester">
                <option value="S1/2023">S1/2023</option>
                <option value="S2/2023">S2/2023</option>
                <option value="S3/2023">S3/2023</option>
            </select><br>

            <label for="checkin">Check-In Date:</label><br>
            <input type="text" id="checkin" name="checkin"><br>
        


            <label for="kamis_type">Kamis Type:</label><br>
            <select id="kamis_type" name="kamis_type">
                <option value="Kamsis Khadijah">Kamsis Khadijah</option>
                <option value="Kamsis Aishah">Kamsis Aishah</option>
                <option value="Kamsis Farabi">Kamsis Farabi</option>
            </select><br><br>

            <input type="submit" name="submit" value="Check-In">
        </form>
    </div>
</body>

</html>

<?PHP include('header2.php'); ?>
<?PHP include('studentdashboard.php'); ?>

<?php
// Database connection
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

// Auto-generate room numbers based on kamsis types
function generateRoomNumber($conn, $kamsisType)
{
    $room_prefix = '';
    $room_number = 100;

    switch ($kamsisType) {
        case 'Kamsis Khadijah':
            $room_prefix = 'K';
            break;
        case 'Kamsis Aishah':
            $room_prefix = 'A';
            break;
        case 'Kamsis Farabi':
            $room_prefix = 'F';
            break;
        default:
            $room_prefix = '';
    }

    $room_check_sql = "SELECT * FROM student WHERE kamis_type='$kamsisType' AND room_no LIKE '$room_prefix%'";
    $result = $conn->query($room_check_sql);

    // Increment the room number until a non-existing room number is found
    while ($result->num_rows > 0 && $room_number <= 200) {
        $room_number++;
        $room_check_sql = "SELECT * FROM student WHERE kamis_type='$kamsisType' AND room_no='$room_prefix$room_number'";
        $result = $conn->query($room_check_sql);
    }

    if ($room_number > 200) {
        return '';
    }

    return $room_prefix . $room_number;
}

// Example form for check-in
?>
<?php
// Handle the form submission and insert data into the database
if (isset($_POST['submit'])) {
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $s_address = $_POST['s_address'];
    $semester = $_POST['semester'];
    $checkin = $_POST['checkin'];
    $kamis_type = $_POST['kamis_type'];

    $room_no = generateRoomNumber($conn, $kamis_type);

    if ($room_no == '') {
        echo "All rooms for the selected Kamsis type are occupied.";
    } else {
        // Insert data into the database
        $insert_sql = "INSERT INTO student (student_id, student_name, s_address, semester, checkin, room_no, kamis_type) 
                      VALUES ('$student_id', '$student_name', '$s_address', '$semester', '$checkin', '$room_no', '$kamis_type')";

        if ($conn->query($insert_sql) === TRUE) {
            echo "Check-in successful. Your room number is: $room_no";
        } else {
            echo "Error: " . $insert_sql . "<br>" . $conn->error;
        }
    }
}

// Close the connection
$conn->close();
?>