<?php
$pesan="";
$success=0;
if(isset($_POST['submit']))
{
	//cek if email exist in customer table
	$sql = "SELECT id_customer FROM customer WHERE email = '$_POST[email]'";
	$query = mysql_query($sql);
	
	if(mysql_num_rows($query)>0){
		// get id customer from customer email
		$row = mysql_fetch_array($query);
	
		// delete all request token from this customer
		$sql = "DELETE FROM token_reset_password WHERE id_customer='$row[id_customer]'";
		$query = mysql_query($sql);

		// create new token
		$token = bin2hex(openssl_random_pseudo_bytes(15));
		$token = $row['id_customer'].$token;
		
		// create new link to reset password 
		$link = "localhost/vioreshop/resetpassword.php?token='$token'";
		
		// posting results		
		$sql = "INSERT INTO token_reset_password ";
		$sql .= "VALUES ('', '$row[id_customer]', now() + INTERVAL 7 DAY, '$token')";
					
		$query = mysql_query($sql);	

		if($query)
		{ 
			// sending email to customer
			$to = "somebody@example.com, somebodyelse@example.com";
			$subject = "HTML email";

			$message = file_get_contents('../source/emails/email-forgotpassword.php');

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			// More headers
			$headers .= 'From: <admin@vioreshop.com>' . "\r\n";
			$headers .= 'Cc: sinful@viore.biz' . "\r\n";

			mail($to,$subject,$message,$headers);
			
					
			$pesan = 'Password Reset request has been sent. Please open your email address to change your password immediately.';
			$success=1;
		}
		else
		{		
			$pesan = 'Failed to save User';
		}
	}
	else{
		$pesan = 'User email is not registered.';
	}	
}
?>