<?php
include "../../global/global.php";

$pagecall = $_GET["pageorigin"];
$tabel = substr($pagecall, 4);
$fieldid = "id_" . $tabel;
$id = $_GET['id'];

$query = "DELETE FROM ".$tabel." ";
echo $query .= "WHERE  ". $fieldid. " =' ". $id . "'";
$result = mysql_query($query);

header("Location: ".$pagecall.".php")

?>