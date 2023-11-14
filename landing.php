<!DOCTYPE html>
<html>

<head>
    <title>Hostel Registration System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        .image{
            width: 30%;

        }

        .logo {
            margin-bottom: 70px;
        }

        .buttons {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .button {
            margin: 10px;
            padding: 10px 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-decoration: none;
            color: #FCFCFC;
            background-color: #A42323;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #59595a;
        }

        .main-heading{
            position: center;
            text-align:center;
            
        }
        .main-heading h1{
            font-family: Georgia,serif;
            font-size: 45px;
            margin: 5px;
            letter-spacing: 3px;
            color: #861010;
            text-align: center;
        }
        .main-heading h5{
            font-size: 15px;
            margin: 5px;
            letter-spacing: 1px;
            color: #59595a;
            text-align: center;
        }

    </style>
</head>

<body>

    <div class="logo">
        <img src="img/kpm2.jpg" alt="Image" style="width: 100%;">

    </div>

   <div class="main-heading">
        <h1>KAMSIS  REGISTRATION SYSTEM</h1>
        <h5>Welcome to kamsis kpmb registration portal</h5>
        <h5>Click the Student or Admin button to proceed</h5>
    </div>

    <div class="buttons">
        <a class="button" href="home.php">Student</a>
        <a class="button" href="login.php">Admin</a>
    </div>

</body>

</html>
