<?php	
	include "../global/global.php";
	// jika belum login dilarang masuk ke sini
	if(!isset($_SESSION['custlogin'])){
		header("location: shoppingcart.php");
	}

	// processing form submit
	if(isset($_POST['submit'])){
		$_SESSION['checkout-shipping'] = $_POST["shippingmethod"];
		header("location: checkout-payment.php");
	}
	
	$pagecall = "checkout-shipping";	
	$pesan="";	
	include "header.php";	
?>
<div class="container">
	<div class="front-content checkout">
		<h1>CHECKOUT</h1>
		<div class="ck-breadcrumb">
			<ul>
				<li class="active"><a href="checkout-address.php">Choose Address</a></li>
				<li class="active"><a href="checkout-shipping.php">Choose Shipping</a></li>
				<li><a href="checkout-payment.php">Choose Payment</a></li>
			</ul>
		</div>	

		<div class="checkoutstep checkout-shipping">
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<?php			
			
			?>
			<form action="checkout-shipping.php" method="POST" name="formchooseshipping" id="formchooseshipping">
			<div class="twocols">
				<div class="form-container">				
					<ul class="listing list-shipping">
						<?php
						// list of shipping method
						$sql = "SELECT * FROM shippingmethod WHERE active=1";
						$query = mysql_query($sql);
						while($rows=mysql_fetch_array($query)){
							echo '<li>
									<label>';
							echo '<input type="radio" name="shippingmethod" id="shippingmethod" value="'.$rows['id_shippingmethod'].'">
								<div class="info">
									<p>'.$rows['method_title'].'</p>
								</div>';
							echo '</label>
								</li>';
						}
						?>
					</ul>
				</div>
				<div>
				<?php
				// got the adddress id
				$idadd = $_SESSION['checkout-address'];												
				// show detail of the choosen address
				$sql = "SELECT ca.*, d.district_name, c.city_name, 		p.province_name FROM customeraddress  ca, district d, city c, province p 
					WHERE ca.id_district = d.id_district 
					AND d.id_city = c.id_city 
					AND c.id_province=p.id_province 
					AND id_customeraddress='$idadd'";
				$query = mysql_query($sql);
				$row=mysql_fetch_array($query);
					echo '
					<div class="address-detail">
						<h6>Shipping Address</h6>
						<address>
							<span>'.$row['address_name'].'</span>
							<span>'.$row['address'].'</span>
							<span>'.$row['address2'].'</span>
							<span>'.$row['district_name'].'</span>	
							<span>'.$row['city_name'].'</span>	
							<span>'.$row['province_name'].' '.$row['postal_code'].'</span>
							<span class="phone"><b>T </b>: '.$row['address_phone'].'</span>						
						</address>
					</div>';								
				?>					
				</div>
				<div class="clear"></div>
			</div>	
			<div class="button-collection">
				<div class="left">
					<button type="button" id="button-back" class="button button-back" onclick="newDoc()">BACK</button>
				</div>
				<div class="right">
					<input type="submit" name="submit" id="submit" value="NEXT">
				</div>
				<div class="clear"></div>
			</div>
			</form>
		</div>
		
	</div>
</div>
<?php
	include "footer.php";	
?>
<script>
function newDoc() {
    window.location.assign("checkout-address.php")
}
$(document).ready(function($){
	$("input:radio[name='shippingmethod']:first").attr('checked', true);
	$("#submit").click(function(){
		if(!$("input[name='shippingmethod']").is(':checked')){
			$(".message" ).addClass("error");
			$(".message p" ).text("Please choose a shipping method.");	
			return false;
		}
	});
});
</script>