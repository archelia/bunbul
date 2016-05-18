<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	$query = "SELECT * FROM city WHERE city_name='$_POST[cityname]' AND id_province='$_POST[idprovince]'";
	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_city != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$pesan = 'Sorry, city name exists.';
	}
	else
	{
		// if there's posting Edit
		if($_POST['submit']=="EDIT"){
			$sql = "UPDATE city ";
			$sql .= "SET city_name='$_POST[cityname]' ";
			$sql .= ",id_province='$_POST[idprovince]' ";
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			$sql .= "WHERE id_city='$_POST[id]'";
		}
		else{
			// posting results
			$sql = "INSERT INTO city ";
			$sql .= "VALUES ('', '$_POST[cityname]', '$_POST[idprovince]', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(),  1)";
			
		}
		
		$qr = mysql_query($sql);
		if($qr)
		{
			$pesan = 'City saved succesfully.';
			$success=1;
			$newkode = $_POST['idprovince'];
		}
		else
		{		
			$pesan = 'Failed to save city';
			//$pesan = $sql;
		}
	}
}
?>