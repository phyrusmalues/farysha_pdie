<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <style>
        /* Your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding-top: 50px;
        }
        img {
            display: block;
            margin: 0 auto;
            width: 80%;
        }
        .details {
            width: 50%;
            margin: 0 auto;
            text-align: left;
            margin-top: 20px;
        }
    </style>
</head>

<body>
<?PHP include('header2.php'); ?>
<?PHP include('studentdashboard.php'); ?>
	<?php
	// Path to the image file
	$image_path = 'img/kpm.jpg';
	?>

	<img src="<?php echo $image_path; ?>" alt="Image">

	<div class="details">
	
	<h2>WELCOME STUDENTS</h2>

			<h4>Welcome to the Kamsis Registration System! We are excited to have you on board for the new academic year.
                 Our user-friendly system is designed to make your kamsis registration process smooth and hassle-free. With our efficient platform, you can easily explore available accommodations, enter your room, and complete your registration seamlessly. Should you have any queries or require assistance, our support team is readily available to help you. We wish 
                you a comfortable and enriching stay at our college hostel. Welcome aboard</h4>
			
		</div>

</body>
</html>
