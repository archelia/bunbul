<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM subcategory WHERE subcategory_name='$_POST[subcategoryname]' AND id_category='$_POST[idcategory]'";
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Subcategory name exists.';
	}
	else
	{
		// posting results
		$sql = "INSERT INTO subcategory ";
		$sql .= "VALUES ('', '$_POST[idcategory]', '$_POST[subcategoryname]','$_POST[subcategorydesc]', now(), now(), '$_SESSION[viouser]', '$_SESSION[viouser]', 1)";
		$qr = mysql_query($sql);
			
		if($qr)
		{
			$pesan = 'Subcategory saved succesfully.';
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save Subcategory';
		}
	}
}
?>