<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addcustomeraddress";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
?>
<?php
	// define variables for editing
	$pageorigin="addcustomeraddress.php";
	if(isset($_GET['act'])){
		if($_GET['act']=="chg"){
			if($id != ""){
				$action = "change";
				$qload = "SELECT * FROM ".$tabel." WHERE ".$fieldname."='$id'";
				$rload = mysql_query($qload);
				if(mysql_num_rows($rload)>0){
					$row = mysql_fetch_array($rload);
				}
				else{
					header("location: ".$pageorigin);
				}
			}
			else{
				header("location: ".$pageorigin);
			}
		}
	}
	// define id customer
	if(isset($_GET['idcust'])){
		$idcust = $_GET['idcust'];
	} else $idcust = $_POST['idcust'];
?>
<div class="container">
	<div class="content addcustomeraddress">		
		<div class="box white-box addcustomeraddress-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ")."Customer Address"); ?></h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="<?php echo $pageorigin.((isset($action)?"?act=chg&id=$id":"")); ?>" name="addcustomeraddress" id="addcustomeraddress" method="POST">
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
							<a href="<?php echo "detailcustomer.php?idcust=".((isset($action))?"$row[id_customer]":"$idcust");?>" class="button">BACK</a>
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
</script>
<script>
function selectcity(){
	var idprovince = $("#province").val();	
	$.ajax({		
		url: "../modules/ajaxselectcity.php",
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