<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "listpage";
	include "controller.php";
?>
<div class="container">
	<div class="content list listpage">	
		<h3>List page</h3>
		<?php								   
			// pagination
			include ("../pages/filter-box.php");
		?>	
		<div class="data-table">
			<table border="1" cellpadding="0" cellspacing="0" width="100%">
				<colgroup>
					<col width="5%">
					<col width="20%">
					<col width="20%">
					<col width="">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>Page Name</th>
						<th>Page Title</th>
						<th>Page Url</th>
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
					$sql = "SELECT * FROM page ";
					
					// if there's a search
					if (isset($_POST['tekscari']))
					{
						$sql .= "WHERE page_name LIKE '%$_POST[tekscari]%' ";						
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
									<a href="editpage?action=ubah&kode='.$row["id_page"].'" class="link-opt"><img src="../images/icon-pencil.png" alt="Edit" title="Edit"></a>								
								</td>						
						';
						echo '	<td align="left">'.$row['page_name'].'</td>';
						echo '	<td align="left">'.$row['page_title'].'</td>';
						echo '	<td align="left">'.$row['page_url'].'</td>';
															
						echo '	<td align="center">
									<a href="deletion.php?kode='.$row["id_page"].'&pagecall='.$pagecall.'" class="link-opt"><img src="../images/icon-trash.png" alt="Delete" title="Delete"></a>
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