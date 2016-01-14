<?php	
	include "../global/global.php";
	include "header.php";	
	$pagecall = "pdp";
	if(!isset($_GET['pid'])){header("location: 404.php");}
	$sql = "SELECT p.*, c.category_name FROM product p, category c ";
	$sql .= "WHERE p.active=1 ";
	$sql .= "AND p.id_category = c.id_category ";	
	$sql .= "AND p.id_product='$_GET[pid]'";
	
	$result = mysql_query($sql);
	$row=mysql_fetch_array($result);
?>
<div class="container">
	<div class="front-content pdp">	
		<h1>PRODUCT DETAIL</h1>
		<div class="col2 picture-box">
			<div class="picture main-image">
				<?php
				$filename = "../source/placeholder/".$row['id_product']."-1.jpg";
				if(file_exists($filename)){
					echo '<img src="'.$filename.'" alt="picture" title="picture" class="image-preview">';
				}
				else echo '<img class="" src="../source/images/default.jpg" alt="picture" title="picture" class="image-preview">';			
				?>
				<div class="zoom">
					<a href="" class=""></a>
				</div>
			</div>
			<div class="product-images">
				<ul>
					<?php 
					$i = 1;					
					for($i =1; $i<=4; $i++){
						$filename = "../source/placeholder/".$row['id_product']."-".$i.".jpg";
						if(file_exists($filename)){
							echo '<li class="img-thumb"><a href=""><img src="'.$filename.'" alt="picture" title="picture"></a></li>';
						}
						$i++;
					}
					?>				
				</ul>
			</div>
			<div class="detail-box">
				<div class="product-desc">
					<?php echo htmlspecialchars_decode($row['product_description']); ?>
				</div>	
			</div>			
		</div>
		<div class="col2 detail-box">
			<div class="product-name"><h2><?php echo $row['product_name']; ?></h2></div>
			<div class="product-price">			
				<?php
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
				?>
				</span>
			</div>
			<div class="product-small-block">
				<h6>PRODUCT DIMENSION</h6>
				<?php echo $row['product_dimension']; ?>
			</div>						
				<?php
				//searching available colors
				$sqlload = "SELECT distinct i.id_color, c.color_name, c.html_code FROM item i, color c 
							WHERE i.id_color = c.id_color 
							AND id_product='$row[id_product]'";
				$queryload = mysql_query($sqlload);	
				if(mysql_num_rows($queryload)>0){
					echo "<div class='product-small-block'>";
					echo "<h6>AVAILABLE COLORS</h6>";
					while($rowld=mysql_fetch_array($queryload)){
						echo "<span class='size' style='background: #".$rowld['html_code'].";'>".$rowld['color_name']."</span>";
					}
					echo "</div>";
				}		
				
				//searching available size
				$sqlload = "SELECT distinct s.id_size, s.size_name FROM item i, size s 
							WHERE i.id_size = s.id_size
							AND id_product='$row[id_product]'";
				$queryload = mysql_query($sqlload);	
				if(mysql_num_rows($queryload)>0){
					echo "<div class='product-small-block'>";
					echo "<h6>AVAILABLE SIZE</h6>";
					while($rowld=mysql_fetch_array($queryload)){
						echo "<span class='color'>".$rowld['size_name']."</span>";
					}
					echo "</div>";
				}		
				?>				
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<div class="zoom-layer">
		<img src="../source/images/default.jpg" alt="zoom image" title="zoom image">
		<a class="close-button close-zoom"></a>
	</div>
</div>
<?php
	include "footer.php";	
?>
<script type='text/javascript'>
	$(document).ready(function($){		
		$('.img-thumb img').click(function(e){
			e.preventDefault();		
			var tmp= $(this).prop('src');
			$('.main-image img').stop().animate({opacity:'0'},function(){
				$('.main-image img').attr('src',tmp);
			}).load(function(){
				$('.main-image img').stop().animate({opacity:'1'});
			});		
			$(".img-thumb").removeClass("selected");
			$(this).parents('.img-thumb').addClass("selected");
			//$('.main-image img').attr('src',$(this).prop('src'));
		});		
		$('.close-zoom').click(function(){
			$(".zoom-layer").css("display", "none");
			$("html").removeClass("scrol-disabled");
			$("body").removeClass("scrol-disabled");
		});
		$('.zoom a').click(function(e){
			e.preventDefault();
			$(".zoom-layer").css("display", "block");
			$('.zoom-layer img').attr('src',$('.main-image img').prop('src'));
			$("html").addClass("scrol-disabled");
			$("body").addClass("scrol-disabled");
		});
	});
</script>