<?php 
	require 'functions.php';


	$id = $_GET["id"];

	// query data mahasiswa berdasarkan id
	$mhs = query("SELECT * FROM Berita WHERE id = $id")[0];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
	<link rel="icon" href="img/title.png" type="image/gif" sizes="16x16">
    <title>Berita</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/blog/">
	<link rel="stylesheet" href="css/bootstrap.css">

    

    <!-- Bootstrap core CSS -->
<link href="/docs/5.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

	  .blog-header {
  line-height: 1;
  border-bottom: 1px solid #e5e5e5;
	}

	.blog-header-logo {
	font-family: "Playfair Display", Georgia, "Times New Roman", serif/*rtl:Amiri, Georgia, "Times New Roman", serif*/;
	font-size: 2.25rem;
	}

	.blog-header-logo:hover {
	text-decoration: none;
	}

	h1, h2, h3, h4, h5, h6 {
	font-family: "Playfair Display", Georgia, "Times New Roman", serif/*rtl:Amiri, Georgia, "Times New Roman", serif*/;
	}

	.display-4 {
	font-size: 2.5rem;
	}
	@media (min-width: 768px) {
	.display-4 {
		font-size: 3rem;
	}
	}

	.nav-scroller {
	position: relative;
	z-index: 2;
	height: 2.75rem;
	overflow-y: hidden;
	}

	.nav-scroller .nav {
	display: flex;
	flex-wrap: nowrap;
	padding-bottom: 1rem;
	margin-top: -1px;
	overflow-x: auto;
	text-align: center;
	white-space: nowrap;
	-webkit-overflow-scrolling: touch;
	}

	.nav-scroller .nav-link {
	padding-top: .75rem;
	padding-bottom: .75rem;
	font-size: .875rem;
	}

	.card-img-right {
	height: 100%;
	border-radius: 0 3px 3px 0;
	}

	.flex-auto {
	flex: 0 0 auto;
	}

	.h-250 { height: 250px; }
	@media (min-width: 768px) {
	.h-md-250 { height: 250px; }
	}

	/* Pagination */
	.blog-pagination {
	margin-bottom: 4rem;
	}
	.blog-pagination > .btn {
	border-radius: 2rem;
	}

	/*
	* Blog posts
	*/
	.blog-post {
	margin-bottom: 4rem;
	}
	.blog-post-title {
	margin-bottom: .25rem;
	font-size: 2.5rem;
	}
	.blog-post-meta {
	margin-bottom: 1.25rem;
	color: #727272;
	}

	/*
	* Footer
	*/
	.blog-footer {
	padding: 2.5rem 0;
	color: #727272;
	text-align: center;
	background-color: #f9f9f9;
	border-top: .05rem solid #e5e5e5;
	}
	.blog-footer p:last-child {
	margin-bottom: 0;
	}

    </style>

    
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
    
<div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">

      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="#">Berita</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="link-secondary" href="#" aria-label="Search">
         
        </a>

      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">

	  <a class="p-2 link-secondary" href="CategoryEntertainment.php">Entertainment</a>
	  <a class="p-2 link-secondary" href="CategoryOlahraga.php">Olahraga</a>
      <a class="p-2 link-secondary" href="CategoryNasional.php">Nasional</a>
      <a class="p-2 link-secondary" href="CategoryTerpopuler.php">Terpopuler</a>
    </nav>
  </div>
</div>

<main class="container">
  <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
    <div class="col-md-12 px-0">
      <h1 class="display-4 text-center">Portal Berita Debest</h1>
    </div>
  </div>


  <div class="container">
	  <div class="row">
		  <div class="col-sm-12">
			  <img src="img/<?=$mhs['Gambar'] ?>" alt="" class="img-fluid">
		  </div>
	  </div>
  </div>

  

  <div class="row g-5">
    <div class="col-md-12">

      <article class="blog-post">
        <h2 class="blog-post-title"><?=$mhs['Judul'] ?></h2>
        <p class="blog-post-meta"><?=$mhs['Tanggal'] ?> by <?=$mhs['Penulis'] ?></p>

        <p><?= $mhs['Isi']?></p>
    </div>
  </div>


</main>

<footer class="blog-footer">
  <p style="color: black;">Dibuat oleh: Made Reihan | Hulio Jonathan | Rendy Januardi | Vincentius Kevin </p>
</footer>


<script src="js/bootstrap.js"></script>
  </body>
</html>