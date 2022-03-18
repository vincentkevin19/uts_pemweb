<?php

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "PortalBerita");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $conn;

	$Judul = htmlspecialchars($data["Judul"]);
	$Tanggal = htmlspecialchars($data["Tanggal"]);
	$Isi = htmlspecialchars($data["Isi"]);
	$Penulis = htmlspecialchars($data["Penulis"]);
	$Category = $data["Category"];
	$Gambar = htmlspecialchars($data["Gambar"]);

	// upload gambar
	$Gambar = upload();
	if( !$Gambar ) {
		return false;
	}

	$query = "INSERT INTO berita
				VALUES
			  ('', '$Judul', '$Tanggal', '$Isi', '$Penulis', '$Category' ,'$Gambar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function upload() {

	$namaFile = $_FILES['Gambar']['name'];
	$ukuranFile = $_FILES['Gambar']['size'];
	$error = $_FILES['Gambar']['error'];
	$tmpName = $_FILES['Gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if( $error === 4 ) {
		echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
		echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
		return false;
	}

	// cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ) {
		echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
		return false;
	}

	// lolos pengecekan, gambar siap diupload
	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

	return $namaFileBaru;
}




function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM berita WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data) {
	global $conn;

	$id = $data["id"];
	$Judul = htmlspecialchars($data["Judul"]);
	$Tanggal = htmlspecialchars($data["Tanggal"]);
	$Isi = htmlspecialchars($data["Isi"]);
	$Penulis = htmlspecialchars($data["Penulis"]);
	$Category = htmlspecialchars($data["Category"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);
	
	// cek apakah user pilih gambar baru atau tidak
	if( $_FILES['Gambar']['error'] === 4 ) {
		$Gambar = $gambarLama;
	} else {
		$Gambar = upload();
	}
	

	$query = "UPDATE berita SET
				Judul = '$Judul',
				Tanggal = '$Tanggal',
				Isi = '$Isi',
				Penulis = '$Penulis',
				Category = '$Category',
				Gambar = '$Gambar'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);	
}


function cari($keyword) {
	$query = "SELECT * FROM berita
				WHERE
			  Judul LIKE '%$keyword%' OR
			  Isi LIKE '%$keyword%' OR
			  Penulis LIKE '%$keyword%'OR
              Category LIKE '%$keyword%'
			";
	return query($query);
}


function registrasiUser($data) {
	global $conn;

	$firstname = strtolower(stripslashes($data["firstname"]));
	$lastname = strtolower(stripslashes($data["lastname"]));
	$tanggallahir = strtolower(stripslashes($data["tanggallahir"]));
	$jeniskelamin = strtolower(stripslashes($data["jeniskelamin"]));
	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);
	$Gambar = htmlspecialchars($data["Gambar"]);

	$Gambar = upload();
	if( !$Gambar ) {
		return false;
	}


	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO `user`(`id`, `firstname`, `lastname`, `username`, `password`, `tanggallahir`, `jeniskelamin`, `Gambar`) VALUES ('','$firstname','$lastname','$username','$password','$tanggallahir','$jeniskelamin','$Gambar')");

	return mysqli_affected_rows($conn);

}


function registrasiAdmin($data) {
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM `admin` WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
		return false;
	}


	// cek konfirmasi password
	if( $password !== $password2 ) {
		echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
		return false;
	}

	// enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	// tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO `admin` VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);

}

function Komentar($data){
	global $conn;
	$Komentar = htmlspecialchars($data["Komentar"]);
	$NamaKomentar = htmlspecialchars($data["NamaKomentar"]);
	$query = "INSERT INTO `komentar`
				VALUES
			  ('', '$NamaKomentar' , '$Komentar')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}









?>