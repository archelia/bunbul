<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addcustomer";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
?>
<?php
	// define variables for editing
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
					header("location: ".$pageorigin.".php");
				}
			}
			else{
				header("location: ".$pageorigin.".php");
			}
		}
	}
?>
<div class="container">
	<div class="content addcustomer">		
		<div class="box white-box addcustomer-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ").$tabel); ?></h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="addcustomer.php<?php echo((isset($action)?"?act=chg&id=$id":"")); ?>" name="addcustomer" id="addcustomer" method="POST">
					<ul>
						<li>
							<label for="customername">Customer Name<em>*</em></label>
							<input type="text" name="customername" id="customername" class="required" maxlength="256" placeholder="Customer Name" value="<?php if(isset($action)) echo $row['customer_name']; ?>">
							<label for="customername" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="customeremail">Customer Email<em>*</em></label>
							<input type="email" name="customeremail" id="customeremail" class="required" maxlength="256" placeholder="Customer Email Address" value="<?php if(isset($action)) echo $row['email']; ?>">
							<label for="customeremail" class="error"></label>
						</li>
						<li>
							<label for="phonenumber">Phone Number<em>*</em></label>
							<input type="text" name="phonenumber" id="phonenumber" class="required" maxlength="256" style="margin-bottom: 10px;" placeholder="Customer Phone Number" value="<?php if(isset($action)) echo $row['phone_number']; ?>">
							<label for="phonenumber" class="error"></label>
						</li>
						<li>
							<label for="password">Password<em>*</em></label>
							<input type="password" name="password" id="password" class="required" maxlength="" placeholder="Password" value="<?php if(isset($action)) echo $row['password']; ?>">
							<label for="password" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="password1">Confirm Password<em>*</em></label>
							<input type="password" name="password1" id="password1" class="required" maxlength="" placeholder="Confirm Password" value="<?php if(isset($action)) echo $row['password']; ?>">
							<label for="password1" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="">Gender<em>*</em></label>
							<select name="gender" id="gender">
								<option value="1" <?php if(isset($action)){if($row['gender']==1)echo 'selected="selected"';} ?>>Male</option>
								<option value="2" <?php if(isset($action)){if($row['gender']==2)echo 'selected="selected"';} ?>>Female</option>
							</select>
							<label for="" class="error"></label>
						</li>
						<li class="bdate">
							<label for="birthday">Birthday<em>*</em></label>
							<?php
							// split birthday year month and day	
							if(isset($action)){
								$bday = explode("-",$row['birthday']);
								$year = $bday[0];
								$months =$bday[1];
								$days = $bday[2];
							}
							?>
							<select name="year" id="year">
								<?php							
								 $starting_year  =date('Y', strtotime('-80 year'));
								 $ending_year = date('Y', strtotime('-10 year'));
								 for($ending_year; $ending_year >= $starting_year; $ending_year--) {
									 echo '<option value="'.$ending_year.'"';
									 if(isset($action)){
										 if($ending_year==$year){echo " selected";}
									 }								 
									 echo ' >'.$ending_year.'</option>';
								 } 
								?>
							</select>								
							<select name="month" id="month">
								<?php
								for ($m=1; $m<=12; $m++) {
								 $current_month = date('n'); 	
								 $month = date('F', mktime(0,0,0,$m, 1, date('Y')));								
								 echo '<option value="'.$m.'"';
								 if(isset($action)){
									if($m==$months){echo " selected";}
								 }	
								 else{
									if($m==$current_month){echo " selected";}
								 }
								 echo '>'.$month.'</option>';
								}
								?>
							</select>
							<select name="day" id="day">
							<?php
								for ($d=1; $d<=31; $d++) {								
								 echo '<option value="'.$d.'"';
								 if(isset($action)){
										 if($d==$days){echo " selected";}
									 }	
								 echo '>'.$d.'</option>';
								 }
							?>
							</select>
							<label for="birthday" class="error">Required fields.</label>
						</li>
						<li>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="subscribe" id="subscribe" class="" maxlength="2" value="1" <?php if(isset($action)){ if($row['subscribe']==1)echo "checked";}; ?>>
									<span></span>
									Subscribe Newsletter
								</label>
							</div>	
						</li>
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>					
						</li>
						<li class="centered">
							<a href="<?php echo $pageorigin.".php"?>" class="button">BACK</a>
							<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"CREATE")); ?>">
							<?php
							if(isset($action)){
								echo '<input type="hidden" name="id" id="id" value="'.$row['id_customer'].'">';
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
		url: "../modules/ajaxadjustdate.php",
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