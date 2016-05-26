<?php	
	include "../global/global.php";	 
	// if not login, redirect to cart
	if(!isset($_SESSION['custlogin'])){
		header("location: shoppingcart.php");
	}
	$pagecall = "checkout-final";
	include "frontcontroller.php";
	include "header.php";
?>
<div class="container">
	<div class="front-content checkout">
		<h1>CHECKOUT</h1>
		<div class="ck-breadcrumb">
			<ul>
				<li class="active">
					<a href="checkout-address.php">Choose Address</a>
				</li>
				<li class="active">
					<a href="checkout-shipping.php">Choose Shipping</a>
				</li>
				<li class="active">
					<a href="checkout-payment.php">Choose Payment</a>
				</li>
			</ul>
		</div>	
		<div class="checkoutstep checkout-payment">
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			
			<div class="form-container">
				<form action="checkout-payment.php" method="POST" name="formchoosepayment" id="formchoosepayment">
				<ul class="listing list-payment">
				<?php
				// list of the payment method listed
					$sql = "SELECT * FROM paymentmethod WHERE active=1";
					$query = mysql_query($sql);
					while($row=mysql_fetch_array($query)){
						echo '
						<li>
							<label>
							<input type="radio" name="paymentmethod" value="'.$row['id_paymentmethod'].'">
							<div class="info">
								<h5>'.$row['method_title'].'</h5>
								'.htmlspecialchars_decode($row['description']).'
							</div>	
							</label>
						</li>';
					}
				?>
				</ul>
				<input type="submit" name="submit" id="submit" value="SUBMIT">
				</form>
			</div>
			<div class="detail-order-info">
				<h5>Detail Order</h5>
				<div class="cart-table">
					<table width="100%" cellpadding="0" cellspacing="0">
						<colgroup>
							<col width="">
							<col width="20%">
							<col width="15%">
							<col width="10%">
							<col width="20%">
						</colgroup>
						<thead>
							<tr>
								<th>Product Name</th>
								<th>Detail Product</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Subtotal</th>
							</tr>
						</thead>
						<tbody>					
						<?php
						// calculate sum			
						$sum = 0;
						$weight = 0;
						if(isset($_SESSION['iditems'])){
							$i=0;
							while ($i<count($_SESSION["iditems"])){
								$sum += $_SESSION['qtys'][$i];
								$weight += $_SESSION['weight'][$i];
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
											<?php echo "Rp. ".$rowitem['product_price']; ?>
										</td>
										<td align="center">
											<?php echo $_SESSION['qtys'][$i]; ?>
										</td>
										<td align="right"><?php echo "Rp. ". number_format(($_SESSION['qtys'][$i] * $rowitem['product_price']),0,",","."); ?> </td>
									</tr>
									<?php	
									$subtotal += $_SESSION['qtys'][$i] * $rowitem['product_price'];
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
						echo '<p><span>Subtotal : </span><span>Rp. '.number_format($subtotal,0,",",".").'</span></p>';
						echo '<div class="clear"></div>';
						$discount=0;
						//if reseller give extra discount 5%
						if(isset($_SESSION['reseller'])){
							$sqlres = "SELECT id_reseller FROM reseller WHERE id_customer='$row[id_customer]' AND last_purchase > NOW() - INTERVAL 91 DAY";
							$result= mysql_query($sqlres);
							if($result){					
								$rowres = mysql_fetch_array($result);
								$_SESSION['idreseller'] = $rowres['id_reseller'];
								$discount = $subtotal*(5/100);
								echo '<p><span>Discount : </span><span>Rp. '.number_format($discount,0,",",".").'</span></p>';
							}				
						}
						else{
							echo '<p><span>Discount : </span><span>Rp. 0</span></p>';
						}
						echo '<div class="clear"></div>';
						// calculating grandtotal						
						$sqlkota = "SELECT ca.*, d.postal_fee as ongkir 
									FROM customeraddress ca, district d 
									WHERE ca.id_customeraddress = ".$_SESSION['checkout-address'].
									" AND ca.id_district=d.id_district ";
						$query = mysql_query($sqlkota);						
						if($query){
							$row = mysql_fetch_array($query);
							$ongkos = ($weight*$row['ongkir']);
							// set the minimal postal fee 15000, if more then 15k 
							if ($ongkos == 0){$ongkos = 15000;} 
							
							$_SESSION['total-item'] = $sum;
							$_SESSION['ongkir'] = $ongkos;
							$_SESSION['subtotal'] = $subtotal;
							$_SESSION['discount'] = $discount;
							$_SESSION['grandtotal'] = ($subtotal-$discount+$ongkos);
						}
						
						// hitung ongkir dari harga jne * berat total barang
						echo '<p><span>Shipping Cost : </span><span>Rp. '.number_format($ongkos,0,",",".").'</span></p>';
						echo '<div class="clear"></div>';
						echo '<p><span>Grandtotal : </span><span>Rp. '.number_format(($subtotal-$discount+$ongkos),0,",",".").'</span></p>';
						echo '<div class="clear"></div>';
					}
				echo "</div>";	
				?>		
			</div>
			<div class="button-collection">
				<div class="left">
					<button type="button" id="button-back" class="button button-back" onclick="newDoc()">BACK</button>
				</div>
				<div class="right">
					<button type="button" name="buttonnext" id="buttonnext" class="button">NEXT</button>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
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
<script>
function newDoc() {
    window.location.assign("checkout-shipping.php")
}
$(document).ready(function($){
	//$("input:radio[name='shippingmethod']:first").attr('checked', true);
	$("input[type='submit']").hide();
	$("#buttonnext").click(function(){
		$("#submit").click();
	});	
	$("#submit").click(function(){
		if(!$("input[name='paymentmethod']").is(':checked')){
			$(".message" ).addClass("error");
			$(".message p" ).text("Please choose a payment method.");	
			return false;
		}
	});
});
</script>