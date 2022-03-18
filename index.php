<?php 

require 'functions.php';
$mahasiswa = query("SELECT * FROM berita");

// tombol cari ditekan
if( isset($_POST["cari"]) ) {
	$mahasiswa = cari($_POST["keyword"]);
}

		


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/title.png" type="image/gif" sizes="16x16">
	<title>Portal Berita</title>
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top" data-aos="fade-down" data-aos-duration="1000">
	<div class="container" >
		<a class="navbar-brand" href="indexAdmin.php">News Portal Umn</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<!-- <form class="d-flex" style="margin-left:250px" method="POST">
        	<input class="form-control me-2" type="text" placeholder="Search" aria-label="Search" name="keyword" autocomplete="off" >
        	<button class="btn btn-outline-success btn-dark" type="submit" name="cari">Search</button>
     	</form> -->

		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
				<a class="nav-link active" href="loginAdmin.php">Login Admin</a>
				</li>
				<li class="nav-item">
				<a class="nav-link active" href="loginUser.php">Login User</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
<br><br><br>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h4 class="text-center">Category</h4>
		</div>
	</div>
</div>

<div class="nav-scroller py-1 mb-2">
	<div class="container">
		<nav class="nav d-flex justify-content-between" data-aos="zoom-in" data-aos-duration="1000">
		<a class="p-2 link-secondary" href="CategoryEntertainment.php" >Entertainment</a>
		<a class="p-2 link-secondary" href="CategoryOlahraga.php" >Olahraga</a>
		<a class="p-2 link-secondary" href="CategoryNasional.php" >Nasional</a>
		<a class="p-2 link-secondary" href="CategoryTerpopuler.php" >Terpopuler</a>
		</nav>
	</div>
</div>

<br>
<div class="container">
	<div class="row">
		<?php foreach( $mahasiswa as $row ) : ?>
		<?php $x = 0; ?>
		<div class="col-sm-4">
			<div class="card" style="height: auto; " data-aos="flip-left" data-aos-duration="1000">
				<img src="img/<?= $row["Gambar"]; ?>" class="card-img-top" alt="...">
				<div class="card-body">
					<h5 class="card-title"><a href="detail.php?id=<?= $row["id"]; ?>" style="color: black; text-decoration:none"><?= $row["Judul"]; ?></a></h5>
					<h6 class="card-subtitle mb-2 text-muted"><?= $row["Penulis"]; ?></h6>
					<h6 class="card-subtitle mb-2 text-muted"><?= $row["Tanggal"]; ?> | <?= $row["Category"]; ?> </h6>
					<div class="isi" style="overflow: hidden; height:120px;">
						<p class="card-text"><?= $row["Isi"]; ?></p>
					</div>
					<br>
					<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" ><a href="detail.php?id=<?= $row["id"]; ?>" style="color: white;">Lihat Selengkapnya</a></button>
				</div>
			</div>			
		</div>

		<?php $x++; ?>
		<?php endforeach; ?>
	</div>
</div>





<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="js/bootstrap.js"></script>
</body>
</html>