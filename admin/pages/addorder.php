<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addorder";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id

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
	<div class="content addorder">		
		<div class="box white-box addorder-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ").$tabel); ?></h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="addorder.php<?php echo ((isset($action)?"?act=chg&id=$id":"")); ?>" name="addorder" id="addorder" method="POST">
					<ul>
						<li>
							<label for="orderdate">Order Date<em>*</em></label>
							<input type="text" name="orderdate" id="orderdate" class="required datepicker" placeholder="12/4/2015" value="<?php if(isset($action)) echo $row['order_date']; ?>">
							<label for="orderdate" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="idcustomer">Customer<em>*</em></label>
							<input type="hidden" name="idcustomer" id="idcustomer" value="">
							<div class="content">
								<input type="text" autocomplete="off" name="customername" id="searchid" class="required search" placeholder="Search Customer" value="<?php if(isset($action)) echo $row['order_name']; ?>" >
								<div id="result"></div>
							</div>
							<label for="idcustomer" class="error">This is a required field.</label>						
							
						</li>
						<li>
							<label>Customer Address</label>
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
						</li>
						<li>
							<label>Input Product</label>
							<form action="">
								<input type="text">
								<input type="text">
							</form>
						</li>
						<li>
							<label>Detail Order</label>
						</li>
						<li>
							<label>Subtotal</label>
						</li>
						<li>
							<label>Note</label>
							<textarea name="orderdesc" id="orderdesc" cols="30" rows="6" placeholder="Order Description"><?php if(isset($action)) echo $row['order_desc']; ?></textarea>
						</li>
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>	
						</li>
						<li class="centered">
							<a href="<?php echo $pageorigin.".php"?>" class="button">CANCEL</a>
							<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"CREATE")); ?>">
							<?php
							if(isset($action)){
								echo '<input type="hidden" name="id" id="id" value="'.$row['id_order'].'">';
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
	$("#addorder").validate();
	
	
	// search customer
	$(".search").keyup(function() 
	{ 
	var searchid = $(this).val();
	var dataString = 'search='+ searchid;
	if(searchid!='')
	{
		$.ajax({
		type: "POST",
		url: "../modules/ajaxselectcustomer.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
		$("#result").html(html).show();
		}
		});
	}return false;    
	});

	jQuery("#result").on("click",function(e){ 
		var clicked = $(e.target);
		var idcustomer = clicked.attr("data-idcust");
		$('#idcustomer').val(idcustomer);
		$('#searchid').val(clicked.attr("data-cust-name"));
	});
	
	jQuery(document).on("click", function(e) { 
		var $clicked = $(e.target);
		if (! $clicked.hasClass("search")){
		jQuery("#result").fadeOut(); 
		}
	});
	$('#searchid').click(function(){
		jQuery("#result").fadeIn();
	});
});
</script>