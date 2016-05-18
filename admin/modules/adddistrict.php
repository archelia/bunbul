<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM district WHERE district_name='$_POST[districtname]' AND id_city='$_POST[idcity]'";
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_district != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, district name exists.';
	}
	else
	{
		// if there's posting Edit
		if($_POST['submit']=="EDIT"){
			$sql = "UPDATE district ";
			$sql .= "SET district_name='$_POST[districtname]' ";
			$sql .= ", id_city='$_POST[idcity]' ";
			$sql .= ", postal_fee='$_POST[postal_fee]' ";
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			$sql .= "WHERE id_district='$_POST[id]'";
		}
		else{
			// posting results
			$sql = "INSERT INTO district ";
			$sql .= "VALUES ('', '$_POST[idcity]', '$_POST[districtname]', '$_POST[postal_fee]','$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(),  1)";
			
		}
		
		$qr = mysql_query($sql);
		if($qr)
		{
			$pesan = 'District saved succesfully.';
			$success=1;
			$newkode = $_POST['idcity'];
		}
		else
		{		
			$pesan = 'Failed to save district';
			//$pesan = $sql;
		}
	}
}
?>