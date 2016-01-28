<?php
include "../../global/global.php";

$tabel = "item";
$fieldid = "id_" . $tabel;
$id = $_POST['iditem'];

$query = "DELETE FROM ".$tabel." ";
$query .= "WHERE  ". $fieldid. " =' ". $id . "'";
$result = mysql_query($query);
?>