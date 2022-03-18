<?php
session_start();

if( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
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
	<title>Tambah Berita</title>
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<section>
	<div class="container">
		<div class="row text-center">
			<div class="col">
				<h2>Tambah Data Berita</h2>
			</div>
        </div>
		<div class="row justify-content-sm-center">
			<div class="col-sm-6">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="sm-3">
						<label for="Judul" class="form-label ">Judul : </label>
						<input type="text" name="Judul" id="Judul" required class="form-control">
					</div>
					<div class="sm-3">
						<label for="Tanggal">Tangggal:</label>
						<input type="date" id="Tanggal" name="Tanggal" class="form-control">
					</div>
					<div class="sm-3">
						<label for="Isi">Isi :</label>
						<textarea class="form-control" aria-label="With textarea" type="text" name="Isi" id="Isi" style="width: 100%; height:40px;" class="form-control"></textarea>
					</div>
					<div class="sm-3">
						<label for="Penulis">Penulis :</label>
						<input type="text" name="Penulis" id="Penulis" class="form-control">
					</div>
					<div class="sm-3">
						<div>Category :</div>
						<input type="radio" id="Category" name="Category" value="Olahraga">
						<label for="Category">Olahraga</label><br>
						<input type="radio" id="Category" name="Category" value="Terpopuler">
						<label for="Category">Terpopuler</label><br>
						<input type="radio" id="Category" name="Category" value="Nasional">
						<label for="Category">Nasional</label><br>
						<input type="radio" id="Category" name="Category" value="Entertainment">
						<label for="Category">Entertainment</label><br>
					</div>
					<div class="sm-3">
						<label for="Gambar">Gambar :</label>
						<input type="file" name="Gambar" id="Gambar" class="form-control">
					</div>
					<br>
					<button type="submit" name="submit" class="btn btn-primary">Tambah Data!</button>
				</form>
			</div>
		</div>
	</div>
</section>






<script src="js/bootstrap.js"></script>

</body>
</html>