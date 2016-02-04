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
				<a href="catalog.php?cat=tshirt"><img src="../source/banner/banner2.jpg" alt=""></a>
			</div>
		</div>
		<div class="banner-block">
			<div class="pic-block">
				<a href="catalog.php?cat=shoes"><img src="../source/banner/banner3.jpg" alt=""></a>
			</div>
		</div>
		<div class="banner-block">		
			<div class="pic-block">
				<a href=""><img src="../source/banner/banner1.jpg" alt=""></a>
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