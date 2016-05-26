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
		<div class="white-box addorder-box">			
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
								<input type="text" autocomplete="off" name="customername" id="searchid" class="required search" placeholder="Search Customer" data-search="customer" value="<?php if(isset($action)) echo $row['order_name']; ?>" >
								<div class="result result-customer"></div>
							</div>
							<label for="idcustomer" class="error">This is a required field.</label>						
							
						</li>
						<li class="customeraddress">
							<label>Customer Address</label>
							<ul></ul>
						</li>
						<form action="addorder.php" name="addproduct" id="addproduct" method="POST">
						<li>
							<label>Input Product</label>							
							<input type="text" name="productname" id="productname" value="" autocomplete="off" class="search" data-search="product">
							<input type="hidden" name="idproduct" id="idproduct" value="">
							<div class="result result-product"></div>				
						</li>
						<li>
							<div class="tricols productvarian">
								<div class="size">
									<label for="productsize">Size</label>
									<select name="productsize" id="productsize">
										<option value="35">35</option>
									</select>
								</div>
								<div class="qty">
									<label for="productqty">Qty</label>
									<select name="productqty" id="productqty">
										<option value="1">1</option>
									</select>
								</div>								
								<div>	
									<label for="submitproduct">&nbsp;</label>
									<input type="submit" name="submitproduct" id="submitproduct" value="Add Product">
								</div>
								<div class="clear"></div>
							</div>
						</li>
						</form>
						<li>
							<label>Detail Order</label>
							<div class="cart-table">
								<table width="100%" cellpadding="0" cellspacing="0">
									<colgroup>
										<col width="">
										<col width="20%">
										<col width="15%">
										<col width="10%">
										<col width="20%">
									</colgroup>
									<thead>
										<tr>
											<th>Product Name</th>
											<th>Detail Product</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<tbody></tbody>
								</table>
							</div>
						</li>
						<li>
							<label>Subtotal</label>
							<div class="total">
								<p><span>Subtotal</span><span></span></p>
								<p><span>Discount</span><span></span></p>
								<p><span>Shipping Cost</span><span></span></p>
								<p><span>Grandtotal</span><span></span></p>
							</div>
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
<link rel="stylesheet" type="text/css" href="../../source/css/jquery.ui.css">
<script type="text/javascript" src="../js/jquery.ui.js"></script>
<script type="text/javascript" src="../js/order.js"></script>