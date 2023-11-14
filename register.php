<!DOCTYPE html>
<html>
<head>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
  }

  .container {
    width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f2f2f2;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

  h2 {
    text-align: center;
    color: #333;
  }

  input[type="text"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    display: block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
  width: 100%;
  background-color: #5E8BE6;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #4567AA;
}

p {
  text-align: center;
}
</style>
</head>
<body><br><br>
    <div class="container">
    <h2>STUDENT SIGN UP</h2>
    <form action='' method='POST'>
    <label for="studentName">Student Name:</label>
    <input type='text' id="studentName" name='studentName'>
    <label for="studentId">Student ID:</label>
    <input type='text' id="studentId" name='studentId'>
    <label for="studentNumber">Phone Number:</label>
    <input type='text' id="studentNumber" name='studentNumber'>
    <label for="icno">IC Number:</label>
    <input type='text' id="icno" name='icno'>
    <input type='submit' value='Sign Up'>
    </form><br>
    <p>Already signed up? Click here to <a href="home.php">Log in</a></p>
    </div>
</body>
</html>

<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{
	# memanggil fail connection 
	include ('db.php');
	#mengambil data POST
	$studentName=$_POST['studentName'];
    $studentId=$_POST['studentId'];
	$studentNumber=$_POST['studentNumber'];
  $icno=$_POST['icno'];



	# arahan SQL untuk menyimpan data ke dalam jadual pelanggan
	$query="insert into studentsignup
	(studentName,studentId,studentNumber,icno)
	values
	('$studentName','$studentId','$studentNumber','$icno')";

	# melaksanakan proses menyimpan dalam syarat if
	if(mysqli_query($connection,$query))
    {
		#jika proses menyimpan berjaya. papar info buka laman pelanggan_login.php
		echo "<script>alert('You have already sign up!');
		window.location.href='test.php';</script>";
	}
	else
	{
#jika proses menyimpan gagal, kembali ke laman sebelumnya
echo "<script>alert('Try again');
window.history.back();</script>";
}
}
?>

