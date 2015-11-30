<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM brand WHERE brand_name='$_POST[brandname]'";
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Brand Name exists.';
	}
	else
	{
		// posting results
		$sql = "INSERT INTO brand ";
		$sql .= "VALUES ('', '$_POST[brandname]', '$_POST[branddesc]', now(), now(), '$_SESSION[viouser]', '$_SESSION[viouser]', 1)";
		$qr = mysql_query($sql);
	
		if($qr)
		{
			$pesan = 'Brand saved succesfully.';
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save Brand';
		}
	}	
}
?>