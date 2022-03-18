<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {

	if( registrasiAdmin($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
                document.location.href = 'index.php';
			  </script>";
	} else {
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
	<title>Halaman Register Admin</title>
	<style>
		label {
			display: block;
		}
	</style>
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>


<section>
	<div class="container">
		<div class="row text-center">
			<div class="col-sm-12">
				<h2>Halaman Registrasi Admin</h2>
			</div>
        </div>
		<div class="row justify-content-sm-center">
			<div class="col-sm-6">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="sm-3" data-aos="fade-down" data-aos-duration="1000" >
						<label for="username">username :</label>
						<input type="text" name="username" id="username" class="form-control" required>
					</div>
					<div class="sm-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="50">
						<label for="password">password :</label>
						<input type="password" name="password" id="password" class="form-control" required>
					</div>
					<div class="sm-3" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="100">
						<label for="password2">konfirmasi password :</label>
						<input type="password" name="password2" id="password2" class="form-control" required>
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