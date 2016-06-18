<?php
$header = "";
$footer = "";

$contentemailheader = '<html>
				<head>
					<title>Viore Shop</title>
				</head>
				<body>
					<table align="center" style="border-spacing: 0; font-family: Helvetica, Arial, Sans-Serif; font-size: 14px; color: #777777; width: 600px;">
					<tr>
						<td style="height: 55px; background-color: #fff; border-color: #8B7B64 #f4f1f3 #f4f1f3; border-style: solid; border-width: 6px 0 1;" bgcolor="#fff">
							<table width="100%" style="border-spacing: 0; font-family: Helvetica, Arial, Sans-Serif; font-size: 14px; color: #777777; width: 100%;">
							<tr valign="middle">
								<td align="left" style="padding-left: 20px;"><img src="http://vioreshop.com/source/images/logo.png" width="" height="40" title="" alt=""></td>
								<td align="right" style="padding-right: 20px;"><a href="" style="color: #575757; text-decoration: none;">www.vioreshop.com</a></td>
							</tr>
							</table>
						</td>
					</tr>';
$contentemailfooter = '</table>
				</body>
				</html>';;

function sendemailordertocustomer($idorder){
	//load data order, payment method, shipping method
	$sql = "SELECT po.*, pm.method_title as payment-method, pm.description as payment-method-desc, 
			sm.method_title as shipping-method, customer_name  
			FROM purchase_order o, paymentmethod pm, shippingmethod sm 
			WHERE id_order=$idorder 
			AND o.id_shippingmethod = sm.shippingmethod 
			AND o.id_paymentmethod = pm.paymentmethod ";
		
	// sending email to customer
	$to = "somebody@example.com, somebodyelse@example.com";
	$subject = "HTML email";
	
	// load data customer, order, payment method, shipping method
	$message = '<tr>
					<td style="background-color: #ABA58E; padding: 20px;">
						<table style="border-spacing: 0; font-family: Helvetica, Arial, Sans-Serif; font-size: 14px; color: #777777; width: 100%;">
						<tr>
							<td><img src="http://vioreshop.com/source/content/about-1.jpg" title="" alt=""></td>
						</tr>
						<tr>
							<td>
							<table style="border-spacing: 0; font-family: Helvetica, Arial, Sans-Serif; font-size: 12px; color: #777777; width: 100%; background-color: #ffffff; padding: 35px 15px 15px; border: 1px solid #dedede;" bgcolor="#ffffff">
							<tr>
								<td style="font-size: 18px; color: #7E6C58; padding-bottom: 15px;">VIORE SHOP ORDER CONFIRMATION</td>
							</tr>
							<tr>
								<td style="line-height: 20px;">
									<p>Dear Customer,</p>
									<p>Pesanan anda telah diterima,
									Mohon lakukan pembayaran sesuai dengan pembayaran pilihan anda di :</p>
									<ul>					
										<li>
											<span style="display: inline-block;  width: 150px; margin-right: 10px;">Metode Pembayaran </span>
											<span>: Tranfer Bank BCA</span></li>
										<li>
											<span style="display: inline-block;  width: 150px; margin-right: 10px;">No Rek </span>
											<span> : 123456789</span>
										</li>	
										<li>
											<span style="display: inline-block; width: 150px; margin-right: 10px;">Atas Nama </span>
											<span>: Alexander</span>
										</li>
									</ul>
									<p>Selambat-lambatnya 2x24 jam setelah email ini diterima.</p>
									<p>Apabila telah melakukan pembayaran silakan lakukan konfirmasi pembayaran di kolom order anda di :</p>
								</td>
							</tr> 
							<tr>
								<td height="40" style="line-height: 20px;" align="center">
									<a href="" style="color: #000000;">http://www.vioreshop.com/admin</a></td>
							</tr>
							<tr>
								<td style="line-height: 20px; padding-bottom: 15px;">
									Jika anda mengalami kesulitan dengan link di atas, silakan copy dan paste url di atas pada browser url anda.									
								</td>
							</tr>
							<tr>
								<td style="line-height: 20px; padding-bottom: 20px;">
									Hormat Kami,
								</td>
							</tr>
							<tr>
								<td style="line-height: 20px; padding-bottom: 20px; color: #7E6C58;">Viore Shop Admin
								</td>
							</tr>
							<tr>
								<td><hr color="#dedede" width="100%"></td>
							</tr>
							<tr>
								<td style="font-size: 12px;">
									Agar anda dapat terus berhubungan dengan kami, mohon simpan 
									<a href="" style="color: #000000;">admin@vioreshop.com</a> ke dalam buku alamat email anda.
								</td>
							</tr>
						</table>
					</td>
				</tr>
				</table>
				</td>
			</tr>';

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

function sendemailtocustomer2(){
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