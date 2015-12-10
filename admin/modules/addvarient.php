<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM size WHERE size_name='$_POST[sizename]' and size_type='$_POST[sizetype]'";
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Size exists.';
	}
	else
	{
		// posting results
		$sql = "INSERT INTO size ";
		$sql .= "VALUES ('', '$_POST[sizetype]', '$_POST[sizename]', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
		$qr = mysql_query($sql);
	
		if($qr)
		{
			$pesan = 'Size saved succesfully.';
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save Size';
		}	
	}
}
?>