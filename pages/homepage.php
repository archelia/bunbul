<?php	
	include "../global/global.php";
	include "header.php";	
?>
<!-- slick Slider file -->
<link href='../source/css/slick.css' rel='stylesheet' type='text/css'>
<link href='../source/css/slick-theme.css' rel='stylesheet' type='text/css'>
<div class="container main">
	<div class="mainslide">
		<div class="banner-block">
			<div class="pic-block">
				<img src="../source/banner/banner2.jpg" alt="">
			</div>
		</div>
		<div class="banner-block">
			<div class="pic-block">
				<img src="../source/banner/banner3.jpg" alt="">
			</div>
		</div>
		<div class="banner-block">
			<?php
			/*
			<div class="word-block">
				<h3></h3>
				<h3>Extra Comfortable</h3>
				<h3>Reasonable Price</h3>
				<a href="catalog.php" class="button">See More</a>
			</div>
			*/
			?>			
			<div class="pic-block">
				<img src="../source/banner/banner1.jpg" alt="">
			</div>
		</div>	
	</div>
</div>
<?php
	include "footer.php";	
?>
<!-- jQuery -->
<script src="../source/js/slick.js"></script>
<script>
$(document).ready(function(){
  $('.mainslide').slick({
	  arrows: false,
	  dots: true,
	  autoplay: true
  });
});
</script>