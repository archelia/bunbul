<?php
	include "../global/global.php";
	if(!isset($_SESSION['custlogin'])){header("location: login.php");}
	include "header.php";	
	$pagecall = "myaccount";
	include "frontcontroller.php";	
	
	//$_SESSION[custlogin] = 1;
	$sql= "SELECT * FROM customer WHERE id_customer=$_SESSION[custlogin]";
	$result = mysql_query($sql);
	$row=mysql_fetch_array($result);
?>
<div class="container">
	<div class="front-content myaccount">
		<h1>MY ACCOUNT</h1>
		<div class="breadcrumb">
			<ul>
				<li><a href="homepage.php">Home</a></li>
				<li><b>My Account</b></li>
			</ul>
		</div>
		<?php
		include "myaccountlinks.php";
		?>
		<div class="message">
			<p><?php if($pesan!=""){ echo $pesan; }?></p>
		</div>
		<div class="twocols address-col">
			<h6>Hello <?php echo ucwords($row['customer_name']); ?></h6>
			<p>You can view your last activities and edit your personal info here.</p>
			<div class="acc-info">			
				<h5>Account Info</h5>
				<ul>
					<li>
						<span class="entitle">Name</span>
						<span><?php echo $row['customer_name'] ?></span>
					<li>
						<span class="entitle">Email</span>
						<span><?php echo $row['email'] ?></span>
					</li>
					<li>
						<span class="entitle">Birthday</span>
						<span><?php echo date("j F Y",strtotime($row['birthday'])); ?></span>
					</li>
					<li>
						<span class="entitle">Gender</span>
						<span><?php echo (($row['gender']==1)?"Male":"Female"); ?></span>
					</li>
					<li>
						<span class="entitle">Join Date</span>
						<span><?php echo date("j M Y H:i:s",strtotime($row['date_created'])); ?></span>
					</li>
					<li>
						<span class="entitle">Last login</span>
						<span><?php echo date("j M Y H:i:s",strtotime($row['last_online'])); ?></span>
					</li>
					<li>
						<span class="entitle">Subscribe Newsletter</span>
						<span><?php echo (($row['subscribe']==1)?"Yes":"No") ?></span>
					</li>
				</ul>
				<div class="edit_address">
					<a href="myaccountinfo.php" class="small-button edit-button">Edit</a>
				</div>
			</div>
			<?php
			$sqladdress = "	SELECT ca.*, c.city_name, p.province_name FROM customeraddress  ca, city c, province p 
				WHERE ca.id_city = c.id_city 
				AND c.id_province = p.id_province 
				AND id_customer='$_SESSION[custlogin]' 
				AND shipping_address='1'";
			$result = mysql_query($sqladdress);
			if(($result)&&(mysql_num_rows($result)>0)){
				// display empty result
				echo "<div class='acc-address'>";
				echo "<h5>Default Shipping Address</h5>";	
				$rowa=mysql_fetch_array($result);
					echo "<div class='address-block'>";
					echo "
						<address>
							<span>$rowa[address_name]</span>
							<span>$rowa[address]</span>
							<span>$rowa[address2]</span>
							<span>$rowa[city_name]</span>
							<span>$rowa[province_name]</span>
							<span class='phone'>$rowa[address_phone]</span>			
						</address>
						</div>";						
				echo "<div class='edit_address'>
						<a href='addcustomeraddress.php' class='small-button edit-button'>Edit</a>
					</div>";
				echo "</div>";
			}		
			?>		
			<div class="clear"></div>
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