<?php	
	include "../global/global.php";
	// jika belum login dilarang masuk ke sini
	if(!isset($_SESSION['custlogin'])){
		header("location: checkout-shipping.php");
	}
	
	include "header.php";	
	$pagecall = "checkout-thanks";	
?>
<div class="container">
	<div class="front-content checkout">
		<div class="checkoutstep checkout-success">
			<div class="image">
				<img src="../source/images/checkout-thankyou.jpg" alt="Thank You" title="Thank You">
			</div>
			<div class="editor">
				<article>
					<p>Thank you for shopping with us.</p>
					<p>Your order will be processed immediately within 1 x 24 hours.</p>
				</article>
			</div>
		</div>
	</div>
</div>
<?php
	include "footer.php";
?>