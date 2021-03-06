<?php	
	include "../../global/global.php";
	// GET kode
	if(isset($_GET['kode'])){$kode=$_GET['kode'];}
	else if(isset($_POST['kode'])){$kode=$_POST['kode'];}
	else {header("Location: listprovince.php");}
	
	include "header.php";	
	$pagecall = "listcity";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
	
	// GET province Name
	$sqlx = "SELECT province_name FROM province c ";
	$sqlx .= "WHERE c.id_province='$kode' ";
	$rowx = mysql_fetch_array(mysql_query($sqlx));
?>
<div class="container">
	<div class="content list listcity">	
		<h3><?php echo ucwords("List ".$tabel)." of ".$rowx['province_name']; ?></h3>
		<?php								   
			// pagination
			include ("../pages/filter-box.php");
		?>	
		<div class="data-table">
			<table border="1" cellpadding="0" cellspacing="0" width="100%">
				<colgroup>
					<col width="5%">
					<col width="">
					<col width="5%">
					<col width="5%">
				</colgroup>
				<thead>
					<tr>
						<th>&nbsp;</th>
						<th>City</th>
						<th>&nbsp;</th>
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
					$sql = "SELECT s.*, c.province_name FROM city s, province c ";
					
					// if show deleted data
					if(isset($_GET['discard'])){
						$sql .= "WHERE s.active=0 ";
					}
					else{
						$sql .= "WHERE s.active=1 ";
					}
					
					$sql .= "AND s.id_province=c.id_province ";
					$sql .= "AND c.id_province='$kode' ";
									
					// if there's a search
					if (isset($_POST['tekscari']))
					{
						$sql .= "AND s.id_province= c.id_province ";
						$sql .= "AND (city_name LIKE '%$_POST[tekscari]%' OR province_name LIKE '%$_POST[tekscari]%') ";						
					}	
					
					// if there's a sorting
					if ((isset($_POST['sortingchoice'])) AND ($_POST['sortingchoice']!="all"))
					{
						$sorting_opt = explode(":", $_POST['sortingchoice']);
						$sql .= "ORDER BY ".$sorting_opt[0]." ".$sorting_opt[1]." ";
					}
					else{
						$sql .= "ORDER BY city_name ASC ";
					}
					
					// the pagination
					$sqlp = $sql."LIMIT $posisi,$batas";					
												
					$result = mysql_query($sqlp);
					while ($row=mysql_fetch_array($result))
					{
						echo '<tr>';
						echo '	<td align="center">
									<a href="'.$pageedit.'.php?kode='.$kode.'&act=chg&id='.$row["id_city"].'" class="link-opt"><img src="../images/icon-pencil.png" alt="Edit" title="Edit"></a>								
								</td>						
						';
						echo '	<td align="left">'.$row['city_name'].'</td>';
						echo '	<td align="center"><a href="listdistrict.php?kode='.$row["id_city"].'"><img src="../images/icon-sub.png" alt="See District List" title="See District List"></a></td>';

						// delete and reactivate button
						if(isset($_GET['discard'])){
							echo '	<td align="center">
									<a href="activate.php?id='.$row["id_city"].'&pageorigin='.$pagecall.'" class="link-opt"><img src="../images/greenbutton.png" alt="Activate" title="Activate"></a>
								</td>						
							';
						}
						else{
							echo '	<td align="center">
									<a href="deactive.php?id='.$row["id_city"].'&pageorigin='.$pagecall.'" class="link-opt"><img src="../images/icon-trash.png" alt="Delete" title="Delete"></a>
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
			<a href="listprovince.php" class="button back-button">
			Back to Province List</a>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php
	include "footer.php";	
?>