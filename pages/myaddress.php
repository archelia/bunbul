<?php
include "../global/global.php";
if(isset($_SESSION['custmyaccount'])){header("location: homepage.php");}
include "header.php";	
$pagecall = "myaddress";
include "frontcontroller.php";	

$idcust = $_SESSION['custlogin'];
if(isset($_GET['act'])){
	if($_GET['act']=="chg"){
		if($_GET['id'] != ""){
			$id=$_GET['id'];
			$action = "change";
			$qload = "SELECT * FROM customeraddress WHERE id_customeraddress='$id'";
			$rload = mysql_query($qload);
			if(mysql_num_rows($rload)>0){
				$row = mysql_fetch_array($rload);
			}
			else{
				header("location: myaddress.php");
			}
		}
		else{
			header("location: myaddress.php");
		}
	}
}
?>
<div class="container">
	<div class="front-content myaddress">
		<h1>MY ADDRESS</h1>
		<div class="breadcrumb">
			<ul>
				<li><a href="homepage.php">Home</a></li>
				<li><b>My Account Info</b></li>
			</ul>
		</div>
		<?php
			include "myaccountlinks.php";
		?>
		<div class="message">
			<p><?php if($pesan!=""){ echo $pesan; }?></p>
		</div>
		<div class="twocols">
			<div class="address-col">
			<?php
			// list all address
			$sqladdress = "
					SELECT ca.*, d.district_name, c.city_name, p.province_name FROM customeraddress  ca, district d, city c, province p 
					WHERE ca.id_district = d.id_district 
					AND d.id_city = c.id_city 
					AND c.id_province = p.id_province 
					AND id_customer=$_SESSION[custlogin] 
					AND ca.active=1 
					ORDER BY shipping_address DESC, billing_address DESC";
				$result = mysql_query($sqladdress);
				if(($result)&&(mysql_num_rows($result)>0)){
					while($rowa=mysql_fetch_array($result)){
						echo "
						<div class='address-block'>";
						echo "
							<h5>$rowa[address_name]</h5>
							<address>
								<span>$rowa[address]</span>
								<span>$rowa[address2]</span>
								<span>$rowa[city_name]</span>
								<span>$rowa[district_name]</span>
								<span>$rowa[province_name] $rowa[postal_code]</span>
								<span class='phone'><b>T </b>: $rowa[address_phone]</span>			
							</address>
							";						
						echo "
							<div class='default-address'>";
							if($rowa['shipping_address']=='1'){
								echo "<p>&#10003; shipping address</p>";
							}
							if($rowa['billing_address']=='1'){
								echo "<p>&#10003; billing address</p>";
							}
															
						echo"</div>";
						echo "						
							<div class='edit-address'>
							<a href='myaddress.php?act=chg&id=$rowa[id_customeraddress]' class='small-button edit-button'>Edit</a>
							<a href='../admin/pages/deactive.php?id=$rowa[id_customeraddress]&pageorigin=$pagecall&idcust=$rowa[id_customer]' class='small-button del-button' onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a>
						</div>
						</div>";		
					}
				}
			?>
			</div>
			<div class="address-col">
				<h5>Add New Address</h5>
				<?php
					include "form-address.php";	
				?>
			</div>
			<div class="clear"></div>
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


$(function() {
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