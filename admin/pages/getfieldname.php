<?php
// determining id and field id for future use
if((substr($pagecall,0,4)=="edit")||(substr($pagecall,0,4)=="list")){ 
	$tabel = substr($pagecall, 4);
}
else {
	$tabel = substr($pagecall, 3);
}
$fieldname = "id_" . $tabel;
$pageorigin = "list".$tabel;
$pageedit = "add".$tabel;

if(isset($_GET['id'])){
	$id = $_GET['id'];
}
?>