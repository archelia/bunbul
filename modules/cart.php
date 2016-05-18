<?php
// create some functions
function addtocart(){
	if (!isset($_SESSION["iditems"]))
	{
		$_SESSION["iditems"] = array();
		$_SESSION["qtys"] = array();
		$_SESSION["weight"] = array();
	}
	
	// determine the $i, if not exist create new $i
	$i=0;
	while ($i<count($_SESSION["iditems"]) && $_SESSION["iditems"][$i] != $_POST["iditem"]) 
	{$i++;}
		
	if ($i < count($_SESSION["iditems"])) //increase current product's item quantity
	{									
		$_SESSION["qtys"][$i]+=$_POST['quantity'];
	}
	else //no such product in the cart - add it
	{
		// if the product stok less then or equal 
		$_SESSION["iditems"][] = $_POST["iditem"];
		$_SESSION["qtys"][] = $_POST['quantity'];
		$_SESSION["weight"][] = $_POST['quantity'];		
	}			
}

function deletefromcart(){
	$i = $_POST['rownumber'];
	$_SESSION['qtys'][$i]=0;
	$_SESSION['weight'][$i]=0;	  
}	
	
function editquantity(){
	$i = $_POST['rownumber'];

	// check in stock if stock available update
	$sql = "SELECT * FROM item where id_item = '".$_SESSION['iditems'][$i]."'";
	$query = mysql_query($sql);
	$rowcheck = mysql_fetch_array($query);
	
	if($rowcheck['stock'] >= $_POST['quantity']){
		$_SESSION["qtys"][$i]=$_POST['quantity'];
		$_SESSION["weight"][$i]=$_POST['quantity'];
		return 1;
	}
	else{
		return 0;
	}

}

function emptycart(){	
	unset($_SESSION["iditems"]);
	unset($_SESSION["qtys"]);
	unset($_SESSION["weight"]);
}
?>