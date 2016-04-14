 <?php
include "../../global/global.php";

$pagecall = $_GET["pageorigin"];
if((substr($pagecall,0,4)=="edit")||(substr($pagecall,0,4)=="list")){ 
	$tabel = substr($pagecall, 4);
}
else {
	$tabel = substr($pagecall, 3);
}

// for detail customer address only
if(($pagecall=="detailcustomer") or ($pagecall=="myaddress")){
	$tabel = "customeraddress";
}

$fieldid = "id_" . $tabel;
$id = $_GET['id'];

$query = "DELETE FROM ".$tabel." ";
$query .= "WHERE  ". $fieldid. " =' ". $id . "'";
$result = mysql_query($query);

// for detail customer address only
if($pagecall=="detailcustomer"){
	header("Location: ".$pagecall.".php?idcust=".$_GET['idcust']);
}
elseif($pagecall=="myaddress"){
	header("Location: ../../pages/myaddress.php");
}
else header("Location: ".$pagecall.".php");
?>