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
	<div class="seo twocols">
		<div class="editor">
			<h5>KEBUTUHAN FASHION PRIA &amp; WANITA SAAT INI</h5>
			<article>
				<p>Seiring dengan perkembangan jaman, <strong>fashion pria</strong> maupun <strong>fashion wanita</strong> juga ikut berkembang. <strong>Fashion wanita</strong> dan <strong>fashion pria</strong> meliputi <strong>sepatu fashion</strong> wanita, gelang, jam tangan fashion, <strong>t-shirt pria</strong>, <strong>t-shirt wanita</strong>, dan lain-lain. Vioreshop menyediakan berbagai kebutuhan <strong>fashion pria</strong> dan <strong>fashion wanita.</strong> <strong>Style</strong> masa kini menjadi <strong>fashion style</strong> Viore Shop, dengan mengikuti <strong>trend fashion</strong>, fokus kepada <strong>fashion wanita</strong>, Vioreshop memiliki produk unggulan Sinful yaitu <strong>sepatu</strong> fashion wanita contohnya wedges, high heels, sepatu flat atau flat shoes. Ada pula <strong>kaos premium</strong>, baju kasual dan sebagainya.</p>
			</article>
		</div>
		<div class="editor">
			<h5>BELANJA DI VIORESHOP</h5>
			<strong></strong>
			<article>
				<p>Vioreshop.com menyediakan toko online <strong>fashion wanita</strong> maupun <strong>fashion pria</strong>. Kualitas terbaik dari kami dan juga <strong>belanja aman</strong> menjadi motto Vioreshop.com. <strong>Premium quality</strong> <strong>T-Shirt</strong> dan <strong>sepatu wanita</strong> menjadi fokus utama penjualan Vioreshop. Vioreshop merupakan toko online Jakarta yang menjual <strong>sandal wanita</strong> dan <strong>sepatu wanita</strong> serta kaos premium Jakarta. Dapatkan <strong>gaya busana</strong> yang sesuai fashion trend saat ini. Tidak hanya sepatu dan T-shirt, jam tangan kasual untuk <strong>fashion wanita</strong> dan <strong>fashion pria</strong> juga ada di toko online fashion Vioreshop.com.</p>
			</article>
		</div>
		<div class="clear"></div>
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
		  breakpoint: 770,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 3,
		  }
		},
		{
		  breakpoint: 550,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2
		  }
		},
		{
		  breakpoint: 370,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
	]
	});
});
</script>