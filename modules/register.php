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
			$pesan = 'Your data has been updated successfully. ';
		}
		else{
			// do query results
			$sql = "INSERT INTO customer ";
			$sql .= "VALUES ('', '$_POST[customername]', '$_POST[gender]', '$bdate', '$_POST[customeremail]', '$_POST[phonenumber]', '$securepass', '$subscribe', '1', '1', now(), now(), now(),  1)";
			
			$pesan = 'Register success. Let\'s shopping ! ';							
		}
		
		$qr = mysql_query($sql);

		// create session search id user_edit
		if($_POST['submit']!="EDIT"){
			$sqlcari = "SELECT * FROM customer WHERE email='$_POST[customeremail]'";
			$querycari = mysql_query($sqlcari);
			if(mysql_num_rows($querycari)>0){
				$rowcari = mysql_fetch_array($querycari);
				$_SESSION['custlogin'] = $rowcari['id_customer'];
				$_SESSION['custname']	= $rowcari['customer_name'];
			}		
		}
	
		if($qr)
		{
			
			$pesan = $sqlcari;
			$success=1;
		}
		else
		{		
			$pesan = 'Registration failed. Please contact the administrator';
		}
	}	
}
?>