<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM announcement WHERE announcement_title='$_POST[announcementtitle]' ";
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_announcement != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, Announcement exists.';
	}
	else
	{	
		// if there's posting Edit
		if($_POST['submit']=="EDIT"){
			$sql = "UPDATE announcement ";
			$sql .= "SET announcement_title='$_POST[announcementtitle]' ";
			$sql .= ",announcement_description='$_POST[announcementdesc]' ";
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			$sql .= "WHERE id_announcement='$_POST[id]'";
		}
		else{
			// do query results
			$sql = "INSERT INTO announcement ";
			$sql .= "VALUES ('', '$_POST[announcementtitle]', '$_POST[announcementdesc]', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(),  1)";
		}
		
		$qr = mysql_query($sql);
	
		if($qr)
		{
			$pesan = 'Announcement saved succesfully. ';
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save Announcement.';
		}
	}	
}
?>