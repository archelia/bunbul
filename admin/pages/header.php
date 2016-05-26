<html>
<head>
	<title>Viore Shop Administration Page</title>
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
	<link href='https://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link rel="stylesheet" type="text/css" href="../css/baseline.css">
	<link rel="stylesheet" type="text/css" href="../css/layout.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/tablet.css" media="only screen and (max-width: 768px)" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/mobile540.css" media="only screen and (max-width: 540px)" charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/mobile.css" media="only screen and (max-width: 320px)" charset="utf-8">
	
	<link rel="icon" type="image/png" href="../../source/images/favicon.png" />
	<script type="text/javascript" src="../../source/js/jquery-1.8.3.min.js"></script>
	<script type='text/javascript' src="../../source/js/jquery.validate.js"></script>
	<script type='text/javascript' src='../js/ckeditor/ckeditor.js'></script>
	<script type='text/javascript' src='../js/main.js'></script>
	
</head>
<body>
<div class="wrapper">
<header>
	<div class="header-content">
		<a href="../index.php"><h1>VIORE SHOP</h1></a>
	</div>	
	<div class="menu">
		<nav>
			<ul>
				<?php
				if(!isset($_SESSION['viouser'])){
				?>
				<b class="instruction">Administrator Page</b>
				<?php
				}
				else {
				?>
				<li><a href="">Master</a>
					<ul class="sub-menu">
						<li><a href="../pages/listannouncement.php">Announcement</a></li>
						<li><a href="listbank.php">Bank</a></li>
						<li><a href="listbrand.php">Brand</a></li>
						<li><a href="../pages/listcategory.php">Category</a></li>
						<li><a href="listcustomer.php">Customer</a></li>
						<li><a href="../pages/listcolor.php">Color</a></li>
						<li><a href="../pages/listprovince.php">Province &amp; City</a></li>
						
						<li><a href="listreseller.php">Reseller</a></li>
						<li><a href="../pages/listsize.php">Size</a></li>					
					</ul>
				</li>
				<li>
					<a href="">Product</a>
					<ul class="sub-menu">
						<li><a href="../pages/addproduct.php">Add Product</a></li>
						<li><a href="../pages/listproduct.php">Manage Product</a></li>
					</ul>
				</li>
				<li>
					<a href="">Page</a>
					<ul class="sub-menu">
						<li><a href="../pages/listbanner.php">Banner</a></li>
						<li><a href="../pages/listgallery.php">Gallery</a></li>
						<li><a href="../pages/listpage.php">Pages</a></li>
						<!--
						<li><a href="addpage.php">Add New Page</a></li>
						<li><a href="addblock.php">Add New Block</a></li>
						<li><a href="listblock.php">Manage Block</a></li>
						<li><a href="addgallery.php">Add New Gallery</a></li>
						<li><a href="listetstimony.php">Manage Testimony</a></li>
						-->															
					</ul>
				</li>				
				<li>
					<a href="">Order</a>
					<ul class="sub-menu">
						<li><a href="listpaymentmethod.php">Payment Method</a></li>
						<li><a href="listshippingmethod.php">Shipping Method</a></li>
						<li><a href="listorder.php">Manage Order</a></li>
					</ul>
				</li>
				<?php 
				if($_SESSION['viouser']==1){
				?>				
				<li>
					<a href="">Settings</a>
					<ul class="sub-menu">
						<!--<li><a href="shopsetting.php">Shop Settings</a></li>
						<li><a href="listadd.php">Ads</a></li>
						<li><a href="listbanner.php">Banner</a></li>-->
						<li><a href="../pages/listuser.php">User</a></li>
					</ul>
				</li>
				<?php
				}
				?>
				<li>
					<a href="">Account</a>
					<ul class="sub-menu">
						<!-- 
							<li><a href="myaccount.php">My Account</a></li> 
						-->
						<li><a href="../pages/logout.php">Log Out</a></li>
					</ul>
				</li>
				<?php
				}
				?>
			</ul>
		</nav>		
	</div>
</header>