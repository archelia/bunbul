<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "listuser";
	include "controller.php";
?>
<div class="container">
	<div class="content list listuser">	
		<h3>List User</h3>
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
						<th>Username</th>
						<th>User Type</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php					
					if (isset($_POST['search']))
					{
						if ($_POST['pilihancari']!="all")
						{
							$tekscari=$_POST['tekscari'];
							$sort=$_POST['pilihancari'];
						}
						$sql="SELECT * FROM user";
					}	
						
						$sql="SELECT t1 . * , t2.nama_kat_produk, t3.nama_kat_dua, t4.nama_merk FROM produk AS t1 INNER JOIN kat_produk AS t2 ON t1.kode_kat_produk = t2.kode_kat_produk INNER JOIN kat_dua AS t3 ON t1.kode_kat_dua = t3.kode_kat_dua INNER JOIN merk as t4 ON t1.kode_merk=t4.kode_merk ORDER BY t1.kode_produk DESC LIMIT $posisi,$batas";
						$sqla="SELECT t1 . * , t2.nama_kat_produk, t3.nama_kat_dua, t4.nama_merk FROM produk AS t1 INNER JOIN kat_produk AS t2 ON t1.kode_kat_produk = t2.kode_kat_produk INNER JOIN kat_dua AS t3 ON t1.kode_kat_dua = t3.kode_kat_dua INNER JOIN merk as t4 ON t1.kode_merk=t4.kode_merk ORDER BY t1.kode_produk DESC";
					
					else
					$sql="SELECT t1 . * , t2.nama_kat_produk, t3.nama_kat_dua, t4.nama_merk FROM produk AS t1 INNER JOIN kat_produk AS t2 ON t1.kode_kat_produk = t2.kode_kat_produk INNER JOIN kat_dua AS t3 ON t1.kode_kat_dua = t3.kode_kat_dua INNER JOIN merk as t4 ON t1.kode_merk=t4.kode_merk ORDER BY t1.kode_produk DESC LIMIT $posisi,$batas";
					$sqla="SELECT t1 . * , t2.nama_kat_produk, t3.nama_kat_dua, t4.nama_merk FROM produk AS t1 INNER JOIN kat_produk AS t2 ON t1.kode_kat_produk = t2.kode_kat_produk INNER JOIN kat_dua AS t3 ON t1.kode_kat_dua = t3.kode_kat_dua INNER JOIN merk as t4 ON t1.kode_merk=t4.kode_merk ORDER BY t1.kode_produk DESC";

					$result = mysql_query($sql) or die ("Ada yang salah !");

					
					
					
								
					$result = mysql_query("SELECT * FROM user ORDER BY active,date_created desc");
					while ($row=mysql_fetch_array($result))
					{
						echo '<tr>';
						echo '	<td align="center">
									<a href="" class="link-opt"><img src="../images/icon-pencil.png" alt="Edit" title="Edit"></a>								
								</td>						
						';
						echo '
								<td align="left">'.$row['username'].'</td>';
						$user_type = $row['user_type'];
						switch($user_type){
							case "1" :
							echo '<td>Super Admin</td>';
							break;
							case "2" :
							echo '<td>Administrator</td>';
							break;
							case "1" :
							echo '<td>Sales</td>';
							break;							
						}									
						echo '	<td align="center">
									<a href="" class="link-opt"><img src="../images/icon-trash.png" alt="Delete" title="Delete"></a>
								</td>						
						';
						echo '</tr>';
					}
					?>
				</tbody>
			</table>			
		</div>		
		<div class="data-show">
			<p>Showing 45 of 355 data.</p>
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