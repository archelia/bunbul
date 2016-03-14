<?php	
	include "../global/global.php";
	include "header.php";	
?>
<!-- slick Slider file -->
<link href='../source/css/slick.css' rel='stylesheet' type='text/css'>
<link href='../source/css/slick-theme.css' rel='stylesheet' type='text/css'>
<div class="container main">
	<div class="mainslide">
		<?php
		$sbanner = "SELECT * FROM banner WHERE active=1 ORDER BY date_created DESC ";
		$qbanner = mysql_query($sbanner);
		
		while($rowb = mysql_fetch_array($qbanner)){
			echo '<div class="banner-block">
					<div class="pic-block">';
			echo '<a href="'.$rowb['banner_url'].'"><img src="../source/banner/'.$rowb['id_banner'].'-1.jpg" alt="">';
			echo '</a>';
			echo '</div>
				</div>';
		}
		?>
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