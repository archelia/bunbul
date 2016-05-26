<?php
include "../../global/global.php";

$q = $_POST['search'];
$sql_res = mysql_query("
			SELECT * FROM product 
			WHERE product_name like '%$q%' 
			OR product_model like '%$q%' 
			order by product_name ASC LIMIT 5");

echo '<ul>';	
while($row=mysql_fetch_array($sql_res))
{
	echo '<li class="show" data-idproduct="'.$row['id_product'].'" data-prod-name="'.$row['product_name'].'">'.$row['product_name'].'</li>';
}
echo '</ul>';
?>