<?php
include "../../global/global.php";
include "header.php";			
?>

<div class="container">
	<?php	
	$a = file_get_contents('http://sinful.ddns.net/public/extdev/stockgudang');	
	$a = json_decode($a);
		
	
		
	foreach ($a as $product){
		$pro = json_decode(json_encode($product), true);
		//echo print_r($pro);	
		
		// search the barcode in every items
		$sql = "SELECT * FROM item WHERE barcode = '$pro[barcode]'";
		$query = mysql_query($sql);
		
		if(mysql_num_rows($query)>0){
			// update the stock
		}
		
	}
	
	/*	
	$key = array_search("SPF-009.14.37", array_column($product, 'barcode'));	
	echo $key['stock'];
		
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
