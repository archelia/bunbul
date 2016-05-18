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
				<input type="text" name="customeraddress2" id="customeraddress2" maxlength="256" placeholder="Address Line 2" value="<?php if(isset($action)) echo $row['address2']; ?>">
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
					$sqlprov = "SELECT p.id_province, c.id_city  
								FROM province p, city c, district d 
								WHERE p.id_province=c.id_province 
								AND c.id_city = d.id_city 
								AND id_district='$row[id_district]'";
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
						$sqlisting = "SELECT * FROM city 
						WHERE id_province='$rowprov[id_province]' 
						ORDER BY city_name ASC";
						$reslist =mysql_query($sqlisting);
						while($rowlist = mysql_fetch_array($reslist)){
							echo "<option value='$rowlist[id_city]'";
							if($rowprov['id_city']==$rowlist['id_city'])echo " selected";
							echo ">$rowlist[city_name]</option>";
						}
					}
					?>
				</select>
				<label for="" class="error"></label>
			</li>
			<li class="district-container <?php echo ((isset($action))?"shown":"");?>">
				<label for="">District<em>*</em></label>
				<select name="district" id="district">	
					<?php
					if(isset($action)){
						$sqlisting = "SELECT * FROM district 
									WHERE id_city='$rowprov[id_city]' 
									ORDER BY district_name ASC ";
						$reslist =mysql_query($sqlisting);
						while($rowlist = mysql_fetch_array($reslist)){
						echo "<option value='$rowlist[id_district]'";
						if($row['id_district']==$rowlist['id_district'])echo " selected";
						echo ">$rowlist[district_name]</option>";}
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
