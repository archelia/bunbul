<?php
function sendemailtocustomer(){
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

function sendemailpaymentconfirm($noorder){
	// sending email to customer
	$to = "sinfulshoesindo@gmail.com";
	$subject = "A payment Confirmation has been received.";

	$message = file_get_contents('../source/emails/email-paymentconfirm.php?no='.$noorder);

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
?>