<?php	
	include "../global/global.php";		
	$pagecall = "pdp";
	if(!isset($_GET['idorder'])){header("location: 404.php");}
	
	// load order data
	$sql = "SELECT po.*, sm.method_title as spmethod, pm.method_title as pymethod ";
	$sql .= "FROM purchase_order po, shippingmethod sm, paymentmethod pm ";
	$sql .= "WHERE po.active=1 ";
	$sql .= "AND po.id_shippingmethod = sm.id_shippingmethod ";
	$sql .= "AND po.id_paymentmethod = pm.id_paymentmethod ";
	$sql .= "AND id_order='$_GET[idorder] '";
	$sql .= "AND id_customer='$_SESSION[custlogin]'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	if(mysql_num_rows($result)<1){
		header("location: 404.php");
	}
	
	include "header.php";

	$status = "";
	switch ($row['status']) {
    case 0:
       $status = "Canceled";
        break;
    case 1:
       $status = "Waiting For Payment";
        break;
    case 2:
        $status = "Being Processed";
        break;
	case 3:
        $status = "Delivered";
        break;
	case 4:
        $status = "Returned";
        break;
}
?>
<div class="container">
	<div class="front-content order-detail">	
		<h1>ORDER NUMBER <?php echo $row['id_order'];?></h1>
		<p>Order Date : <?php echo $row['order_date'];?></p>
		<p>Current Status : <?php echo $status;?></p>
		<div class="notice">
			<p>Please make the payment within 1x24 hours.</p>
			<p>Please include your order number in the description column.</p>
			<p>Your confirmation will be processed in 1x24 hours.</p>
		</div>
		<div class="confirmation">
			<?php
			if($row['status']==1){
				echo '<a href="paymentconfirm.php?id='.$row['id_order'].'">Confirm Payment</a>';
			}
			?>
			
		</div>
		<div class="twocols order-col">
			<div class="">
				<h6>Shipping Address</h6>
				<address>
					<?php
					// load shipping address
					$sql = "SELECT ca.*, d.district_name, c.city_name, p.province_name 
							FROM customeraddress ca, district d, city c, province p 
							WHERE id_customer='$_SESSION[custlogin]' 
							AND shipping_address=1 
							AND ca.id_district = d.id_district 
							AND d.id_city = c.id_city 
							AND c.id_province = p.id_province";
					$result = mysql_query($sql);
					$rows = mysql_fetch_array($result);					
					?>
					<span><?php echo $rows['address_name'];?></span>
					<span><?php echo $rows['address'];?></span>
					<span><?php echo $rows['address2'];?></span>
					<span><?php echo $rows['city_name'];?></span>
					<span><?php echo $rows['province_name']." ".$rows['postal_code'];?></span>
					<span><?php echo $rows['address_phone'];?></span>
				</address>
			</div>
			<div class="">
				<h6>Billing Address</h6>
				<address>
					<?php
					// load billing address
					$sql = "SELECT ca.*, d.district_name, c.city_name, p.province_name 
							FROM customeraddress ca, district d, city c, province p 
							WHERE id_customer='$_SESSION[custlogin]' 
							AND billing_address = 1 
							AND ca.id_district = d.id_district 
							AND d.id_city = c.id_city 
							AND c.id_province = p.id_province";
					$result = mysql_query($sql);
					$rows = mysql_fetch_array($result);					
					?>
					<span><?php echo $rows['address_name'];?></span>
					<span><?php echo $rows['address'];?></span>
					<span><?php echo $rows['address2'];?></span>
					<span><?php echo $rows['city_name'];?></span>
					<span>
						<?php echo $rows['province_name']." ".$rows['postal_code'];?>
					</span>
					<span><?php echo $rows['address_phone'];?></span>
				</address>
			</div>
			<div class="clear"></div>
		</div>
		<div class="twocols order-col">
			<div class="">
				<h6>Shipping Method</h6>
				<p><?php echo $row['spmethod'];?></p>
			</div>
			<div class="">
				<h6>Payment Method</h6>
				<p><?php echo $row['pymethod'];?></p>
			</div>
			<div class="clear"></div>
		</div>
		<div class="detail-order-info">
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
					<tbody>		
					<?php
					// load order detail				
					$sql = "SELECT pod.*, s.size_name, c.color_name, p.product_name, p.id_product, i.barcode 
						FROM purchase_order_detail pod, item i, size s, color c, product p
						WHERE pod.id_item=i.id_item 
						AND i.id_product=p.id_product 
						AND i.id_size=s.id_size 
						AND i.id_color=c.id_color 
						AND pod.id_order='$_GET[idorder]'";
					$query = mysql_query($sql);
					while($rowitem=mysql_fetch_array($query)){
						?>
						<tr>
							<td align="left">
								<img src="<?php echo "../source/placeholder/".$rowitem['id_product']."-1.jpg";?>" alt="" title="" height="60">
								<h6><?php echo $rowitem['product_name']; ?></h6>
								<p><?php echo "sku : ".$rowitem['barcode']; ?></p>
							</td>
							<td align="center">
								<p><?php echo "Size : ".$rowitem['size_name']; ?></p>
								<p><?php echo "Color : ".$rowitem['color_name']; ?></p>
							</td>
							<td align="right">
								<?php echo "Rp. ".($rowitem['price']-$rowitem['discount']); ?>
							</td>
							<td align="center">
								<?php echo $rowitem['qty']; ?>
							</td>
							<td align="right"><?php echo "Rp. ". $rowitem['total']; ?> </td>
						</tr>
						<?php	
						
					}
					?>
				</tbody>
				</table>
			</div>	
			<div class="total">
				<p><span>Subtotal</span><span>Rp. <?php echo $row['subtotal']; ?> </span></p>
				<p><span>Discount</span><span>Rp. <?php echo $row['discount']; ?></span></p>
				<p><span>Shipping Cost</span><span>Rp. <?php echo $row['ongkir']; ?></span></p>
				<p><span>Grandtotal</span><span>Rp. <?php echo $row['grandtotal']; ?></span></p>
			</div>
		</div>	
	</div>
	<div class="clear"></div>
</div>
<?php
	include "footer.php";	
?>