<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM province WHERE province_name='$_POST[provincename]'";
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_province != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, province name exists.';
	}
	else
	{
		// if there's posting Edit
		if($_POST['submit']=="EDIT"){
			$sql = "UPDATE province ";
			$sql .= "SET province_name='$_POST[provincename]' ";
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			$sql .= "WHERE id_province='$_POST[id]'";
		}
		else{
			// posting results
			$sql = "INSERT INTO province ";
			$sql .= "VALUES ('', '$_POST[provincename]', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
		}
			
		$qr = mysql_query($sql);
			
		if($qr)
		{
			$pesan = 'Province saved succesfully.';
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save province';
		}
	}
}
?>