<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "listsize";
	include "controller.php";
?>
<div class="container">
	<div class="content list listsize">	
		<h3>List Size</h3>
		<?php								   
			// pagination
			include ("../pages/filter-box.php");
		?>	
		<div class="data-table">
			<table border="1" cellpadding="0" cellspacing="0" width="100%">
				<colgroup>
					<col width="5%">
					<col width="40%">
					<col width="">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>Category</th>
						<th>Size</th>
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
					$sql = "SELECT s.*, c.category_name FROM size s, category c ";
					$sql .= "WHERE s.id_category = c.id_category ";
					
					// if there's a search
					if (isset($_POST['tekscari']))
					{						
						$sql .= "AND (size_name LIKE '%$_POST[tekscari]%' OR category_name LIKE '%$_POST[tekscari]%') ";						
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
									<a href="'.$editpage.'?action=ubah&kode='.$row["id_size"].'" class="link-opt"><img src="../images/icon-pencil.png" alt="Edit" title="Edit"></a>								
								</td>						
						';
						echo '	<td align="left">'.$row['category_name'].'</td>';
						echo '	<td align="left">'.$row['size_name'].'</td>';
															
						echo '	<td align="center">
									<a href="deletion.php?kode='.$row["id_size"].'&pagecall='.$pagecall.'" class="link-opt"><img src="../images/icon-trash.png" alt="Delete" title="Delete"></a>
								</td>						
						';
						echo '</tr>';
						
						// $no for pagination
						$no++;
					}
					if(mysql_num_rows($result)<1){echo"<tr>
						<td colspan='10'>
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