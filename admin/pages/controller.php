<?php
$dest="../modules/";
switch($pagecall){
	case "login" :
		include ($dest."login.php");
		break;
	case "adduser" :
		include ($dest."adduser.php");
		break;
	case "addbrand" :
		include ($dest."addbrand.php");
		break;
	case "addcustomer" :
		include ($dest."addcustomer.php");
		break;
	case "addsize" :
		include ($dest."addsize.php");
		break;
	case "addcolor" :
		include ($dest."addcolor.php");
		break;
	case "addcategory" :
		include ($dest."addcategory.php");
		break;
	case "addsubcategory" :
		include ($dest."addsubcategory.php");
		break;
	case "addproduct" :
		include ($dest."addproduct.php");
		break;
		
}
?>