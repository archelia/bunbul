<?php
if($pagecall != "login"){
	if(!isset($_SESSION['viouser'])){header("location: login.php");}
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
}
?>