<?php
include "../../global/global.php";
$success = array();

$query = "SELECT * FROM page WHERE page_name='$_POST[pagename]' AND id_category='$_POST[idcategory]'";
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
?>