<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM user WHERE username='$_POST[username]'";
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_user != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Username exists.';
	}
	else
	{
		$securepass = md5($_POST['password']);
		// if there's posting Edit
		if($_POST['submit']=="EDIT"){
			$sql = "UPDATE user ";
			$sql .= "SET username='$_POST[username]' ";
			
			//if password changed
			$row = mysql_fetch_array($result){
				if($row['password']) != $securepass{
					$sql .= ", password= '$securepass' ";
				}
			}
			
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			$sql .= "WHERE id_user='$_POST[id]'";
		}
		else{
			// posting results		
			$sql = "INSERT INTO user ";
			$sql .= "VALUES ('', '$_POST[username]', '$securepass', '$_POST[usertype]', now(), now(), now(), '$_SESSION[viouser]', '$_SESSION[viouser]', 1)";
		}
		
		
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