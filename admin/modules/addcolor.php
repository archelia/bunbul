<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM color WHERE color_name='$_POST[colorname]'";
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Color exists.';
	}
	else
	{
		// posting results
		$sql = "INSERT INTO color ";
		$sql .= "VALUES ('', '$_POST[colorname]', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
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