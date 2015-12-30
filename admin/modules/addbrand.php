<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM brand WHERE brand_name='$_POST[brandname]' ";
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_brand != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Brand Name exists.';
	}
	else
	{	
		// if there's posting Edit
		if($_POST['submit']=="EDIT"){
			$sql = "UPDATE brand ";
			$sql .= "SET brand_name='$_POST[brandname]' ";
			$sql .= ",brand_desc='$_POST[branddesc]' ";
			$sql .= "WHERE id_brand='$_POST[id]'";
		}
		else{
			// do query results
			$sql = "INSERT INTO brand ";
			$sql .= "VALUES ('', '$_POST[brandname]', '$_POST[branddesc]', now(), now(), '$_SESSION[viouser]', '$_SESSION[viouser]', 1)";
		}
		
		$qr = mysql_query($sql);
	
		if($qr)
		{
			$pesan = 'Brand saved succesfully.';
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save Brand.';
		}
	}	
}
?>