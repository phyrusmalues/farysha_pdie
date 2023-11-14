<!DOCTYPE html>
<html>

<head>
    <title>Kamsis Inventory</title>
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
            width: 50%;
            padding: 10px;
            border: 0;
            border-radius: 5px;
            background-color: #5E8BE6;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin: 0 auto; /* Add this line to center the button horizontally */
            display: block; /* Add this line to make the button a block element */
        }

        input[type="submit"]:hover {
            background-color: #4567AA;
        }
        h2 {
            margin-top: 20px;
            color: #333;
        }

        .notes-container {
            width: 50%;
            margin: 0 auto;
            text-align: center;
            margin-top: 20px;
        }
        .notes-container label,
        .notes-container textarea {
            display: block;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <h2>Kamsis Inventory</h2>
    <h4>Check In Inventory</h4>
    <form method="post" action="">
    <label for="studid">Student ID:</label><br>
        <input type="text" id="studid" name="studid" required><br>
        <table>
            <tr>
                <th>Item</th>
                <th>Have</th>
            </tr>
            <tr>
                <td>Keys</td>
                <td><input type="checkbox" name="kunci" value="yes"></td>
            </tr>
            <tr>
                <td>Chair</td>
                <td><input type="checkbox" name="kerusi" value="yes"></td>
            </tr>
            <tr>
                <td>Study Carrel</td>
                <td><input type="checkbox" name="studycarrel" value="yes"></td>
            </tr>
            <tr>
                <td>Bed</td>
                <td><input type="checkbox" name="katil" value="yes"></td>
            </tr>
            <tr>
                <td>Mattress</td>
                <td><input type="checkbox" name="tilam" value="yes"></td>
            </tr>
            <tr>
                <td>Locker</td>
                <td><input type="checkbox" name="locker" value="yes"></td>
            </tr>
        </table><br>
        
        <input type="submit" name="submit" value="Check In">
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
        $studid = $_POST['studid'];
        $kunci = isset($_POST['kunci']) ? 'Have' : 'Not Have';
        $kerusi = isset($_POST['kerusi']) ? 'Have' : 'Not Have';
        $studycarrel = isset($_POST['studycarrel']) ? 'Have' : 'Not Have';
        $katil = isset($_POST['katil']) ? 'Have' : 'Not Have';
        $tilam = isset($_POST['tilam']) ? 'Have' : 'Not Have';
        $locker = isset($_POST['locker']) ? 'Have' : 'Not Have';
    
        $sql = "INSERT INTO inventori (studid, kunci, kerusi, studycarrel, katil, tilam, locker) VALUES ('$studid', '$kunci', '$kerusi', '$studycarrel', '$katil', '$tilam', '$locker')";
    
        echo "<div class='user-data'>";
        echo "<h3>User Data</h3>";
        echo "<table>";
        echo "<tr><td>Student ID:</td><td>" . $studid . "</td></tr>";
        echo "<tr><td>Keys:</td><td>" . $kunci . "</td></tr>";
        echo "<tr><td>Chair:</td><td>" . $kerusi . "</td></tr>";
        echo "<tr><td>Study Carrel:</td><td>" . $studycarrel . "</td></tr>";
        echo "<tr><td>Bed:</td><td>" . $katil . "</td></tr>";
        echo "<tr><td>Mattress:</td><td>" . $tilam . "</td></tr>";
        echo "<tr><td>Locker:</td><td>" . $locker . "</td></tr>";
        echo "</table>";
        echo "</div>";


        if ($conn->query($sql) === TRUE) {
            echo "Inventory data inserted successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
</body>

</html>



<body>
<h4>Check Out Inventory</h4>
    <form method="post" action="">
        <label for="studid">Student ID:</label><br>
        <input type="text" id="studid" name="studid" required><br>
        <table>
            <tr>
                <th>Item</th>
                <th>Have</th>
            </tr>
            <tr>
                <td>Keys</td>
                <td><input type="checkbox" name="kunci" value="yes"></td>
            </tr>
            <tr>
                <td>Chair</td>
                <td><input type="checkbox" name="kerusi" value="yes"></td>
            </tr>
            <tr>
                <td>Study Carrel</td>
                <td><input type="checkbox" name="studycarrel" value="yes"></td>
            </tr>
            <tr>
                <td>Bed</td>
                <td><input type="checkbox" name="katil" value="yes"></td>
            </tr>
            <tr>
                <td>Mattress</td>
                <td><input type="checkbox" name="tilam" value="yes"></td>
            </tr>
            <tr>
                <td>Locker</td>
                <td><input type="checkbox" name="locker" value="yes"></td>
            </tr>
        </table><br>
        <div class="notes-container">
            <label for="notes">Notes:</label>
            <textarea id="notes" name="notes" rows="4" cols="50"></textarea><br>
            <input type="submit" name="submit" value="Check-Out ">
        </div>


    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "kamsiskpmb";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $studid = $_POST['studid'];
        $kunci = isset($_POST['kunci']) ? 'Have' : 'Not Have';
        $kerusi = isset($_POST['kerusi']) ? 'Have' : 'Not Have';
        $studycarrel = isset($_POST['studycarrel']) ? 'Have' : 'Not Have';
        $katil = isset($_POST['katil']) ? 'Have' : 'Not Have';
        $tilam = isset($_POST['tilam']) ? 'Have' : 'Not Have';
        $locker = isset($_POST['locker']) ? 'Have' : 'Not Have';
        $notes = $_POST['notes'];

        // Sanitize the notes
        $sanitized_notes = $conn->real_escape_string($notes);

        // Insert data into the inventori table
        $sql = "INSERT INTO inventori (studid, kunci, kerusi, studycarrel, katil, tilam, locker, notes) VALUES ('$studid', '$kunci', '$kerusi', '$studycarrel', '$katil', '$tilam', '$locker', '$sanitized_notes')";

        if ($conn->query($sql) !== TRUE) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        echo "<div class='user-data'>";
        echo "<h3>User Data</h3>";
        echo "<table>";
        echo "<tr><td>Student ID:</td><td>" . $studid . "</td></tr>";
        echo "<tr><td>Keys:</td><td>" . $kunci . "</td></tr>";
        echo "<tr><td>Chair:</td><td>" . $kerusi . "</td></tr>";
        echo "<tr><td>Study Carrel:</td><td>" . $studycarrel . "</td></tr>";
        echo "<tr><td>Bed:</td><td>" . $katil . "</td></tr>";
        echo "<tr><td>Mattress:</td><td>" . $tilam . "</td></tr>";
        echo "<tr><td>Locker:</td><td>" . $locker . "</td></tr>";
        echo "<tr><td>Notes:</td><td>" . $sanitized_notes . "</td></tr>";
        echo "</table>";
        echo "</div>";

        $conn->close();
    }
    ?>
</body>

</html>