<?php
include "../../global/global.php";
$pagecall = "variant";
$resload = mysql_query("
	SELECT i.*, c.color_name, s.size_name 
	FROM item i, color c, size s 
	WHERE i.id_color = c.id_color 
	AND i.id_size = s.id_size 
	AND id_product='$_POST[idprod]' 
	ORDER BY color_name ASC ");
if($resload){
	while($rowload = mysql_fetch_array($resload)){
		echo "<tr>";
		echo "<td>$rowload[sku]</td>";
		echo "<td class='centered'>$rowload[color_name]</td>";
		echo "<td class='centered'>$rowload[size_name]</td>";
		echo "<td class='righted'>$rowload[stock]</td>";
		echo "<td class='centered'>$rowload[location]</td>";
		echo '<td align="center">
					<a href="" class="link-opt deletevariant"><img src="../images/icon-trash.png" alt="Delete" title="Delete"></a>
				</td>						
		';
		echo "</tr>";
	}
}
?>				
