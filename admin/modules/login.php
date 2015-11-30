<?php
$pesan="";
if(isset($_POST['submit']))
{
	// posting results
	$query = "SELECT * FROM user WHERE username='$_POST[username]' AND active=1";
	$result=mysql_query($query);
	if(mysql_num_rows($result) < 1)
	{
		$pesan = 'Sorry, username not found.';
	}
	else
	{
		$row= mysql_fetch_assoc($result);
		echo $row['password']."<br>";
		echo md5($_POST['password']);
		if($row['password'] == md5($_POST['password']))
		{
			$_SESSION['viouser'] = $row['id_user'];
			$_SESSION['username']	= $row['username'];
			$_SESSION['usertype']	= $row['user_type'];
			
			//update last login
			$query="UPDATE user SET last_login=now() WHERE id_user='".$_SESSION['viouser']."'";
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