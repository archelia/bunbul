<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM bank WHERE bank_name='$_POST[bankname]' ";
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_bank != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Bank Name exists.';
	}
	else
	{	
		// if there's posting Edit
		if($_POST['submit']=="EDIT"){
			$sql = "UPDATE bank ";
			$sql .= "SET bank_name='$_POST[bankname]' ";
			$sql .= ",bank_desc='$_POST[bankdesc]' ";
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			$sql .= "WHERE id_bank='$_POST[id]'";
		}
		else{
			// do query results
			$sql = "INSERT INTO bank ";
			$sql .= "VALUES ('', '$_POST[bankname]', '$_POST[bankdesc]', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(),  1)";
		}
		
		$qr = mysql_query($sql);
	
		if($qr)
		{
			$pesan = 'Bank saved succesfully. ';
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save bank.';
		}
	}	
}
?>