<?php
$dest="../modules/";

switch($pagecall){
	case "login" :
		include ($dest."login.php");
		break;
	case "register" :
		include ($dest."register.php");
		break;	
	case "forgotpassword" :
		include ($dest."forgotpassword.php");
		break;
	case "resetpassword" :
		include ($dest."resetpassword.php");
		break;
	case "editaccount" :
		include ($dest."editaccount.php");
		break;
	case "myaddress" :
		include ("../admin/modules/addcustomeraddress.php");
		break;	
}
?>
