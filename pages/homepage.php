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
	<div class="new-arrival">
		<?php
		// for shoes
		$sql1 = "SELECT p.*, c.category_name FROM product p, category c ";
		$sql1 .= "WHERE p.active=1 ";
		$sql1 .= "AND p.id_category = c.id_category ";	
		$sql1 .= "AND p.id_category = 1 ";	
		$sql1 .= "ORDER BY date_created DESC LIMIT 20";
		
		$ques1 = mysql_query($sql1);
		if(mysql_num_rows($ques1)>0){
			
			echo "<div class='slide1 slider'>";
			echo "<h2>SHOES NEW ARRIVAL</h2>";
			while ($row=mysql_fetch_array($ques1))
			{
				echo '<div class="product-block">';	
				
				echo '<div class="product-pic">';
				if(file_exists("../source/placeholder/".$row['id_product']."-1.jpg")){
					echo '<a href="productdetail.php?pid='.$row['id_product'].'"><img src="../source/placeholder/'.$row['id_product'].'-1.jpg" alt="picture" title="picture" class="image-preview"></a>';
				}
				else echo '<a href="productdetail.php?pid='.$row['id_product'].'"><img src="../source/images/default.jpg" alt="picture" title="picture" class="image-preview"></a>';
				echo '</div>';
				
				echo '<div class="product-name"><a href="productdetail.php?pid='.$row['id_product'].'"><h3>'.$row['product_name'].'</h3></a></div>';
						
				// product price
				echo '<div class="product-price">';				
				if($row['product_discount_active']=='1'){
					$price = $row["product_price"] - ($row['product_discount']/100*$row["product_price"]);
					echo '<span class="before">
							Rp. '.number_format($row["product_price"],0,",",".").
						'</span>';
				}
				else{
					$price = $row["product_price"];
				}
				echo '<span>Rp. '.number_format($price,0,",",".").'</span>'; 
				echo '</div>';			
														
				echo '</div>';
			}			
			echo "</div>";			
		}
		?>
	</div>
	
	<div class="new-arrival">
		<?php
		// for t-shirt
		$sql1 = "SELECT p.*, c.category_name FROM product p, category c ";
		$sql1 .= "WHERE p.active=1 ";
		$sql1 .= "AND p.id_category = c.id_category ";	
		$sql1 .= "AND p.id_category = 2 ";	
		$sql1 .= "ORDER BY date_created DESC LIMIT 20";
		
		$ques1 = mysql_query($sql1);
		if(mysql_num_rows($ques1)>0){
			echo "<div class='slide1 slider'>";
			echo "<h2>T-SHIRT NEW ARRIVAL</h2>";
			while ($row=mysql_fetch_array($ques1))
			{
				echo '<div class="product-block">';	
				
				echo '<div class="product-pic">';
				if(file_exists("../source/placeholder/".$row['id_product']."-1.jpg")){
					echo '<a href="productdetail.php?pid='.$row['id_product'].'"><img src="../source/placeholder/'.$row['id_product'].'-1.jpg" alt="picture" title="picture" class="image-preview"></a>';
				}
				else echo '<a href="productdetail.php?pid='.$row['id_product'].'"><img src="../source/images/default.jpg" alt="picture" title="picture" class="image-preview"></a>';
				echo '</div>';
				
				echo '<div class="product-name"><a href="productdetail.php?pid='.$row['id_product'].'"><h3>'.$row['product_name'].'</h3></a></div>';
						
				// product price
				echo '<div class="product-price">';				
				if($row['product_discount_active']=='1'){
					$price = $row["product_price"] - ($row['product_discount']/100*$row["product_price"]);
					echo '<span class="before">
							Rp. '.number_format($row["product_price"],0,",",".").
						'</span>';
				}
				else{
					$price = $row["product_price"];
				}
				echo '<span>Rp. '.number_format($price,0,",",".").'</span>'; 
				echo '</div>';			
														
				echo '</div>';
			}					
			echo "</div>";	
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
	  fade: true,
	  speed: 500,
	  cssEase: 'linear',
	  autoplay: true
  });
  $('.slider').slick({
	  infinite: true,
	  autoplay: false,
	  slidesToShow: 4,
	  slidesToScroll: 4,
	  responsive: [
		{
		  breakpoint: 768,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
		  }
		},
		{
		  breakpoint: 540,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
	]
	});
});
</script>