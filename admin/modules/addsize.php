<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT id_size FROM size WHERE size_name='$_POST[sizename]' and id_category='$_POST[sizetype] '";
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_size != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Size exists.';
	}
	else
	{
		// if there's posting Edit
		if($_POST['submit']=="EDIT"){
			$sql = "UPDATE size ";
			$sql .= "SET size_name='$_POST[sizename]' ";
			$sql .= ", id_category='$_POST[sizetype]' ";
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			$sql .= "WHERE id_size='$_POST[id]'";
		}
		else{
			// posting results
			$sql = "INSERT INTO size ";
			$sql .= "VALUES ('', '$_POST[sizetype]', '$_POST[sizename]', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
		}	
		
		$qr = mysql_query($sql);
	
		if($qr)
		{
			$pesan = 'Size saved succesfully.';
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save Size'.$sql;
		}	
	}
}
?>