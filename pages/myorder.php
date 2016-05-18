<?php
	include "../global/global.php";
	if(isset($_SESSION['custmyaccount'])){header("location: homepage.php");}
	include "header.php";	
	$pagecall = "myorder";
	include "frontcontroller.php";	
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
			<?php
			// step 1 pagination
			$batas=20;
			if (isset($_GET['halaman']))
				{$halaman=$_GET['halaman'];}
			if (empty($halaman))
			{
				$posisi=0;
				$halaman=1;
			}
			else
			{
				$posisi=($halaman-1)*$batas;
			}			
			// step 2 pagination
			$no=$posisi+1;
			
			/* List Order From this customer */			
			$sql = "SELECT * FROM purchase_order 
					WHERE active=1 
					AND id_customer='$_SESSION[custlogin]' ";
			$sql .= "ORDER BY date_created DESC ";		
			// the pagination
			$sqlp = $sql."LIMIT $posisi,$batas";	
			$query = mysql_query($sqlp);
			
			while($row = mysql_fetch_array($query)){
				echo '<tr>';
				echo '<td align="right">'.$row['order_date'].'</td>';
				echo '<td align="center"><a href="orderdetail.php?idorder='.$row['id_order'].'">'.$row['id_order'].'</a></td>';
				echo '<td align="right">'.$row['grandtotal'].'</td>';
				echo '<td align="right">'.$row['status'].'</td>';
				echo '</tr>';
			}
											   
			?>			
			</table>
		</div>
		<?php
		// pagination
		include ("../admin/modules/paging.php");	
		?>
	</div>	
</div>
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