<?php	
	include "../global/global.php";
	if(!isset($_POST['submit'])){
		if(isset($_SESSION['custlogin'])){header("location: homepage.php");}
	}			
	$pagecall = "register";
	include "frontcontroller.php";	
	
	// if register is from checkout redirect to checkout, also double check if cart is not empty
	if(isset($_POST['submit'])){		
		$sum = 0;
		if(isset($_SESSION['iditems']) AND $success==1){
			$i=0;
			while ($i<count($_SESSION["iditems"])){
				$sum += $_SESSION['qtys'][$i];
				$i++;
			}
			if($sum>0){header("location: checkout.php");}	
		}		
	}
	include "header.php";
?>
<div class="container">
	<div class="front-content mini-content register">			
		<h1>REGISTER</h1>
		<div class="message">
			<p><?php if($pesan!=""){ echo $pesan; }?></p>
		</div>
		<?php
		include "form-register.php";	
		?>
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
<script type="text/javascript" src="../admin/js/jquery.validate.js"></script>
<script>
// special regex for phone number
jQuery.validator.addMethod("phoneNumber", function(phone_number, element) {
	phone_number = phone_number.replace(/\s+/g, "");
	return this.optional(element) || phone_number.length > 6 && 
	phone_number.match(/^((\+[1-9]{1,4}[ \-]*)|(\([0-9]{2,3}\)[ \-]*)|([0-9]{2,4})[ \-]*)*?[0-9]{3,4}?[ \-]*[0-9]{3,4}?$/);
}, "Please enter a valid phone number");

$(function() {
	// highlight
	var elements = $("input[type!='submit'], textarea, select");
	elements.focus(function() {
		$(this).parents('li').addClass('highlight');
	});
	elements.blur(function() {
		$(this).parents('li').removeClass('highlight');
	});
	$("#addcustomer").validate({
		rules: {
				customername: "required",
				customeremail: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 6
				},
				password1: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				},
				phonenumber: {
					required: true,
					minlength: 7,
					phoneNumber: true
				}
			},
			messages: {
				customername: "Please enter your firstname",
				email: "Please enter a valid email address",
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				password1: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				},
				phonenumber: {
					required: "Please enter the recipient's phone number.",
					minlength: "Your phone number must be at least 7 characters long",
					phoneNumber: "Please enter a valid phone number."
				}
			}
	});
	
});
</script>
<script>
function adjustdayoftheyear(){
	var month = $("#month").val();	
	var year = $("#year").val();
	$.ajax({		
		url: "../admin/modules/ajaxadjustdate.php",
		type: "post",
		data: {month: month, year: year},
		success: function (response){ 	
			$("#day")
			.empty()
			.append(response);
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}
$(function(){
	$( ".bdate #year" ).change(function() {
	  adjustdayoftheyear();
	});
	$( ".bdate #month" ).change(function() {
	  adjustdayoftheyear();
	});
});
</script>