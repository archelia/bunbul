<?php
	include "../global/global.php";
	if(isset($_SESSION['custmyaccount'])){header("location: homepage.php");}
	include "header.php";	
	$pagecall = "addcustomeraddress";
	include "frontcontroller.php";	
	
	// sql of order-
	// don't forget to add pagination on this page
?>
<div class="container">
	<div class="front-content myaccount">
		<h1>MY ORDER</h1>
		<?php
			include "myaccountlinks.php";
		?>
		<div class="message">
			<p><?php if($pesan!=""){ echo $pesan; }?></p>
		</div>
		<div class="order-col">
			<h5>Order History</h5>
			<table width="100%" cellpadding="0" cellspacing="0">
			<colgroup>
				<col width="10%">
				<col width="25%">
				<col width="25%">
				<col width="25%">
			</colgroup>
			<tr>
				<th align="center">Order Date</th>
				<th align="center">Order No</th>
				<th align="center">Order Total</th>
				<th align="center">Status</th>
			</tr>
			<tr>
				<td align="right">2016-05-18</td>
				<td align="center">123456789</td>
				<td align="right">590000</td>
				<td align="center">Terkirim</td>
			</tr>
			<tr>
				<td align="right">2016-05-18</td>
				<td align="center">123456789</td>
				<td align="right">590000</td>
				<td align="center">Terkirim</td>
			</tr>
			<tr>
				<td align="right">2016-05-18</td>
				<td align="center">123456789</td>
				<td align="right">590000</td>
				<td align="center">Terkirim</td>
			</tr>
			<tr>
				<td align="right">2016-05-18</td>
				<td align="center">123456789</td>
				<td align="right">590000</td>
				<td align="center">Terkirim</td>
			</tr>		
			</table>
		</div>

	</div>	
</div>
<?php
if($pesan!=""){
	if($success!=1){
		echo '<script>
		$(".message").addClass("error");
		</script>
		';
	}
	else{
		echo '<script>
		$(".message").addClass("valid");
		</script>
		';
	}
}
?>
<?php
	include "footer.php";
?>
<script type="text/javascript" src="../admin/js/jquery.validate.js"></script>
<script>
$(function() {
	// highlight
	var elements = $("input[type!='submit'], textarea, select");
	elements.focus(function() {
		$(this).parents('li').addClass('highlight');
	});
	elements.blur(function() {
		$(this).parents('li').removeClass('highlight');
	});
	
	
	$("#myaccount").validate()
});
</script>