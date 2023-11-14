<!DOCTYPE html>
<html>

<head>
    <title>Student Complaint Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            height: 50%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 200px;
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
        a {
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
<h2>Student Complaint Form</h2>

<?PHP include('header2.php'); ?>
<?PHP include('studentdashboard.php'); ?>

<form method="post" action="">
    <label for="complainant_name">Your Name:</label><br>
    <input type="text" id="complainant_name" name="complainant_name" required><br><br>

    <label for="complaint_type">Complaint Type:</label><br>
    <input type="text" id="complaint_type" name="complaint_type" required><br><br>

    <label for="complaint">Complaint:</label><br>
    <textarea id="complaint" name="complaint" rows="4" cols="50" required></textarea><br><br>

    <input type="submit" name="submit" value="Submit Complaint">
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
        $complainant_name = $_POST['complainant_name'];
        $complaint_type = $_POST['complaint_type'];
        $complaint = $_POST['complaint'];

        $sql = "INSERT INTO complaint (complainant_name, complaint_type, complaint) VALUES ('$complainant_name', '$complaint_type', '$complaint')";

        if ($conn->query($sql) === true) {
            echo "Complaint submitted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>

<div class="table-container">
    <?php
        $sql = "SELECT * FROM complaint";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            echo "<h2>Complaints</h2>";
            echo "<table>";
            echo "<tr><th>Complainant Name</th><th>Complaint Type</th><th>Complaint</th><th>Created At</th><th>Resolve Status</th><th>Complaint Date</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["complainant_name"] . "</td><td>" . $row["complaint_type"] . "</td><td>" . $row["complaint"] . "</td><td>" . $row["created_at"] . "</td><td>" . $row["resolve_status"] . "</td><td>" . $row["resolve_date"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No complaints found.";
        }
        $conn->close();
    
    ?>
</div>

</body>

</html>
