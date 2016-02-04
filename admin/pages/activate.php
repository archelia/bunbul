<?php
include "../../global/global.php";

$pagecall = $_GET["pageorigin"];
if((substr($pagecall,0,4)=="edit")||(substr($pagecall,0,4)=="list")){ 
	$tabel = substr($pagecall, 4);
}
else {
	$tabel = substr($pagecall, 3);
}
$fieldid = "id_" . $tabel;
$id = $_GET['id'];

$query = "UPDATE ".$tabel." ";
$query .= "SET active=1 ";
$query .= "WHERE  ". $fieldid. " =' ". $id . "'";
$result = mysql_query($query);

header("Location: ".$pagecall.".php?discard");
?>