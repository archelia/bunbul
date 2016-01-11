<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "listproduct";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
?>
<div class="container">
	<div class="content list listproduct">	
		<h3><?php echo ucwords("List ".$tabel); ?></h3>
		<?php								   
			// pagination
			include ("../pages/filter-box.php");
		?>	
		<div class="data-table">
			<table border="1" cellpadding="0" cellspacing="0" width="100%">
				<colgroup>
					<col width="5%">
					<col width="5%">
					<col width="">
					<col width="10%">
					<col width="15%">
					<col width="10%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>Picture</th>
						<th>Product Name</th>
						<th>Category</th>
						<th>Price</th>
						<th>Discount</th>					
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
					$sql = "SELECT p.*, c.category_name FROM product p, category c ";
					$sql .= "WHERE p.active=1 ";
					$sql .= "AND p.id_category = c.id_category ";			
										
					// if there's a search
					if (isset($_POST['tekscari']))
					{
						$sql .= "AND product_name LIKE '%$_POST[tekscari]%' ";						
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
									<a href="'.$pageedit.'.php?act=chg&id='.$row["id_product"].'" class="link-opt"><img src="../images/icon-pencil.png" alt="Edit" title="Edit"></a>								
								</td>						
						';
						echo '	<td align="center">';
						if(file_exists("../../source/placeholder/".$row['id_product']."-1.jpg")){
							echo '<img src="../../source/placeholder/'.$row['id_product'].'-1.jpg" alt="picture" title="picture" class="image-preview">';
						}
						else echo '<img src="../../source/images/default.jpg" alt="picture" title="picture" class="image-preview">';				
						echo '</td>';
						echo '	<td align="left"><a href="'.$backserver.'/productdetail.php?pid='.$row['id_product'].'">'.$row['product_name'].'</a></td>';
						echo '	<td align="center">'.$row['category_name'].'</td>';
						
						echo '	<td align="right">Rp. '.number_format($row['product_price'],0,',','.').'</td>';
						echo '	<td align="center"><span class="prod-dc'.(($row['product_discount_active']=='1')?' ON':'').'">'.$row['product_discount'].'%'.'</span></td>';
															
						echo '	<td align="center">
									<a href="deactive.php?id='.$row["id_product"].'&pagecall='.$pagecall.'" class="link-opt"><img src="../images/icon-trash.png" alt="Delete" title="Delete"></a>
								</td>						
						';
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
		?>		
	</div>
	<div class="clear"></div>
</div>

<?php
	include "footer.php";	
?>