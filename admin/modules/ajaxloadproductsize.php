<?php
include "../../global/global.php";
$idcat = $_POST['idcat'];

$query="SELECT * FROM size WHERE active='1' AND id_category='$idcat' ORDER BY size_name ASC";
$result=mysql_query($query);
while($row=mysql_fetch_array($result)){
	echo '<option value="'.$row['id_size'].'">'.$row['size_name'].'</option>';
}
?>