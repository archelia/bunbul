<?php
include "../../global/global.php";

$pagecall = $_GET["pagecall"];
$tabel = $_GET["tabel"];
$id = $GET["id"];

$query = "UPDATE ".$tabel."";
$result = mysql_query($query);

?>