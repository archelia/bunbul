<?php
if(isset($_POST["submit"])){
	
	$description = htmlspecialchars($_POST['gallerycontent']);
	// looking for id
	$sql = "SELECT id_gallery FROM gallery ORDER BY id_gallery DESC limit 1";
	$qr = mysql_query($sql);
	if(mysql_num_rows($qr)==0) {
		$id = 1;
	} 
	else {
		$rows=mysql_fetch_array($qr); 
		$id = $rows[0] + 1;
	}	
	$url = $server."/gallery?id=".$id;
	
	// posting results
	$sql = "INSERT INTO gallery ";
	$sql .= "VALUES ('', '$_POST[gallerytitle]', '$url', '$description', 
	'$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
	$qr = mysql_query($sql);
		
	if($qr)
	{
		$success = 1;
		$message = 'Gallery saved succesfully.';			
	}
	else
	{	
		$success = 0;	
		$message = 'Failed to save gallery';
	}

	$max = 1;
	$target_file = array();
	$imageFileType = array();
	$check = array();
	$uploadOk = array();
	$messageUpload = array();

	$target_dir = "../../source/gallery/";
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
			if ($_FILES[$filename]["size"] > 5000000) {
				$messageUpload[$i] .= "Your file is too large."."/";
				$uploadOk[$i] = 0;
			}	  
			// Allow certain file formats
			if($imageFileType[$i] != "jpg" && $imageFileType[$i] != "png" && $imageFileType[$i] != "jpeg"
			&& $imageFileType[$i] != "gif" ) {
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
/*
// Check if file already exists
if (file_exists($target_file)) {
    $message = "Sorry, file already exists.";
    $uploadOk = 0;
}
*/
?>