<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 60vh;
            margin: 0;
        }
        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 20px;
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
        h2 {
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body><br><br><br>

<h2>Student Details</h2>

<table>
  <tr>
  <th>Student ID</th>
            <th>Student Name</th>
            <th>Address</th>
            <th>Kamsis Type</th>
            <th>Room No</th>
            <th>Check-In</th>
            <th>Check-Out</th>
            <th>Actions</th>
  </tr>

  <?PHP
        // Replace the database credentials with your own values
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kamsiskpmb";

        $connection = new mysqli($servername, $username, $password, $dbname);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        $sql = "SELECT * FROM student";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["student_id"] . "</td><td>" . $row["student_name"] . "</td><td>" . $row["s_address"] . "</td><td>" . $row["kamis_type"] . "</td><td>" . $row["room_no"] . "</td><td>" . $row["checkin"] . "</td><td>" . $row["checkout"] . "</td>";
                echo "<td><a href='update.php?id=" . $row["student_id"] . "' style='color: #4CAF50;'>Update</a> | <a href='delete.php?id=" . $row["student_id"] . "' style='color: #FF0000;' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a></td></tr>";
            }
        } else {
            echo "<tr><td colspan='8'>0 results</td></tr>";
        }

        $connection->close();
        ?>
    </table>
</body>
</html>
