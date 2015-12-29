<?php
if(isset($_POST["submit"])){
	$query = "SELECT * FROM page WHERE page_name='$_POST[pagename]'";
	$result=mysql_query($query);
			
	if(mysql_num_rows($result) > 0)
	{
		$success = 0;
		$message = "Page Name is already exists, please choose another name.";
	}
	else
	{
		$description = htmlspecialchars($_POST['pagecontent']);
		$pagename = strtolower($_POST['pagename']);
		$pagename = str_replace(' ', '', $pagename);
		
		// posting results
		$sql = "INSERT INTO page ";
		$sql .= "VALUES ('', '$_POST[pagetype]', '$pagename', '$_POST[pagetitle]',
		'$_POST[pageurl]', '$description', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
		$qr = mysql_query($sql);
			
		if($qr)
		{
			$success = 1;
			$message = 'Page saved succesfully.';			
		}
		else
		{	
			$success = 0;	
			$message = 'Failed to save page';
		}
	}	

	$max = 4;
	$target_file = array();
	$imageFileType = array();
	$check = array();
	$uploadOk = array();
	$messageUpload = array();

	$target_dir = "../../source/content/";
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
				$newname = $target_dir . $_POST['pagename'] ."-". ($i+1) . ".jpg";
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