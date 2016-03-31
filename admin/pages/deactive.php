<?php
include "../../global/global.php";

$pagecall = $_GET["pageorigin"];

if((substr($pagecall,0,4)=="edit")||(substr($pagecall,0,4)=="list")){ 
	$tabel = substr($pagecall, 4);
}
elseif(substr($pagecall,0,6)=="detail"){
	$tabel = substr($pagecall, 6);
	$detail = 1;
}
else {
	// page origin are add-something
	$tabel = substr($pagecall, 3);
}

$fieldid = "id_" . $tabel;
$id = $_GET['id'];

$query = "UPDATE ".$tabel." ";
$query .= "SET active=0 ";
$query .= "WHERE  ". $fieldid. " =' ". $id . "'";
$result = mysql_query($query);

header("Location: ".$pagecall.".php".((isset($detail))?"?id=".$id:""));
?>