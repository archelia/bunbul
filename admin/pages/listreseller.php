<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "listreseller";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
?>
<div class="container">
	<div class="content list listreseller">	
		<h3><?php echo ucwords("List ".$tabel); ?></h3>
		<?php								   
			// pagination
			include ("../pages/filter-box.php");
		?>	
		<div class="data-table">
			<table border="1" cellpadding="0" cellspacing="0" width="100%">
				<colgroup>
					<col width="5%">
					<col width="30%">
					<col width="30%">
					<col width="20%">
					<col width="">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>Reseller Name</th>
						<th>Email</th>
						<th>Cashback</th>
						<th>Detail</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
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
					
					// QUERY LISTING
					$sql = "SELECT r.*, c.customer_name, c. email FROM reseller r, customer c ";
					$sql .= "WHERE r.id_customer = c.id_customer ";
					
					// if show deleted data
					if(isset($_GET['discard'])){
						$sql .= "AND r.active=0 ";
					}
					else{
						$sql .= "AND r.active=1 ";
					}
					
					
					// if there's a search
					if (isset($_POST['tekscari']))
					{
						$sql .= "AND customer_name LIKE '%$_POST[tekscari]%' ";						
					}	
					
					// if there's a sorting
					if ((isset($_POST['sortingchoice'])) AND ($_POST['sortingchoice']!="all"))
					{
						$sorting_opt = explode(":", $_POST['sortingchoice']);
						$sql .= "ORDER BY ".$sorting_opt[0]." ".$sorting_opt[1]." ";
					}
					else{
						$sql .= "ORDER BY date_created DESC ";
					}
					
					// the pagination
					$sqlp = $sql."LIMIT $posisi,$batas";					
												
					$result = mysql_query($sqlp);
					while ($row=mysql_fetch_array($result))
					{
						echo '<tr>';
						echo '	<td align="center">
									<a href="'.$pageedit.'.php?idcust='.$row['id_customer'].'&act=chg&id='.$row["id_reseller"].'" class="link-opt"><img src="../images/icon-pencil.png" alt="Edit" title="Edit"></a>								
								</td>						
						';
						echo '	<td align="left">'.$row['customer_name'].'</td>';
						echo '	<td align="left">'.$row['email'].'</td>';
						echo '	<td align="right"><b>Rp. '.number_format($row['cashback'],0,',','.').'</b></td>';
						echo '	<td align="center"><a href=detailreseller.php?id='.$row['id_reseller'].'>See Detail</a></td>';
						
						// delete and reactivate button
						if(isset($_GET['discard'])){
							echo '	<td align="center">
									<a href="activate.php?id='.$row["id_reseller"].'&pageorigin='.$pagecall.'" class="link-opt"><img src="../images/greenbutton.png" alt="Activate" title="Activate"></a>
								</td>						
							';
						}
						else{
							echo '	<td align="center">
									<a href="deactive.php?id='.$row["id_reseller"].'&pageorigin='.$pagecall.'" class="link-opt"><img src="../images/icon-trash.png" alt="Delete" title="Delete"></a>
								</td>						
							';
						}
															
						echo '</tr>';
						
						// $no for pagination
						$no++;
					}
					if(mysql_num_rows($result)<1){echo"<tr>
						<td colspan='10' align='center'>
							<p>There's no data to display.</p>
						</td>
					</tr>";}
					?>
				</tbody>
			</table>			
		</div>		
		<div class="data-show">
			<?php 
				$jumlah = mysql_num_rows($result);
				$showing = $batas;
				if ($jumlah<$batas){$showing=$jumlah;}
				echo '<p>Showing '.$showing.' of '.$jumlah.' data.</p>'; 
			?>			
		</div>
		<?php								   
		// pagination
		include ("../modules/paging.php");
		// show unactive data
		include ("../modules/showunactivelink.php");
		?>			
		
	</div>
	<div class="clear"></div>
</div>

<?php
	include "footer.php";	
?>