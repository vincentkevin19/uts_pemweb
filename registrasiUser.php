<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

	if( registrasiUser($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
                document.location.href = 'loginUser.php';
			  </script>";
	} else {
		echo mysqli_error($conn);
	}


	$captcha;

	if(isset($_POST['g-recaptcha-response'])){
		$captcha = $_POST['g-recaptcha-response'];
	}

	if(!$captcha){
		echo "<h2>please check the captcha form</h2>";
		exit;
	}
	$str = "https://www.google.com/recaptcha/api/siteverify?secret=6Les8lYcAAAAAL-pjgyVF9DJ8jyzLYZCzctMIp2K"."&response=". $captcha."&remoteip=". $_SERVER['REMOTE_ADDR'];

	$response = file_get_contents($str);
	$response_arr = (array) json_decode($response);

	if($response_arr["success"]==false){
		echo mysqli_error($conn);
	}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/title.png" type="image/gif" sizes="16x16">
	<title>Halaman Register User</title>
	<style>
		label {
			display: block;
		}
	</style>
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>


<section>
	<div class="container">
		<div class="row text-center">
			<div class="col">
				<h2>Halaman Registrasi User</h2>
			</div>
        </div>
		<div class="row justify-content-sm-center">
			<div class="col-sm-6">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="sm-3" data-aos="fade-down" data-aos-duration="1000">
						<label for="firstname">First Name :</label>
						<input type="text" name="firstname" id="firstname" class="form-control" required>
					</div>
					<div class="sm-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="50">
						<label for="lastname">Last Name :</label>
						<input type="text" name="lastname" id="lastname" class="form-control" required>
					</div>
					<div class="sm-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100">
						<label for="tanggallahir">Tanggal Lahir :</label>
						<input type="date" id="tanggallahir" name="tanggallahir" class="form-control" class="form-control" required>
					</div>
					<div class="sm-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="150">
						<div>Jenis Kelamin :</div>
						<input type="radio" id="jeniskelamin" name="jeniskelamin" value="Pria">
						<label for="jeniskelamin">Pria</label><br>
						<input type="radio" id="jeniskelamin" name="jeniskelamin" value="Perempuan">
						<label for="jeniskelamin">Perempuan</label><br>
					</div>
					<div class="sm-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="200">
						<label for="Gambar">Gambar :</label>
						<input type="file" name="Gambar" id="Gambar" class="form-control" required>
					</div>
					<div class="sm-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="250">
						<label for="username">username :</label>
						<input type="text" name="username" id="username" class="form-control" required>
					</div>
					<div class="sm-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="300">
						<label for="password">password :</label>
						<input type="password" name="password" id="password" class="form-control" required>
					</div>
					<div class="sm-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="350">
						<label for="password2">konfirmasi password :</label>
						<input type="password" name="password2" id="password2" class="form-control" required>
					</div>
					<br>
					<div class="sm-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="400">
						<div class="g-recaptcha" data-sitekey="6Les8lYcAAAAALkZKKAnF0gJ7xDNpt1DElvUPM4Q" style="margin-bottom: 10px;"></div>
					</div>
					<br>
					<button type="submit" name="register" class="btn btn-primary">Register!</button>
				</form>
			</div>
		</div>
	</div>
</section>


<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
	AOS.init();
</script>
<script src="js/bootstrap.js"></script>
</body>
</html>