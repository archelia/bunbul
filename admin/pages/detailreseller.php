<?php	
	include "../../global/global.php";
	if(!isset($_GET['id'])){header("location: listreseller.php");}
	include "header.php";	
	$pagecall = "detailreseller";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
?>
<div class="container">
	<div class="content detail detailreseller">	
		<h3><?php echo ucwords("Detail Customer"); ?></h3>
		<?php
			$sql= "SELECT * FROM reseller r, customer c, bank b
				WHERE r.id_customer = c.id_customer 
				AND r.id_bank = b.id_bank 
				AND id_reseller=$_GET[id]";
			$result = mysql_query($sql);
			$row=mysql_fetch_array($result);
		?>
		<div class="detail-block">
			<div class="button-edit">			
				<a href="addreseller.php?idcust=<?php echo $row['id_customer']."&act=chg&id=".$row['id_reseller'];?>" class="button edit-button">Edit</a>
			</div>
			<div class="button-promote">
				<a href="deactive.php?id=<?php echo $row["id_reseller"]."&pageorigin=".$pagecall;?>" 
				class="button">Deactivate Reseller</a></div>
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
		<h3>Reseller Records</h3>
		<div class="detail-block detail-records">
			<ul>
				<li>
					<span class="entitle">Cashback Rewards</span>
					<span>
						<?php echo $row['cashback']; ?>
					</span>
				</li>
				<li>
					<span class="entitle">Last Purchase Date</span>
					<span>
						<?php echo $row['last_purchase']; ?>
					</span>
				</li>
				<li>
					<span class="entitle">Bank Account</span>
					<span>
						<?php echo $row['id_bank']; ?>
					</span>
				</li>
				<li>
					<span class="entitle">Bank Account Number</span>
					<span>
						<?php echo $row['bank_acc_no']; ?>
					</span>
				</li>
				<li>
					<span class="entitle">Bank Account Holder Name</span>
					<span>
						<?php echo $row['acc_holder_name']; ?>
					</span>
				</li>
				<li>
					<span class="entitle">Total Purchase</span>
					<span>
						<?php 
						//echo total purchase; 
						//$sqlo = "SELECT * FROM order";
						?>
					</span>
				</li>
				<li>
					<span class="entitle">Total Purchase (this month)</span>
					<span>
						<?php 
						// total purchase this month; 
						//$sqlo = "SELECT * FROM order";
						?>
					</span>
				</li>				
			</ul>
		</div>
		<div class="">
			<a href="listreseller.php" class="button back-button">BACK</a>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php
	include "footer.php";	
?>