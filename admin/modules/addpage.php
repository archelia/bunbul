<?php
include "../../global/global.php";
$success = array();

$query = "SELECT * FROM page WHERE page_name='$_POST[pagename]'";
$result=mysql_query($query);
		
if(mysql_num_rows($result) > 0)
{
	$success[0] = 0;
	$success[1] = "Page Name is already exists, please choose another name.";
}
else
{
	$description = htmlspecialchars($_POST['pagedesc']);
	// posting results
	$sql = "INSERT INTO page ";
	$sql .= "VALUES ('', '$_POST[page_type]', '$_POST[page_name]', '$_POST[page_title]',
	'$_POST[page_url]', '$_POST[page_content]', '$_SESSION[viouser]', '$_SESSION[viouser]', now(), now(), 1)";
	$qr = mysql_query($sql);
		
	if($qr)
	{
		$success[0] = 1;
		$success[1] = 'page saved succesfully.';
		
		// save the id for future editting
		$saved = mysql_fetch_array(mysql_query("SELECT id_page FROM page WHERE page_name='$_POST[pagename]'"));
		$_SESSION["id_inputed"]= $saved["id_page"];			
	}
	else
	{	
		$success[0] = 0;	
		$success[1] = 'Failed to save page';
	}
}	


$max = 4;
$target_file = array();
$uploadOk = array();
$imageFileType = array();
$check = array();
$message = array();

for ($i = 0; $i < $max; $i++) { 
	$filename = "file".($i+1);
	if(isset($_FILES["$filename"])){	
		$message[$i]="";
		$uploadOk[$i] = 1;
		
		$target_file[$i] = $target_dir . basename($_FILES["$filename"]["name"]);
		$imageFileType[$i] = pathinfo($target_file[$i],PATHINFO_EXTENSION);
	  
		// begin validations
		$check[$i] = getimagesize($_FILES["$filename"]["tmp_name"]);
		if($check == false) {    
			$message[$i] .= "File is not an image."."/";
			$uploadOk[$i] = 0;

		}
		// Check file size
		if ($_FILES[$filename]["size"] > 5000000) {
			$message[$i] .= "Your file is too large."."/";
			$uploadOk[$i] = 0;
		}	  
		// Allow certain file formats
		if($imageFileType[$i] != "jpg" && $imageFileType[$i] != "png" && $imageFileType[$i] != "jpeg"
		&& $imageFileType[$i] != "gif" ) {
			$message[$i] = "Only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk[$i] = 0;
		}
		
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk[$i] == 0) {
			$message[$i] = "Sorry, your file was not uploaded."."/".$message[$i];
		// if everything is ok, try to upload file
		} else {
			$newname = $target_dir . $_SESSION['id_inputed'] . "-" . ($i+1) . ".jpg";
			if (move_uploaded_file($_FILES["$filename"]["tmp_name"], $newname)) {
				$message[$i] = "Picture no ".($i+1). " has been uploaded.";
			} else {
				$message[$i] = "Sorry, there was an error uploading your file.";
			}
		}
	}
} 
$message = implode("/",$message);
echo $message = str_replace("/", "<br>", $message);

/*
// Check if file already exists
if (file_exists($target_file)) {
    $message = "Sorry, file already exists.";
    $uploadOk = 0;
}
*/
?>