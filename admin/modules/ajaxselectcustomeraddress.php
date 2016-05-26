<?php
include "../../global/global.php";

$sql = "SELECT ca.*, d.district_name, c.city_name, p.province_name FROM customeraddress  ca, district d, city c, province p 
			WHERE ca.id_district = d.id_district 
			AND d.id_city = c.id_city 
			AND c.id_province=p.id_province 
			AND id_customer='$_POST[idcust]'
			AND ca.active=1";
			$query = mysql_query($sql);
	
while($row=mysql_fetch_array($query)){
	echo '
		<li>
			<label>
				<input type="radio" name="cust-address" value="'.$row['id_customeraddress'].'">
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