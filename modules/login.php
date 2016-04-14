<?php
$pesan="";
if(isset($_POST['submit']))
{
	// posting results
	$query = "SELECT * FROM customer WHERE email='$_POST[email]' AND active=1";
	$result=mysql_query($query);
	if(mysql_num_rows($result) < 1)
	{
		$pesan = 'Sorry, user not found.';
	}
	else
	{
		$row= mysql_fetch_assoc($result);
		md5($_POST['password']);
		if($row['password'] == md5($_POST['password']))
		{
			$_SESSION['custlogin'] = $row['id_customer'];
			$_SESSION['custname']	= $row['customer_name'];
			
			//update last login
			$query="UPDATE customer SET last_online=now() WHERE id_customer='".$row['id_customer']."'";
			mysql_query($query);
			?>
			<script type="text/javascript">
			window.location="homepage.php";
			</script>
			<?php
		}
		else
		{
			$pesan = 'Username or Password incorrect.';
		}
	}
}
?>