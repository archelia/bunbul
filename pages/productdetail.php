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
			<div class="picture">
				<?php
				if(file_exists("../source/placeholder/".$row['id_product']."-1.jpg")){
					echo '<img src="../source/placeholder/'.$row['id_product'].'-1.jpg" alt="picture" title="picture" class="image-preview">';
				}
				else echo '<img src="../source/images/default.jpg" alt="picture" title="picture" class="image-preview">';			
				?>
			</div>
		</div>
		<div class="col2 detail-box">
			<div class="product-name"><h2><?php echo $row['product_name']; ?></h2></div>
			<div class="product-price">Rp. <?php echo number_format($row['product_price'],0,',','.'); ?></div>
			<div class="product-disc"><?php echo (($row['product_discount_active']=='1')?$row['product_discount'].'%':''); ?></div>
			<div class="product-dimn">
				<h6>PRODUCT DIMENSION</h6>
				<?php echo $row['product_dimension']; ?>
			</div>
			<div class="product-desc">
				<h6>PRODUCT DESCRIPTION</h6>
				<?php echo htmlspecialchars_decode($row['product_description']); ?>
			</div>			
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
<?php
	include "footer.php";	
?>