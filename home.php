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
      color: #433;
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
      background-color: #A42323;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #59595a;
    }

    p {
      text-align: center;
    }
  </style>
</head>

<body>
  <br>
  <div class="container">
    <center>
      <img id="profile-img" class="profile-img-card" src="img/htl.png" class="gambar" />
    </center>
    <h2>STUDENT LOG IN</h2>
    <form action='' method='POST' autofocus>
      <label for="studentId">Student ID:</label>
      <input type='text' id="studentId" name='studentId'>
      <label for="icno">IC Number:</label>
      <input type='text' id="icno" name='icno'>
      <input type='submit' value='Log In'>
    </form>
    <center>
      <a href="register.php" class="text-danger">Register Here</a>
    </center>
    <center>
      <a href="landing.php" class="text-danger">Home</a>
    </center>
  </div>
</body>

</html>

<?PHP 
# menyemak kewujudan data POST
if (!empty($_POST))
{
	#memanggil fail connection
	include ('db.php');

	#mengambil data POST
	$studentId=$_POST['studentId'];
  $icno=$_POST['icno'];


	# arahan SQL untuk mencari data dari jadual pelanggan
	$query="select*
	from studentsignup
	where studentId='$studentId' and
	icno='$icno'
	limit 1 ";

	#melaksanakan proses carian 
	$laksana_arahan=mysqli_query($connection,$query);

	# jika terdapat 1 baris rekod ditemui
	if(mysqli_num_rows($laksana_arahan)==1)
	{
		# login berjaya
		# pembolehubah $rekod mengambil data yang ditemui semasa proses mencari
		$rekod=mysqli_fetch_array($laksana_arahan);

		#mengumpukkan kepada pembolehubah sessions
		$_SESSION['studentId']=$rekod['studentId'];
    $_SESSION['icno']=$rekod['icno'];


		# mengarahkan fail index.php dibuka
		echo "<script>window.location.href='checkin.php';</script>";
	}
	else
{
		# login gagal. kembali ke laman sebelumnya
		echo "<script>alert('Failed to log in. Sign Up first');
		window.location.href='stdsignup.php';</script>";
	}
}
?>

