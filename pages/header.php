<html>
<head>
	<title>Viore Shop</title>
	<meta name="google-site-verification" content="0KuN4rZd10SMSC9WXzZksql_a2SlzMTe-WqoIFSZ_C0" />
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Viore Shop">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:site_name" content="Viore Shop">
	<meta property="og:url" content="">
	<meta property="description" content="Viore Shop">
	<meta property="og:type" content="website">
	<meta property="og:description" content="Viore Shop">
	<meta property="og:title" content="Viore Shop">
	<link rel="icon" type="image/png" href="../source/images/favicon.png" />
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../source/css/reset.css">
	<link rel="stylesheet" type="text/css" href="../source/css/baseline.css">
	<link rel="stylesheet" type="text/css" href="../source/css/layout.css">
	<link rel="stylesheet" type="text/css" href="../source/css/main.css">
	<link rel="stylesheet" type="text/css" href="../source/css/mobile.css" media="only screen and (max-width: 770px)" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../source/css/mobile540.css" media="only screen and (max-width: 540px)" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../source/css/mobile360.css" media="only screen and (max-width: 360px)" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../source/css/mobile320.css" media="only screen and (max-width: 320px)" charset="utf-8">		
	<script type="text/javascript" src="../source/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="../source/js/slick.js"></script>
	<script type="text/javascript" src="../source/js/main.js"></script>
</head>
<body>
<div class="wrapper">
	<header>
		<div class="header-content">
			<nav class="desktop">
				<ul>
					<li><a href="homepage.php">Home</a></li>
					<?php 
					$sqcat = "SELECT c.id_category, c.category_name, COUNT(id_product) as jumlah
							FROM product p, category c
							WHERE c.id_category=p.id_category
							GROUP by id_category
							ORDER by jumlah DESC";
					$qcat = mysql_query($sqcat." LIMIT 3");
					while ($rowcat = mysql_fetch_array($qcat)){
						echo '<li><a href="catalog.php?cat='.$rowcat['category_name'].'">'.$rowcat['category_name'].'</a></li>';
					}
					?>
					<li><a href="gallery.php">Gallery</a></li>
					<li><a href="page.php?page=exhibition">Exhibition</a></li>
					<li><a href="page.php?page=about">About</a></li>
					<li><a href="page.php?page=contact">Contact Us</a></li>
				</ul>
			</nav>
			<div class="mobile-header">
				<div class="mobile-menu-icon"><a href="#"></a></div>
				<div class="mobile-logo">
					<a href="homepage.php">
						<h1>VIORE SHOP</h1>
					</a>
				</div>
			</div>
			<nav class="mobile">
				<ul>
					<li><a href="homepage.php">Home</a></li>
					<?php
					$qcat = mysql_query($sqcat);
					while ($rowcat = mysql_fetch_array($qcat)){
						echo '<li><a href="catalog.php?cat='.$rowcat['category_name'].'">'.$rowcat['category_name'].'</a></li>';
					}
					?>
					<li><a href="gallery.php">Gallery</a></li>
					<li><a href="page.php?page=exhibition">Exhibition</a></li>
					<li><a href="page.php?page=about">About</a></li>
					<li><a href="page.php?page=contact">Contact Us</a></li>
				</ul>
			</nav>
		</div>	
	</header>