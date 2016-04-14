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
	case "adduser" :
		include ($dest."adduser.php");
		break;
	case "addbrand" :
		include ($dest."addbrand.php");
		break;
	case "addcustomer" :
		include ($dest."addcustomer.php");
		break;
	case "addcustomeraddress" :
		include ($dest."addcustomeraddress.php");
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
	case "addpage" :
		include ($dest."addpage.php");
		break;
	case "addcustomer" :
		include ($dest."addcustomer.php");
		break;
	case "addblock" :
		include ($dest."addblock.php");
		break;	
	case "addgallery" :
		include ($dest."addgallery.php");
		break;	
	case "addbanner" :
		include ($dest."addbanner.php");
		break;
	case "addannouncement" :
		include ($dest."addannouncement.php");
		break;	
	case "addbank" :
		include ($dest."addbank.php");
		break;	
	case "addreseller" :
		include ($dest."addreseller.php");
		break;	
	case "addpaymentmethod" :
		include ($dest."addpaymentmethod.php");
		break;	
	case "addprovince" :
		include ($dest."addprovince.php");
		break;	
	case "addcity" :
		include ($dest."addcity.php");
		break;	
		
}
?>