<tbody>
<?php
include "../../global/global.php";
$resload = mysql_query("
	SELECT i.*, c.color_name, s.size_name 
	FROM item i, color c, size s 
	WHERE i.id_color = c.id_color 
	AND i.id_size = s.id_size 
	AND id_product='$_SESSION[id_inputed]' 
	ORDER BY color_name ASC ");
		
while($rowload = mysql_fetch_array($resload)){
	
	echo "<tr>";
	echo "<td>$rowload[sku]</td>";
	echo "<td class='centered'>$rowload[color_name]</td>";
	echo "<td class='centered'>$rowload[size_name]</td>";
	echo "<td class='righted'>$rowload[stock]</td>";
	echo "<td class='centered'>$rowload[location]</td>";
	echo '<td align="center">
				<a href="deletion.php?kode='.$rowload["id_item"].'&pagecall='.$pagecall.'" class="link-opt"><img src="../images/icon-trash.png" alt="Delete" title="Delete"></a>
			</td>						
	';
	echo "</tr>";
}
?>				
</tbody>
