<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM order WHERE email='$_POST[orderemail]' ";
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_order != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, A order with this email address already exists.';
	}
	else
	{	
		// processing the birtday
		$bdate = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
		
		// password
		$securepass = md5($_POST['password']);
		
		// subscribed
		if(isset($_POST['subscribe'])){$subscribe=1;}else{$subscribe=0;}
		
		// if there's posting Edit
		if($_POST['submit']=="EDIT"){
			$sql = "UPDATE order ";
			$sql .= "SET order_name='$_POST[ordername]' ";
			$sql .= ",email='$_POST[orderemail]' ";
			$sql .= ",birthday='$bdate' ";
			$sql .= ",phone_number='$_POST[phonenumber]' ";
			$sql .= ",subscribe='$subscribe' ";
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			
			//if password changed
			$query = "SELECT password FROM order WHERE email='$_POST[orderemail]'";
			$result=mysql_query($query);
			$row = mysql_fetch_array($result);
				
				if($row['password'] != $_POST['password']){
					$sql .= ", password= '$securepass' ";
				}
				
			$sql .= "WHERE id_order='$_POST[id]'";
		}
		else{
			// do query results
			$sql = "INSERT INTO order ";
			$sql .= "VALUES ('', '$_POST[ordername]', '$_POST[gender]', '$bdate', '$_POST[orderemail]', '$_POST[phonenumber]', '$securepass', '$subscribe', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), now(),  1)";
		}
		
		$qr = mysql_query($sql);
	
		if($qr)
		{
			$pesan = 'Order saved succesfully. ';
			//$pesan = $sql;
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save order.';
		}
	}	
}
?>