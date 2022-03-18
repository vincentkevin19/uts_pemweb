<?php 
    require 'functions.php';
    $gosip = query("SELECT * FROM `berita` WHERE `Category` = 'Nasional'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="img/title.png" type="image/gif" sizes="16x16">
    <title>Nasional</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
	<h1 class="text-center">Category Nasional</h1>
	<br>
<div class="container">
	<div class="row">
		<?php foreach( $gosip as $row ) : ?>
		<?php $x = 0; ?>
		<div class="col-sm-4">
			<div class="card" style="height: auto; ">
				<img src="img/<?= $row["Gambar"]; ?>" class="card-img-top" alt="...">
				<div class="card-body">
				<h5 class="card-title"><a href="detail.php?id=<?= $row["id"]; ?>" style="color: black; text-decoration:none"><?= $row["Judul"]; ?></a></h5>
					<h6 class="card-subtitle mb-2 text-muted"><?= $row["Penulis"]; ?></h6>
					<h6 class="card-subtitle mb-2 text-muted"><?= $row["Tanggal"]; ?> | <?= $row["Category"]; ?> </h6>
					<div class="isi" style="overflow: hidden; height:120px;">
						<p class="card-text"><?= $row["Isi"]; ?></p>
					</div>
					<br>
					<button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" ><a href="detailUserAdmin.php?id=<?= $row["id"]; ?>" style="color: white;">Lihat Selengkapnya</a></button>
				</div>
			</div>			
		</div>

		<?php $x++; ?>
		<?php endforeach; ?>
	</div>
</div>
<script src="js/bootstrap.js"></script>
</body>
</html>