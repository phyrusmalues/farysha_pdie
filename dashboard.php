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
	<?php
	// Path to the image file
	$image_path = 'img/kpm.jpg';
	?>

	<img src="<?php echo $image_path; ?>" alt="Image">

	<div class="details">
	
	<h2>WELCOME</h2>

			<h4>The purpose of developing a kamsis registration system for the admin is to simplify and streamline the management of kamsis registrations. It automates the registration process, centralizes data, and enables real-time monitoring of room occupancy. The system aims to improve communication between the administration and students, enhance security, and provide valuable insights through reporting and analysis.</h4>
			
		</div>

</body>
</html>
