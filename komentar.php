<?php 
require 'functions.php';

// cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	
	// cek apakah data berhasil di tambahkan atau tidak
	if( Komentar($_POST) > 0 ) {
		echo "
			<script>
				alert('Komentar berhasil ditambahkan!');
                document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Komentar gagal ditambahkan!');
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
    <title>Komentar</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <br>
    <form action="" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Nama" id="NamaKomentar" style="height: 100px" name="NamaKomentar" required></textarea>
                        <label for="floatingTextarea2">Nama</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="Komentar" style="height: 100px" name="Komentar" required></textarea>
                        <label for="floatingTextarea2">Komentar</label>
                    </div>
                    <br>
                    <button class="btn btn-primary" type="submit" name="submit">Kirim</button>
                </div>
            </div>
        </div>
    </form>
    <script src="js/bootstrap.js"></script>
</body>
</html>