<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM customer WHERE email='$_POST[customeremail]' ";
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_customer != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, A customer with this email address already exists.';
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
			$sql = "UPDATE customer ";
			$sql .= "SET customer_name='$_POST[customername]' ";
			$sql .= ",email='$_POST[customeremail]' ";
			$sql .= ",birthday='$bdate' ";
			$sql .= ",phone_number='$_POST[phonenumber]' ";
			$sql .= ",subscribe='$subscribe' ";
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			
			//if password changed
			$query = "SELECT password FROM customer WHERE email='$_POST[customeremail]'";
			$result=mysql_query($query);
			$row = mysql_fetch_array($result);
				
				if($row['password'] != $_POST['password']){
					$sql .= ", password= '$securepass' ";
				}
				
			$sql .= "WHERE id_customer='$_POST[id]'";
		}
		else{
			// do query results
			$sql = "INSERT INTO customer ";
			$sql .= "VALUES ('', '$_POST[customername]', '$_POST[gender]', '$bdate', '$_POST[customeremail]', '$_POST[phonenumber]', '$_POST[password]', '$subscribe', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), now(),  1)";
		}
		
		$qr = mysql_query($sql);
	
		if($qr)
		{
			$pesan = 'Customer saved succesfully. ';
			//$pesan = $sql;
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save customer.';
		}
	}	
}
?>