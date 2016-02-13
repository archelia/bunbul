<?php
include "../../global/global.php";
$pagecall = "variant";
$resload = mysql_query("
	SELECT i.*, c.color_name, s.size_name 
	FROM item i, color c, size s 
	WHERE i.id_color = c.id_color 
	AND i.id_size = s.id_size 
	AND id_product='$_POST[idprod]' 
	ORDER BY color_name ASC, size_name ASC ");
if($resload){
	while($rowload = mysql_fetch_array($resload)){
		echo "<tr>";
		echo '<td align="center">
				<a href="javascript:editvariant('.$rowload["id_item"].')" class="link-opt"><img src="../images/icon-pencil.png" alt="Edit" title="Edit"></a>								
				</td>';
		echo "<td>$rowload[sku]</td>";
		echo "<td class='centered'>$rowload[barcode]</td>";
		echo "<td class='centered'>$rowload[color_name] $rowload[size_name]</td>";
		echo "<td class='righted'>$rowload[stock]</td>";
		echo "<td class='centered'>$rowload[location]</td>";
		echo '<td align="center">
					<a href="javascript:deletevariant('.$rowload["id_item"].');" class="link-opt"><img src="../images/icon-trash.png" alt="Delete" title="Delete"></a>
				</td>						
		';
		echo "</tr>";
	}
	if(mysql_num_rows($resload)<1){
		echo "<tr>";
		echo "<td colspan='6' align='center'>There's no item to display.</td>";
		echo "</tr>";
	}
}

?>				
