<?php
include "../../global/global.php";
include "header.php";			
?>

<div class="container">
	<h1>Update Stock From Gudang</h1>
	<?php	
	$a = file_get_contents('http://sinful.ddns.net/public/extdev/stockgudang');	
	$a = json_decode($a);
				
	foreach ($a as $product){
		$pro = json_decode(json_encode($product), true);
		
		// search the barcode in every items in database vioreshop
		$sql = "SELECT * FROM item WHERE barcode = '$pro[barcode]'";
		$query = mysql_query($sql);
		
		if(mysql_num_rows($query)>0){
			// update the stock
			$sqlupdate = "UPDATE item SET stock='$pro[stock]' WHERE barcode='$pro[barcode]'";
			$queryupdate = mysql_query($sqlupdate);
			if($queryupdate){
				echo "Barcode ".$pro['barcode']." and SKU ".$pro['supplier_code']." has been successfully updated.";
			}
			else{
				echo "Barcode ".$pro['barcode']." and SKU ".$pro['supplier_code']." failed to update.";
			}
		}
		else{
			// print product not found
			echo "Product with barcode ".$pro['barcode']." and SKU ".$pro['supplier_code']." is not exist in website database.";
		}
		echo "<br/>";		
	}
	
	/*	
	echo print_r($pro);	
	echo "barcode ".$pro['barcode']." => ";
		echo "supplier code ".$pro['supplier_code']. " => ";
		echo "stock ".$pro['stock'];
		echo "<br>";
		
	$key = array_search(40489, array_column($product, 'uid'));					
	*/
	
	?>
</div>
	
<?php	
include "footer.php";
?>
