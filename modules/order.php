<?php		
	$pesan="";	
	$sukses = 0;
	
	if(isset($_POST['submit'])){
		// if payment method choose save the whole checkout data
		if((isset($_POST['paymentmethod']))and($_POST['paymentmethod']!="")){
										
			// save order, set order status to menunggu pembayaran
			$sql = "INSERT INTO purchase_order ";
			$sql .= "VALUES ('', '$_SESSION[custlogin]', now(), '".$_SESSION['total-item']."', '$_SESSION[subtotal]', '$_SESSION[discount]', '$_SESSION[ongkir]', 
			'".$_SESSION['checkout-shipping']."', '$_POST[paymentmethod]', '', '$_SESSION[grandtotal]', '', 1, '$_SESSION[custlogin]', '$_SESSION[custlogin]', now(), now(), 1)";
			$query = mysql_query($sql);
			
			// get order number
			if($query){			
				$sql = "SELECT id_order FROM purchase_order 
						WHERE id_customer='$_SESSION[custlogin]' 
						ORDER BY date_created DESC limit 1";
				$query = mysql_query($sql);
				if($query){
					$row = mysql_fetch_array($query);
					$idorder = $row['id_order'];
				}
				
				// save order detail,
				$i=0;
				while ($i<count($_SESSION["iditems"])){
					if($_SESSION['qtys'][$i]>0){
					
					$iditem = $_SESSION["iditems"][$i];
					$qty = $_SESSION["qtys"][$i];
					
					// search item price and discount
					$sqlitem = "SELECT i.*, p.product_price, p.product_discount, p.product_discount_active 
					FROM item i, product p 
					WHERE i.id_product = p.id_product 
					AND i.id_item = ".$iditem;
					$query = mysql_query($sqlitem);
					
					$diskon = 0;
					$subtotal = 0;
					if($query){
						$rowitem = mysql_fetch_array($query);							
						if(($rowitem['product_discount_active']==1) and ($rowitem['product_discount']>0)){
							$diskon = ($rowitem['product_price'] * $rowitem['product_discount']/100);		
						}
						
						$subtotal += $qty * ($rowitem['product_price']-$diskon);
						
						$sql = "INSERT INTO purchase_order_detail ";
						echo $sql .= "VALUES ('', '$idorder', '$iditem', '$qty', '$rowitem[product_price]', '$diskon', '$subtotal')";
						$query = mysql_query($sql);
						
						//  cut the stock
						$qty = $_SESSION['qtys'][$i];
						$sql = "UPDATE item 
								SET stock = stock - $qty  
								WHERE id_item='$iditem'";
						$query = mysql_query($sql);		
					}				
				
				 $i++;
				 }
				}
			
			// if reseller update the last purchase
			if(isset($_SESSION['idreseller'])){
				echo "masuk phase 3";
				$sql = "UPDATE reseller SET last_purchase=now()";
				$query = mysql_query($sql);
			}
				//sendemailordertocustomer($row['id_order']);				
				//sendemailordertoadmin($row['id_order']);	
			
				// if success delete cart and checkout session_cache_expire	
				unset($_SESSION['total-item']);
				unset($_SESSION['ongkir']);
				unset($_SESSION['subtotal']);
				unset($_SESSION['discount']);
				unset($_SESSION['grandtotal']);
				unset($_SESSION['idreseller']);
				
				unset($_SESSION["iditems"]);
				unset($_SESSION["qtys"]);
				unset($_SESSION["weight"]);
				
				// if success redirect to thank you page
				$sukses = 1;	
				header("location: checkout-success.php");				
				// send email 
							
			}						
		}		
		else{
			$pesan = "An error occured. Please Call Your Administrator.";
		}
	}
?>