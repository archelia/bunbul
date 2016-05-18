<?php	
	include "../global/global.php";
	include "header.php";	
	$pagecall = "shoppingcart";
	$pesan = "";
	
	include "../modules/cart.php";	
	if(isset($_POST['submitcart'])){
		addtocart();
	}
	elseif(isset($_POST['editcart'])){
		$success = editquantity();
		if($success==0){
			$pesan = "Failed to update cart, this product stock is not sufficient.";
		}		
	}
	elseif(isset($_POST['deletefromcart'])){
		deletefromcart();
	}
?>
<div class="container">
	<div class="front-content shoppingcart">	
		<h1>SHOPPING CART</h1>
		<div class="breadcrumb">
			<ul>
				<li><a href="homepage.php">Home</a></li>
				<li><b>Shopping Cart</b></li>
			</ul>
		</div>
		<div class="message">
			<p><?php if($pesan!=""){ echo $pesan; }?></p>
		</div>
		<div class="cart-table">
			<table width="100%" cellpadding="0" cellspacing="0">
				<colgroup>
					<col width="">
					<col width="20%">
					<col width="15%">
					<col width="10%">
					<col width="20%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Detail Product</th>
						<th>Price</th>
						<th>Quantity</th>
						<th>Subtotal</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>					
				<?php
				// calculate sum			
				$sum = 0;
				if(isset($_SESSION['iditems'])){
					$i=0;
					while ($i<count($_SESSION["iditems"])){
						$sum += $_SESSION['qtys'][$i];
						$i++;
					}
				}
				// if cart empty or total qty = 0
				if((!isset($_SESSION['iditems'])) OR ($sum < 1)){
					echo "<tr>
						<td colspan='6'>Shopping cart is empty</td>
					</tr>";
				}
				else
				{			
					//print_r($_SESSION["iditems"]);					
					//print_r($_SESSION["qtys"]);
					//print_r($_SESSION["weight"]);					
					$i = 0;
					$subtotal = 0;
					while ($i<count($_SESSION["iditems"])){
					if($_SESSION['qtys'][$i]>0){
						// search item name
						$sqlitem = "SELECT i.*, p.product_name, p.product_price, p.product_discount, p.product_discount_active, c.color_name, z.size_name 
						FROM item i, product p, color c, size z 
						WHERE i.id_product = p.id_product 
						AND i.id_size = z.id_size 
						AND i.id_color = c.id_color 
						AND i.id_item = ".$_SESSION["iditems"][$i];
						$query = mysql_query($sqlitem);
						if($query){
							$rowitem = mysql_fetch_array($query);		
							// cek stock of every item in database, if any return false
							?>
							<tr>
								<td align="left">
									<img src="<?php echo "../source/placeholder/".$rowitem['id_product']."-1.jpg";?>" alt="" title="" height="60">
									<h6><?php echo $rowitem['product_name']; ?></h6>
									<p><?php echo "sku : ".$rowitem['barcode']; ?></p>
								</td>
								<td align="center">
									<p><?php echo "Size : ".$rowitem['size_name']; ?></p>
									<p><?php echo "Color : ".$rowitem['color_name']; ?></p>
								</td>
								<td align="right">
									<?php
									$price = $rowitem['product_price'];
									if(($rowitem['product_discount_active']==1) and ($rowitem['product_discount']>0)){
										
										$price = $price - ($price * $rowitem['product_discount']/100);
									}
									echo "Rp. ".$price; ?>
								</td>
								<td align="center">
									<form action="shoppingcart.php" name="editquantity" id="editquantity" method="POST">
										<input type="number" value="<?php echo $_SESSION['qtys'][$i]; ?>" name="quantity" id="quantity">
										<input type="hidden" name="rownumber" id="rownumber" value="<?php echo $i;?>">
										<input type="submit" name="editcart" id="editcart" value="EDIT">
									</form>
								</td>
								<td align="right">
								<?php echo "Rp. ". $_SESSION['qtys'][$i] * $price; ?> </td>
								<td align="center">
									<form action="shoppingcart.php" name="deleteitem" id="deleteitem" method="POST">	
										<label>
											<input type="hidden" name="rownumber" id="rownumber" value="<?php echo $i;?>">
											<input type="submit" name="deletefromcart" id="deletefromcart" value="DELETE">
										</label>
									</form>
								</td>
							</tr>
							<?php	
							$subtotal += $_SESSION['qtys'][$i] * $price;
							}
						}															
					$i++;
					}
				}
				?>						
				</tbody>
			</table>
		</div>				
		<?php
		echo '<div class="cart-total">';			
			if((isset($_SESSION['iditems'])) AND ($sum > 0)){
				echo '<p>Subtotal : Rp. '.$subtotal.'</p>';
				$discount=0;
				//if reseller give extra discount 5%
				if(isset($_SESSION['reseller'])){
					$sqlres = "SELECT id_reseller FROM reseller WHERE id_customer='$row[id_customer]' AND last_purchase > NOW() - INTERVAL 91 DAY";
					$result= mysql_query($sqlres);
					if($result){					
						$rowres = mysql_fetch_array($result);
						$_SESSION['idreseller'] = $rowres['id_reseller'];
						$discount = $subtotal*(5/100);
						echo '<p>Discount : Rp. '.$discount.'</p>';
					}				
				}
				else{
					echo '<p>Discount : Rp. 0</p>';
				}
				echo '<p>Grandtotal : Rp. '.($subtotal-$discount).'</p>';	
			}
		echo "</div>";	
		?>			
		
		<div class="cart-checkout">
			<a href="catalog.php" class="button">CONTINUE SHOPPING</a>
			<a href="checkout.php" class="button">CHECKOUT</a>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php
if($pesan!=""){
	if($success!=1){
		echo '<script>
		$(".message").addClass("error");
		</script>
		';
	}
	else{
		echo '<script>
		$(".message").addClass("valid");
		</script>
		';
	}
}
?>
<?php
	include "footer.php";	
?>