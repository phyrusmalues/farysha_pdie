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
            height: 80vh;
            margin: 0;
        }
        table {
            width: 60%;
            border-collapse: collapse;
            margin-top: 20px;
            height: 50%;
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
            color: #172C55;
        }
    </style>
</head>
<body>

<h2>Student Complaint Details</h2>

<table>
  <tr>
    <th>Complainant Name</th>
    <th>Complaint Type</th>
    <th>Complaint</th>
    <th>Created At</th>
    <th>Resolve Status</th>
    <th>Resolve Date</th>
    <th>Actions</th>
  </tr>

  <?php include('header.php'); ?>
  <?php include('sidebar.php'); ?>

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

    $sql = "SELECT id, complainant_name, complaint_type, complaint, created_at, resolve_status, resolve_date FROM complaint";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["complainant_name"] . "</td><td>" . $row["complaint_type"] . "</td><td>" . $row["complaint"] . "</td><td>" . $row["created_at"] . "</td>";
            echo "<td>" . ($row["resolve_status"] ? 'Resolved' : 'Not Resolved') . "</td><td>" . $row["resolve_date"] . "</td>";
            echo "<td><button onclick='openModal(" . $row["id"] . ")'>Edit</button></td></tr>";
        }
    } else {
        echo "<tr><td colspan='8'>0 results</td></tr>";
    }

    $connection->close();
  ?>

  <script>
    function openModal(id) {
        const modal = document.createElement('div');
        modal.style.position = 'fixed';
        modal.style.top = '0';
        modal.style.left = '0';
        modal.style.width = '100%';
        modal.style.height = '100%';
        modal.style.background = 'rgba(0, 0, 0, 0.5)';
        modal.style.display = 'flex';
        modal.style.justifyContent = 'center';
        modal.style.alignItems = 'center';

        const modalContent = document.createElement('div');
        modalContent.style.background = '#fff';
        modalContent.style.padding = '20px';
        modalContent.innerHTML = `
            <h3>Change Resolve Status</h3>
            <select id="statusSelect">
                <option value="0">Not Resolved</option>
                <option value="1">Resolved</option>
            </select>
            <button onclick="updateResolveStatus(${id})">Save</button>
            <button onclick="document.body.removeChild(this.parentElement.parentElement)">Cancel</button>
        `;

        modal.appendChild(modalContent);
        document.body.appendChild(modal);
    }

    function updateResolveStatus(id) {
        const select = document.getElementById('statusSelect');
        const status = select.value;
        // Send the status update to the server
        const xhr = new XMLHttpRequest();
        xhr.open("GET", `update_status.php?id=${id}&status=${status}`, true);
        xhr.send();
        // Close the modal
        document.body.removeChild(document.body.lastChild);
    }
  </script>
</table>

</body>
</html>