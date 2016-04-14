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
					SELECT ca.*, c.city_name, p.province_name FROM customeraddress  ca, city c, province p 
					WHERE ca.id_city = c.id_city 
					AND c.id_province = p.id_province 
					AND id_customer=$_SESSION[custlogin] 
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
								<span>$rowa[province_name]</span>
								<span class='phone'>$rowa[address_phone]</span>			
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
							<a href='../admin/pages/deletion.php?id=$rowa[id_customeraddress]&pageorigin=$pagecall&idcust=$rowa[id_customer]' class='small-button del-button' onclick=\"return confirm('Are you sure you want to delete this item?');\">Delete</a>
						</div>
						</div>";		
					}
				}
			?>
			</div>
			<div class="address-col">
				<h5>Add New Address</h5>
				<div class="form-container">
					<form action="myaddress.php" name="addcustomeraddress" id="addcustomeraddress" method="POST">
						<ul>
							<li>
								<label for="addressname">Contact Name<em>*</em></label>
								<input type="text" name="addressname" id="addressname" class="required" maxlength="256" placeholder="Contact Name" value="<?php if(isset($action)) echo $row['address_name']; ?>">
								<label for="addressname" class="error">This is a required field.</label>
							</li>
							<li>
								<label for="customeraddress1">Customer Address<em>*</em></label>
								<input type="text" name="customeraddress1" id="customeraddress1" class="required" maxlength="256" style="margin-bottom: 10px;" placeholder="Address Line 1" value="<?php if(isset($action)) echo $row['address']; ?>">
								<input type="text" name="customeraddress2" id="customeraddress2" class="required" maxlength="256" placeholder="Address Line 2" value="<?php if(isset($action)) echo $row['address2']; ?>">
								<label for="customeraddress1" class="error"></label>
							</li>
							<li>
								<label for="phonenumber">Phone Number<em>*</em></label>
								<input type="text" name="phonenumber" id="phonenumber" class="required" maxlength="256" style="margin-bottom: 10px;" placeholder="Customer Phone Number" value="<?php if(isset($action)) echo $row['address_phone']; ?>">
								<label for="phonenumber" class="error"></label>
							</li>
							<li>
								<label for="">Province<em>*</em></label>
								<select name="province" id="province">
									<?php
									// search id province
									echo $sqlprov = "SELECT p.id_province 
										FROM province p, city c 
										WHERE p.id_province=c.id_province 
										AND id_city='$row[id_city]'";
									$rowprov = mysql_fetch_array(mysql_query($sqlprov));
									
									$sqlisting = "SELECT * FROM province ORDER BY province_name ASC";
									$reslist =mysql_query($sqlisting);
									while($rowlist = mysql_fetch_array($reslist)){
										echo "<option value='$rowlist[id_province]'";
										if($rowprov['id_province']==$rowlist['id_province'])echo " selected";
										echo ">$rowlist[province_name]</option>";}
									?>
								</select>
								<label for="" class="error"></label>
							</li>
							<li class="city-container <?php echo ((isset($action))?"shown":"");?>">
								<label for="">City<em>*</em></label>
								<select name="city" id="city">	
									<?php
									if(isset($action)){
										$sqlisting = "SELECT * FROM city ORDER BY city_name ASC";
										$reslist =mysql_query($sqlisting);
										while($rowlist = mysql_fetch_array($reslist)){
										echo "<option value='$rowlist[id_city]'";
										if($row['id_city']==$rowlist['id_city'])echo " selected";
										echo ">$rowlist[city_name]</option>";}
									}
									?>
								</select>
								<label for="" class="error"></label>
							</li>	
							<li>
								<label for="postalcode">Postal Code<em>*</em></label>
								<input type="text" name="postalcode" id="postalcode" class="required" maxlength="256" placeholder="Postal Code" value="<?php if(isset($action)) echo $row['postal_code']; ?>">
								<label for="postalcode" class="error">This is a required field.</label>
							</li>
							<li>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="shippingaddress" id="shippingaddress" class="" maxlength="2" value="1" <?php if(isset($action)){ if($row['shipping_address']==1)echo "checked";}; ?>>
										<span></span>
										Set as default shipping address
									</label>
								</div>	
							</li>
							<li>
								<div class="checkbox">
									<label>
										<input type="checkbox" name="billingaddress" id="billingaddress" class="" maxlength="2" value="1" <?php if(isset($action)){ if($row['billing_address']==1)echo "checked";}; ?>>
										<span></span>
										Set as default billing address
									</label>
								</div>	
							</li>
							<li>
								<p class="righted small"><em>*</em>Required fields.</p>					
							</li>
							<li class="centered">
								<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"CREATE")); ?>">
								<input type="hidden" name="idcust" id="idcust" value="<?php echo $idcust; ?>">	
								<?php
								if(isset($action)){
									echo '<input type="hidden" name="id" id="id" value="'.$row['id_customeraddress'].'">';	
									echo '<input type="hidden" name="action" id="action" value="$action">';
								}
								?>
							</li>
						</ul>
					</form>
				</div>			
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
	
});

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
$(function(){
	$(".city-container").addClass("hidden");
	$( "#province" ).change(function() {
	  selectcity();
	  $(".city-container").removeClass("hidden");
	});
});
</script>