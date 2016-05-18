<?php
include "sendingemails.php";

$pesan="";
$success=0;
if(isset($_POST['submit']))
{	
	$date = date('Y-m-d H:i:s', strtotime($_POST['transferdate']));
	//echo $date = date_format($_POST['transferdate'], 'Y-m-d H:i:s');
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$sql = "UPDATE payment_confirmation ";
		$sql .= "SET acc_holder='$_POST[accholder]' ";
		$sql .= ",total_amount='$_POST[totalamount]' ";
		$sql .= ",description='$_POST[description]' ";
		$sql .= ",transfer_date= '$date' ";
		$sql .= ", date_edited=now() ";			
		$sql .= "WHERE id_confirm='$_POST[id]'";
		
		$pesan = 'Your payment confirmation has been updated successfully. ';
		$idconfirm = $_POST['id'];
	}
	else{
		// do query results
		$sql = "INSERT INTO payment_confirmation ";
		$sql .= "VALUES ('', '$_SESSION[custlogin]', '$_POST[idorder]', '$date', '$_POST[accholder]', '$_POST[totalamount]', '$_POST[description]', now(), now(),  1)";
		
		$pesan = 'Payment confirmation success! Please wait for maximum 2x24 hours while we process your order. ';					
	}
	$query = mysql_query($sql);
	
	if($query)
	{		
		if($_POST['submit']!="EDIT"){
			// get id confirm for this payment
			$sql = "SELECT id_confirm FROM payment_confirmation 
					WHERE id_order='$_POST[idorder]' 
					ORDER BY id_confirm DESC limit 1";
			$query = mysql_query($sql);
			$rowcari = mysql_fetch_array($query); 
			$idconfirm = $rowcari['id_confirm'];
		}
	
		// change order status to 2 : being processed
		$sql = 'UPDATE purchase_order SET status=2 
				WHERE id_order='.$_POST['idorder'];
		$qr = mysql_query($sql);
		if($qr){
			// send email to administrator 
			sendemailpaymentconfirm($idconfirm);			
		}			
		$success=1;
	}
	else
	{		
		$pesan = 'Payment confirmation failed. Please contact the administrator';
	}	
}
?>