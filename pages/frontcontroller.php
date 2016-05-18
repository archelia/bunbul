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
	case "checkoutaddress" :
		include ("../admin/modules/addcustomeraddress.php");
		break;	
	case "checkout" :
		include ($dest."login.php");
		include ($dest."register.php");
		break;
	case "checkout-final" :
		include ($dest."order.php");
		break;
	case "paymentconfirm" :
		include ($dest."paymentconfirm.php");
		break;	
}
?>