<?php
if($pagecall != "login"){
	if(!isset($_SESSION['viouser'])){
		echo '<script>window.location = "login.php";</script>';
	}
}				
$dest="../modules/";

switch($pagecall){
	case "login" :
		include ($dest."login.php");
		break;
	case "register" :
		include ($dest."register.php");
		break;	
}
?>
