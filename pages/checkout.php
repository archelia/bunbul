<?php	
	include "../global/global.php";	
	// cek if already login go to step 2
	if(isset($_SESSION['custlogin'])){
		$_SESSION['checkout']="checkout-address";
		header("location: checkout-address.php");
	}
	
	// check if cart not empty, go back to shopping cart
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
		header("location: shoppingcart.php");
	}
	
			
	// if there's a POST[pagecall] change pagecall to login
	$pagecall = "register";
	if(isset($_POST['pagecall'])){$pagecall=$_POST['pagecall'];}
	include "header.php";	
	include "frontcontroller.php";
?>
<div class="container">
	<div class="front-content checkout">
		<h1>CHECKOUT</h1>
		<div class="ck-breadcrumb">
			<ul>
				<li><a href="">Choose Address</a></li>
				<li><a href="">Choose Shipping</a></li>
				<li><a href="">Choose Payment</a></li>
			</ul>
		</div>	
		<div class="checkoutstep checkout-login">
			<div class="twocols">
				<div>
					<h3>Please register</h3>
					<p>It's quick and easy.</p>
					<?php
					include "form-register.php";	
					?>
				</div>
				<div>
					<h3>Already registered?</h3>
					<p>If you're already have an account, please login.</p>
					<?php
					include "form-login.php";	
					?>
				</div>
				<div class="clear"></div>
			</div>
		<?php
		
		?>
		</div>
	</div>
</div>
<?php
	include "footer.php";	
?>
<script>
$(document).ready(function($){	
	/* turn off forgot register link */
	$(".not-member").hide();
	/* append hidden input pagecall inside login form */
	$( ".not-member").parent().append("<input type='hidden' name='pagecall' id='pagecall' value='login'>" );
});
</script>