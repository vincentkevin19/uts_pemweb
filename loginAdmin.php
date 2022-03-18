<?php 
session_start();
require 'functions.php';

// cek cookie
// if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
// 	$id = $_COOKIE['id'];
// 	$key = $_COOKIE['key'];

// 	// ambil username berdasarkan id
// 	$result = mysqli_query($conn, "SELECT username FROM `admin` WHERE id = $id");
// 	$row = mysqli_fetch_assoc($result);

// 	// cek cookie dan username
// 	if( $key === hash('sha256', $row['username']) ) {
// 		$_SESSION['login'] = true;
// 	}


// }

if( isset($_SESSION["login"]) ) {
	header("Location: indexAdmin.php");
	exit;
}


if( isset($_POST["login"]) ) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM `admin` WHERE username = '$username'");

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



	// cek username
	if( mysqli_num_rows($result) === 1 ) {

		// cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			// set session
			$_SESSION["login"] = true;

			// // cek remember me
			// if( isset($_POST['remember']) ) {
			// 	// buat cookie
			// 	setcookie('id', $row['id'], time()+60);
			// 	setcookie('key', hash('sha256', $row['username']), time()+60);
			// }

			header("Location: indexAdmin.php");
			exit;
		}
	}

	$error = true;

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/title.png" type="image/gif" sizes="16x16">
	<title>Halaman Login</title>
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<br>

<?php if( isset($error) ) : ?>
	<p style="color: red; font-style: italic;">username / password salah</p>
<?php endif; ?>


<section>
	<div class="container">
		<div class="row text-center">
			<div class="col">
				<h2>Halaman Login Admin</h2>
			</div>
        </div>
		<div class="row justify-content-sm-center">
			<div class="col-sm-6">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="sm-3" data-aos="zoom-out" data-aos-duration="1000">
						<label for="username">Username :</label>
						<input type="text" name="username" id="username" class="form-control">
					</div>
					<div class="sm-3" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="50"> 
						<label for="password">Password :</label>
						<input type="password" name="password" id="password" class="form-control">
					</div>
					<br>
					<div class="sm-3" data-aos="zoom-out" data-aos-duration="1000" data-aos-delay="100">
						<div class="g-recaptcha" data-sitekey="6Les8lYcAAAAALkZKKAnF0gJ7xDNpt1DElvUPM4Q" style="margin-bottom: 10px;"></div>
					</div>
					<br>
					<button type="submit" name="login" class="btn btn-primary">Login</button>
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