<?php
if (isset($_POST["save"]))
{				 	
	$query="UPDATE package ";
	$query.="SET active='$_POST[active]', name='$_POST[nama]', idcurr='$_POST[idcurr]', description='$_POST[desc]', qty='$_POST[qty]', price='$_POST[price]', userinput='$_SESSION[adzuser]', dateupdate=now() WHERE idpackage='$_POST[ide]'";
	$result=mysql_query($query);
	if ($result)
	echo "<script>alert('Package data has been saved !');window.location='list-packages.php';</script>";
	else echo "<script>alert('Failed to save !');window.location='list-packages.php';</script>";
}
?>	
	
