<?php	
	include "../global/global.php";		
	// jika belum login dilarang masuk ke sini
	if(!isset($_SESSION['custlogin'])){
		header("location: shoppingcart.php");
	}	
	
	$idcust = $_SESSION['custlogin'];	
	// formchooseaddress on submit
	if((isset($_POST['submit'])) or (isset($_POST['submitchoose']))){
		if(isset($_POST['submitchoose'])){
			// choose address on the list
			unset($_SESSION["checkout"]);
			if (!isset($_SESSION["checkout"])){
				$_SESSION["checkout-address"] = array();
			}
			$_SESSION["checkout-address"] = $_POST['address-option'];
			// go to checkout shipping
			header("location: checkout-shipping.php");
		}
		else{
			// create new address
			$pagecall = "checkoutaddress";		
			include "frontcontroller.php";
			if($success=1){
				// get the id address we just saved
				$sql = "SELECT * FROM customeraddress 
						WHERE id_customer='$idcust' 
						ORDER BY id_customeraddress DESC limit 1";
				$query = mysql_query($sql);
				$row = mysql_fetch_array($query);
				
				// save the address into session
				$_SESSION["checkout-address"] = $row['id_customeraddress'];
				// go to next page
				header("location: checkout-shipping.php");
			}
		}
	}
	$pesan="";	
	include "header.php";
?>

<div class="container">
	<div class="front-content checkout">
		<h1>CHECKOUT</h1>
		<div class="ck-breadcrumb">
			<ul>
				<li class="active"><a href="checkout-address.php">Choose Address</a></li>
				<li><a href="checkout-shipping.php">Choose Shipping</a></li>
				<li><a href="checkout-payment.php">Choose Payment</a></li>
			</ul>
		</div>	
		<div class="checkoutstep checkout-address">
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="twocols">
				<div class="form-container">
					<h3>Your Adrress List</h3>
					<p>Please choose the shipping address.</p>
					<form action="checkout-address.php" method="POST" name="formchooseaddress" id="formchooseaddress">
						<ul>
							<?php
								$sql = "SELECT ca.*, d.district_name, c.city_name, p.province_name FROM customeraddress  ca, district d, city c, province p 
								WHERE ca.id_district = d.id_district 
								AND d.id_city = c.id_city 
								AND c.id_province=p.id_province 
								AND id_customer='$_SESSION[custlogin]'
								AND ca.active=1";
								$query = mysql_query($sql);
								while($row=mysql_fetch_array($query)){
									echo '
									<li>
										<label>
											<input type="radio" name="address-option" value="'.$row['id_customeraddress'].'">
											<address>
												<span>'.$row['address_name'].'</span>
												<span>'.$row['address'].'</span>
												<span>'.$row['address2'].'</span>
												<span>'.$row['district_name'].'</span>
												<span>'.$row['city_name'].'</span>
												<span>'.$row['province_name'].' '.$row['postal_code'].'</span>
												<span><b>T </b>: '.$row['address_phone'].'</span>
											</address>
										</label>
									</li>';
								}
							?>
						</ul>
						<input type="submit" name="submitchoose" id="submitchoose" value="CHOOSE">
					</form>
				</div>
				<div>
					<h3>Add new address</h3>
					<p>Add your new shipping address here.</p>
					<?php
					include "form-address.php";	
					?>
				</div>
				<div class="button-next">
					<button type="button" id="buttonnext" class="button-next">NEXT</button>
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
<script type="text/javascript" src="../admin/js/jquery.validate.js"></script>
<script>
// special regex for phone number
jQuery.validator.addMethod("phoneNumber", function(phone_number, element) {
	phone_number = phone_number.replace(/\s+/g, "");
	return this.optional(element) || phone_number.length > 6 && 
	phone_number.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
}, "Please enter a valid phone number");

function selectcity(){
	var idprovince = $("#province").val();	
	$.ajax({		
		url: "../admin/modules/ajaxselectcity.php",
		type: "post",
		data: {idprovince: idprovince},
		success: function (response){ 	
			$("#city")
			.empty()
			.append(response);
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}

function selectdistrict(){
	var idcity = $("#city").val();	
	$.ajax({		
		url: "../admin/modules/ajaxselectdistrict.php",
		type: "post",
		data: {idcity: idcity},
		success: function (response){ 	
			$("#district")
			.empty()
			.append(response);
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}

$(document).ready(function($){
	// highlight
	var elements = $("input[type!='submit'], textarea, select");
	elements.focus(function() {
		$(this).parents('li').addClass('highlight');
	});
	elements.blur(function() {
		$(this).parents('li').removeClass('highlight');
	});
	
	$("#addcustomeraddress").validate({
		rules: {
				addressname: "required",
				customeraddress1: "required",
				phonenumber: {
					required: true,
					minlength: 7,
					phoneNumber: true
				}
			},
			messages: {
				addressname: "Please enter the recipient's name.",
				customeraddress1: "Please enter the destination address.",
				phonenumber: {
					required: "Please enter the recipient's phone number.",
					minlength: "Your phone number must be at least 7 characters long",
					phoneNumber: "Please enter a valid phone number."
				}
			}
	});

	/* hide submit on form new address */
	$("input[type='submit']").hide();
	/* change form add adress action */
	$('#addcustomeraddress').attr('action', 'checkout-address.php');
	
	/* on click button select the form to be submitted */
	$("#buttonnext").click(function(){
		// cek if contact name filled
		if($('#addressname').val().length === 0 ){	
			if(!$("input[name='address-option']").is(':checked')){
				$(".message" ).addClass("error");
				$(".message p" ).text("Please choose an address or create new address.");				
				return false;
			}
			else{		
				$("#submitchoose").click();
			}			
		}
		else{
			$("#submit").click();			
		}	
	});	
	
	/* add new customer address list city */
	$(".city-container").addClass("hidden");	
	$(".district-container").addClass("hidden");	
	$( "#province" ).on('click change', function(){
	  selectcity();
	  $(".city-container").removeClass("hidden");
	});
	$( "#city" ).on('click change', function(){
	  selectdistrict();
	  $(".district-container").removeClass("hidden");
	});	
});
</script>