<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM subcategory WHERE subcategory_name='$_POST[subcategoryname]' AND id_category='$_POST[idcategory]'";
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_subcategory != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Subcategory name exists.';
	}
	else
	{
		// if there's posting Edit
		if($_POST['submit']=="EDIT"){
			$sql = "UPDATE subcategory ";
			$sql .= "SET subcategory_name='$_POST[subcategoryname]' ";
			$sql .= ",id_category='$_POST[idcategory]' ";
			$sql .= ",subcategory_desc='$_POST[subcategorydesc]' ";
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			$sql .= "WHERE id_subcategory='$_POST[id]'";
		}
		else{
			// posting results
			$sql = "INSERT INTO subcategory ";
			$sql .= "VALUES ('', '$_POST[idcategory]', '$_POST[subcategoryname]','$_POST[subcategorydesc]', now(), now(), '$_SESSION[viouser]', '$_SESSION[viouser]', 1)";
			
		}
		
		$qr = mysql_query($sql);
		if($qr)
		{
			$pesan = 'Subcategory saved succesfully.';
			$success=1;
			$newkode = $_POST['idcategory'];
		}
		else
		{		
			$pesan = 'Failed to save Subcategory';
		}
	}
}
?>