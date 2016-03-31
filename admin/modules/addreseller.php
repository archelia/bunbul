<?php
$pesan="";
$success=0;

if(isset($_POST['submit']))
{
	$query = "SELECT * FROM reseller WHERE id_customer='$_POST[idcust]' ";	
	// if there's posting Edit
	if($_POST['submit']=="EDIT"){
		$query .= "AND id_reseller != '$_POST[id]'";
	}
	
	$result=mysql_query($query);
	if(mysql_num_rows($result) > 0)
	{
		$rowres = mysql_fetch_array($result);
		if($rowres['active'==1])
			$pesan = 'Sorry, This customer is already an active reseller.';
		else{
			// reactivate customer
			$qactive = mysql_query("UPDATE reseller SET active='1' WHERE id_reseller='$_POST[id]'");
			
			if($qr)
			{
				$pesan = 'Reseller reactivated succesfully. ';
				$success=1;
			}
		}
	}
	else
	{		
		// if there's posting Edit
		if($_POST['submit']=="EDIT"){
			$sql = "UPDATE reseller ";
			$sql .= "SET cashback='$_POST[cashback]' ";
			$sql .= ",bank_acc_no='$_POST[bank_acc_no]' ";
			$sql .= ",acc_holder_name='$_POST[acc_holder_name]' ";
			$sql .= ",id_bank='$_POST[id_bank]' ";
			$sql .= ", date_edited=now() ";
			$sql .= ", user_edit='$_SESSION[viouser]' ";
			
			$sql .= "WHERE id_reseller='$_POST[id]'";
			
			$id = $_POST['id'];
		}
		else{
			// looking for id
			$sql = "SELECT id_reseller FROM reseller ORDER BY id_reseller DESC limit 1";
			$qr = mysql_query($sql);
			if(mysql_num_rows($qr)==0) {
				$id = 1;
			} 
			else {
				$rows=mysql_fetch_array($qr); 
				$id = $rows[0] + 1;
			}	
		
			// do query results
			$sql = "INSERT INTO reseller ";
			echo $sql .= "VALUES ('', '$_POST[idcust]', '$_POST[cashback]', now(), '$_POST[bank_acc_no]', '$_POST[id_bank]', '$_POST[acc_holder_name]', now(), '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
		}
		
		$qr = mysql_query($sql);
	
		if($qr)
		{
			$pesan = 'Reseller saved succesfully. ';
			//$pesan = $sql;
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save reseller.';
		}
	}	
	// upload pics when there's a pic uploaded
	$max = 1;
	$target_file = array();
	$imageFileType = array();
	$check = array();
	$uploadOk = array();
	$messageUpload = array();

	$target_dir = "../../source/reseller_idcard/";
	for ($i = 0; $i < $max; $i++) {
		$filename = "file".($i+1);
		
		if($_FILES["$filename"]['size'] != 0) {
			$messageUpload[$i]="";
			$uploadOk[$i] = 1;
			
			$target_file[$i] = $target_dir . basename($_FILES["$filename"]["name"]);
			$imageFileType[$i] = pathinfo($target_file[$i],PATHINFO_EXTENSION);
		  
			// begin validations
			$check[$i] = getimagesize($_FILES["$filename"]["tmp_name"]);
			if($check == false) {    
				$messageUpload[$i] .= "File is not an image."."/";
				$uploadOk[$i] = 0;

			}
			// Check file size
			if ($_FILES[$filename]["size"] > 2000000) {
				$messageUpload[$i] .= "Your file is too large."."/";
				$uploadOk[$i] = 0;
			}	  
			// Allow certain file formats
			if($imageFileType[$i] != "jpg" && $imageFileType[$i] != "png" && $imageFileType[$i] != "jpeg"
			&& $imageFileType[$i] != "gif" && $imageFileType[$i] != "JPG" && $imageFileType[$i] != "PNG" && $imageFileType[$i] != "JPEG" && $imageFileType[$i] != "GIF" ) {
				$messageUpload[$i] = "Only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk[$i] = 0;
			}
			
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk[$i] == 0) {
				$messageUpload[$i] = "Sorry, your file was not uploaded."."/".$messageUpload[$i];
			// if everything is ok, try to upload file
			} else {
				$newname = $target_dir . $id ."-". ($i+1) . ".jpg";
				if (move_uploaded_file($_FILES["$filename"]["tmp_name"], $newname)) {
					$messageUpload[$i] = "Picture no ".($i+1). " has been uploaded.";
				} else {
					$messageUpload[$i] = "Sorry, there was an error uploading your file.";
				}
			}
		}
	}
	
	$messageUpload = implode("/",$messageUpload);
	$messageUpload = str_replace("/", "<br>", $messageUpload);
}
?>