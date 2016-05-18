<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	// posting results
	$sql = "SELECT * FROM customer WHERE email='$_POST[email]' AND active=1";
	$result=mysql_query($sql);
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
			$sql="UPDATE customer SET last_online=now() WHERE id_customer='".$row['id_customer']."'";
			$query = mysql_query($sql);
			if($query){
				$success=1;				
				if(isset($_POST['pagecall'])){
				?>
				<script type="text/javascript">
				window.location="checkout-address.php";
				</script>
				<?php	
				}
				else{		
				?>
				<script type="text/javascript">
				window.location="homepage.php";
				</script>
				<?php
				}
			}
			else{
				$pesan = 'An error occured. Please call the administrator.';
			}
			
		}
		else
		{
			$pesan = 'Username or Password incorrect.';
		}
	}
}
?>