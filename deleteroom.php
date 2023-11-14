<!DOCTYPE html>
<html>
<head>
    <title>Delete Student Information</title>
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
            background-color: #f44336;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #d32f2f;
        }

        h2 {
            text-align: center;
        }

        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2 style="color: #333;">Delete Kamsis Room</h2>
    <form method="post" action="">
        <label for="roomno">Delete Room:</label><br>
        <input type="text" id="roomno" name="roomno" style="margin-bottom: 15px;" required><br>

        <input type="submit" name="delete" value="Delete">
    </form>


<?PHP include('header.php'); ?>
<?PHP include('sidebar.php'); ?>

    <?php
        // Replace the database credentials with your own values
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kamsiskpmb";

        $connection = new mysqli($servername, $username, $password, $dbname);

        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        if (isset($_POST['delete'])) {
            $roomno = $_POST['roomno'];

            $sql = "DELETE FROM rooms WHERE roomno='$roomno'";

            if ($connection->query($sql) === TRUE) {
                echo "<p style='text-align: center; color: green;'>Record deleted successfully</p>";
            } else {
                echo "<p style='text-align: center; color: red;'>Error: " . $sql . "<br>" . $connection->error . "</p>";
            }
        }

        $connection->close();
    ?>
</body>
</html>
