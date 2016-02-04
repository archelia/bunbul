<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "listsubcategory";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
	
	// GET kode
	if(isset($_GET['kode'])){$kode=$_GET['kode'];}
	else if(isset($_POST['kode'])){$kode=$_POST['kode'];}
	else {header("Location: listcategory.php");}
	// GET Category Name
	$sqlx = "SELECT category_name FROM category c ";
	$sqlx .= "WHERE c.id_category='$kode' ";
	$rowx = mysql_fetch_array(mysql_query($sqlx));
?>
<div class="container">
	<div class="content list listsubcategory">	
		<h3><?php echo ucwords("List ".$tabel)." of ".$rowx['category_name']; ?></h3>
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
						<th>Subcategory</th>
						<th>Description</th>
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
					$sql = "SELECT s.*, c.category_name FROM subcategory s, category c ";
					
					// if show deleted data
					if(isset($_GET['discard'])){
						$sql .= "WHERE s.active=0 ";
					}
					else{
						$sql .= "WHERE s.active=1 ";
					}
					
					$sql .= "AND s.id_category=c.id_category ";
					$sql .= "AND c.id_category='$kode' ";
									
					// if there's a search
					if (isset($_POST['tekscari']))
					{
						$sql .= "AND s.id_category= c.id_category ";
						$sql .= "AND (subcategory_name LIKE '%$_POST[tekscari]%' OR category_name LIKE '%$_POST[tekscari]%') ";						
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
									<a href="'.$pageedit.'.php?kode='.$kode.'&act=chg&id='.$row["id_subcategory"].'" class="link-opt"><img src="../images/icon-pencil.png" alt="Edit" title="Edit"></a>								
								</td>						
						';
						echo '	<td align="left">'.$row['subcategory_name'].'</td>';
						echo '	<td align="left">'.$row['subcategory_desc'].'</td>';

						// delete and reactivate button
						if(isset($_GET['discard'])){
							echo '	<td align="center">
									<a href="activate.php?id='.$row["id_subcategory"].'&pageorigin='.$pagecall.'" class="link-opt"><img src="../images/greenbutton.png" alt="Activate" title="Activate"></a>
								</td>						
							';
						}
						else{
							echo '	<td align="center">
									<a href="deactive.php?id='.$row["id_subcategory"].'&pageorigin='.$pagecall.'" class="link-opt"><img src="../images/icon-trash.png" alt="Delete" title="Delete"></a>
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
		?>	
		
		<?php
		// show deleted data
		if($_SESSION['usertype']=="1"){						
		?>		
		<div class="show-discard">
			<p><a href="<?php echo $pagecall.'.php?discard' ?>">Show Unactive <?php echo ucwords($tabel);?> </a></p>
		</div>
		<?php
		}
		?>
		
		<div class="go-back">
			<a href="listcategory.php" class="button back-button">Back to Category List</a>
		</div>
	</div>
	<div class="clear"></div>
</div>

<?php
	include "footer.php";	
?>