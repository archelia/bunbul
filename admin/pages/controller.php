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
		$editvariantpage = $dest."editvarient.php";
		break;
	case "addpage" :
		$editvariantpage = $dest."addpage.php";
		break;
	case "addcustomer" :
		$editvariantpage = $dest."addcustomer.php";
		break;
	case "addblock" :
		$editvariantpage = $dest."addblock.php";
		break;
		
		
}
?>