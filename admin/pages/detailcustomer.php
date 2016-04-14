<?php	
	include "../../global/global.php";
	if(!isset($_GET['idcust'])){header("location: listcustomer.php");}
	include "header.php";	
	$pagecall = "detailcustomer";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
?>
<div class="container">
	<div class="content detail detailcustomer">	
		<h3><?php echo ucwords("Detail Customer"); ?></h3>
		<?php
			$sql= "SELECT * FROM customer WHERE id_customer=$_GET[idcust]";
			$result = mysql_query($sql);
			$row=mysql_fetch_array($result);
		?>
		<div class="detail-block">
			<div class="button-edit">
				<a href="" class="button edit-button">Edit</a>
			</div>
			<div class="button-promote"><a href="addreseller.php?idcust=<?php echo $_GET['idcust']; ?>" class="button" onclick="return confirm('Are you sure you want promote this customer?');">Promote to Reseller</a></div>
			<ul>
				<li>
					<h4><?php echo $row['customer_name'] ?></h4>
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
		</div>
		<div class="customer-address">
			<h3>Customer Address</h3>			
			<?php
				$sqladdress = "
					SELECT ca.*, c.city_name, p.province_name FROM customeraddress  ca, city c, province p 
					WHERE ca.id_city = c.id_city 
					AND c.id_province = p.id_province 
					AND id_customer=$_GET[idcust] 
					ORDER BY shipping_address DESC, billing_address DESC";
				$result = mysql_query($sqladdress);
				if(($result)&&(mysql_num_rows($result)>0)){
					while($rowa=mysql_fetch_array($result)){
						echo "
						<div class='address-block'>";
						echo "
							<h5>$rowa[address_name]</h5>
							<address>
								<span>$rowa[address]</span>
								<span>$rowa[address2]</span>
								<span>$rowa[city_name]</span>
								<span>$rowa[province_name]</span>
								<span class='phone'>$rowa[address_phone]</span>			
							</address>
							";						
						echo "
							<div class='default-address'>";
							if($rowa['shipping_address']=='1'){
								echo "<p>&#10003; shipping address</p>";
							}
							if($rowa['billing_address']=='1'){
								echo "<p>&#10003; billing address</p>";
							}
															
						echo"</div>";
						echo "						
							<div class='edit-address'>
							<a href='addcustomeraddress.php?act=chg&id=$rowa[id_customeraddress]&idcust=$rowa[id_customer]' class='small-button edit-button'>&nbsp;</a>
							<a href='deletion.php?id=$rowa[id_customeraddress]&pageorigin=$pagecall&idcust=$rowa[id_customer]' class='small-button del-button' onclick=\"return confirm('Are you sure you want to delete this item?');\">&nbsp;</a>
						</div>
						</div>";		
					}
				}
				
			?>
			<div class="address-block add-new">
				<div class="button-add">
					<a href="addcustomeraddress.php?idcust=<?php echo $_GET["idcust"]; ?>" class="button add-button">Add New</a>
				</div>
			</div>			
		</div>
		<div class="">
			<a href="listcustomer.php" class="button back-button">BACK</a>
		</div>
	</div>
	<div class="clear"></div>
	
</div>

<?php
	include "footer.php";	
?>