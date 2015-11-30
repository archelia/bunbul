<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM user WHERE username='$_POST[username]'";
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Username exists.';
	}
	else
	{
		// posting results
		$securepass = md5($_POST['password']);
		$sql = "INSERT INTO user ";
		$sql .= "VALUES ('', '$_POST[username]', '$securepass', '$_POST[usertype]', now(), now(), now(), '$_SESSION[viouser]', '$_SESSION[viouser]', 1)";
		$qr = mysql_query($sql);	
	
		if($qr)
		{
			$pesan = 'User saved succesfully.';
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save User';
		}
	}
}
?>