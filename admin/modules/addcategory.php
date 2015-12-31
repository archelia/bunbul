<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM category WHERE category_name='$_POST[categoryname]'";
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_category != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Category name exists.';
	}
	else
	{
		// if there's posting Edit
		if($_POST['submit']=="EDIT"){
			$sql = "UPDATE category ";
			$sql .= "SET category_name='$_POST[categoryname]' ";
			$sql .= ",category_description='$_POST[categorydesc]' ";
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			$sql .= "WHERE id_category='$_POST[id]'";
		}
		else{
			// posting results
			$sql = "INSERT INTO category ";
			$sql .= "VALUES ('', '$_POST[categoryname]', '$_POST[categorydesc]', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
		}
			
		$qr = mysql_query($sql);
			
		if($qr)
		{
			$pesan = 'Category saved succesfully.';
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save Category';
		}
	}
}
?>