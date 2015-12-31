<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM color WHERE color_name='$_POST[colorname]'";
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_color != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Color exists.';
	}
	else
	{
		// if there's posting Edit
		if($_POST['submit']=="EDIT"){
			$sql = "UPDATE color ";
			$sql .= "SET color_name='$_POST[colorname]' ";
			$sql .= ", html_code='$_POST[color_code]' ";
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			$sql .= "WHERE id_color='$_POST[id]'";
		}
		else{
			// posting results
			$sql = "INSERT INTO color ";
			$sql .= "VALUES ('', '$_POST[colorname]', '$_POST[color_code]', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
		}
				
		$qr = mysql_query($sql);
	
		if($qr)
		{
			$pesan = 'Color saved succesfully.';
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save Color';
		}
	}
}
?>