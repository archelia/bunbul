<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM category WHERE category_name='$_POST[categoryname]'";
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Category name exists.';
	}
	else
	{
		// posting results
		$sql = "INSERT INTO category ";
		$sql .= "VALUES ('', '$_POST[categoryname]', '$_POST[categorydesc]', now(), now(), '$_SESSION[viouser]', '$_SESSION[viouser]', 1)";
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