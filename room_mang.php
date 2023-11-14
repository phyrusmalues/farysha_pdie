<!DOCTYPE html>
<html>

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
</head>

<body>

    <h2>Room Registration</h2>

    <form method="post" action="">
        <label for="roomno">Room No:</label><br>
        <input type="text" id="roomno" name="roomno" required><br>

        <label for="registerdate">Register Date:</label><br>
        <input type="date" id="registerdate" name="registerdate" required><br>

        <input type="submit" name="register" value="Register Room">
    </form>

    <h2>Registered Rooms</h2>

    <table>
        <tr>
            <th>Room No</th>
            <th>Register Date</th>
            <th>Actions</th>
        </tr>

        <?PHP include('header.php'); ?>
        <?PHP include('sidebar.php'); ?>


        <?php
        // Your PHP code for database connection
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

        // Handle form submission
        if (isset($_POST['register'])) {
            $roomno = $_POST['roomno'];
            $registerdate = $_POST['registerdate'];

            $sql = "INSERT INTO rooms (roomno, registerdate) VALUES ('$roomno', '$registerdate')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Retrieve and display the registered rooms
        $sql = "SELECT roomno, registerdate FROM rooms";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Format the date for display if needed
                $formattedDate = date("Y-m-d", strtotime($row["registerdate"]));

                echo "<tr><td>" . $row["roomno"] . "</td><td>" . $formattedDate . "</td><td><form method='post' action='deleteroom.php'><button type='submit' name='delete' value='" . $row["roomno"] . "'>Delete</button></form></td></tr>";
            }
        } else {
            echo "0 results";
        }
        ?>
    </table>

</body>


</html>
