<?php	
	include "../../global/global.php";
	// GET kode
	if(isset($_GET['kode'])){$kode=$_GET['kode'];}
	else if(isset($_POST['kode'])){$kode=$_POST['kode'];}
	else {header("Location: listcity.php");}
	
	include "header.php";	
	$pagecall = "listdistrict";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
	
	// GET city Name
	$sqlx = "SELECT city_name, id_province FROM city c ";
	$sqlx .= "WHERE c.id_city='$kode' ";
	$rowx = mysql_fetch_array(mysql_query($sqlx));
?>
<div class="container">
	<div class="content list listdistrict">	
		<h3><?php echo ucwords("List ".$tabel)." of ".$rowx['city_name']; ?></h3>
		<?php								   
			// pagination
			include ("../pages/filter-box.php");
		?>	
		<div class="data-table">
			<table border="1" cellpadding="0" cellspacing="0" width="100%">
				<colgroup>
					<col width="5%">
					<col width="">
					<col width="20%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>district</th>
						<th>Shipping Cost</th>
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
					$sql = "SELECT s.*, c.city_name FROM district s, city c ";
					
					// if show deleted data
					if(isset($_GET['discard'])){
						$sql .= "WHERE s.active=0 ";
					}
					else{
						$sql .= "WHERE s.active=1 ";
					}
					
					$sql .= "AND s.id_city=c.id_city ";
					$sql .= "AND c.id_city='$kode' ";
									
					// if there's a search
					if (isset($_POST['tekscari']))
					{
						$sql .= "AND s.id_city= c.id_city ";
						$sql .= "AND (district_name LIKE '%$_POST[tekscari]%' OR city_name LIKE '%$_POST[tekscari]%') ";						
					}	
					
					// if there's a sorting
					if ((isset($_POST['sortingchoice'])) AND ($_POST['sortingchoice']!="all"))
					{
						$sorting_opt = explode(":", $_POST['sortingchoice']);
						$sql .= "ORDER BY ".$sorting_opt[0]." ".$sorting_opt[1]." ";
					}
					else{
						$sql .= "ORDER BY district_name ASC ";
					}
					
					// the pagination
					$sqlp = $sql."LIMIT $posisi,$batas";					
												
					$result = mysql_query($sqlp);
					while ($row=mysql_fetch_array($result))
					{
						echo '<tr>';
						echo '	<td align="center">
									<a href="'.$pageedit.'.php?kode='.$kode.'&act=chg&id='.$row["id_district"].'" class="link-opt"><img src="../images/icon-pencil.png" alt="Edit" title="Edit"></a>								
								</td>						
						';
						echo '	<td align="left">'.$row['district_name'].'</td>';
						echo '	<td align="right">Rp. '.number_format($row['postal_fee'],0,',','.').'</td>';

						// delete and reactivate button
						if(isset($_GET['discard'])){
							echo '	<td align="center">
									<a href="activate.php?id='.$row["id_district"].'&pageorigin='.$pagecall.'" class="link-opt"><img src="../images/greenbutton.png" alt="Activate" title="Activate"></a>
								</td>						
							';
						}
						else{
							echo '	<td align="center">
									<a href="deactive.php?id='.$row["id_district"].'&pageorigin='.$pagecall.'" class="link-opt"><img src="../images/icon-trash.png" alt="Delete" title="Delete"></a>
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
		include ("../modules/pagingwithkode.php");

		// show unactive data
		include ("../modules/showunactivelink.php");
		?>	
		
		<div class="go-back">
			<a href="listcity.php?kode=<?php echo $rowx['id_province']; ?>" class="button back-button">
			Back to City List</a>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php
	include "footer.php";	
?>