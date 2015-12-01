<div class="pagination">
	<nav>
		<ul>
			<li><a href="">1</a></li>
			<li><a href="">2</a></li>
			<li><a href="">3</a></li>
			<li><a href="">4</a></li>
			<li><a href="">5</a></li>
			<li><a href="">6</a></li>
		</ul>
	</nav>	
</div>
<?php
//set the limit
$batas=10;

// langkah awal halaman

if (isset($_GET['halaman'])){$halaman=$_GET['halaman'];}
if (empty($halaman))
{
	$posisi=0;
	$halaman=1;
}
else
{
	$posisi=($halaman-1)*$batas;
}
// langkah 2 halaman
$no=$posisi+1;
?>

<?php
while ($row=mysql_fetch_array($result))
{
	// kode untuk update dan delete pada file selanjutnya
	$kode=$row['kode_produk'];
	echo "<tr>";
	
	//nama foto
	$namafoto="$row[kode_produk]"."_1.jpg";
	
	if ($row['nonaktif']=='0')
	{
	echo "<td>$row[kode_produk]</td>";
	echo "<td>$row[nama_produk]</td>";
	echo "<td align='center'><img src='../pic/$namafoto' width='50' height='50' ></td>";
	echo "<td align='center'><a href='detailproduk.php?action=tambah&kode=".$kode."'>Spec</a><br><a href='detailproduk2.php?action=tambah&kode=".$kode."'>Spec baru</a></td>";
	echo "<td>$row[jumlah_produk]</td>";
	echo "<td>$row[nama_merk]</td>";
	echo "<td align='right'>Rp ".number_format($row['harga_awam'],0,',','.').",-</td>";
	echo "<td align='right'>$ ".number_format($row['harga_dolar'],0,',','.')."</td>";
	echo "<td align='center'><a href='updateproduk.php?action=ubah&kode=".$kode."'>Ubah</a></td>";
	echo "<td align='center'><a onclick=\"var a=confirm('Anda yakin akan menghapus data produk ini?'); if(a){location.href='hapusproduk.php?kode=$kode';}\" style=\"cursor:pointer\">Hapus</a>"; 
	echo "</tr>";
	}
	else
	{
	echo "<td bgcolor='#000000'><font color='white'>$row[kode_produk]</font></td>";
	echo "<td bgcolor='#000000'><font color='white'>$row[nama_produk]</font></td>";
	echo "<td bgcolor='#000000' align='center'><font color='white'><img src='../pic/$namafoto' width='50' height='50' ></td>";
	echo "<td bgcolor='#000000' align='center'><font color='white'><a href='detailproduk.php?action=tambah&kode=".$kode."'>Spec</a><br><a href='detailproduk.php?action=tambah&kode=".$kode."'>Spec baru</a></font></td>";
	echo "<td bgcolor='#000000'><font color='white'>$row[jumlah_produk]</font></td>";
	echo "<td bgcolor='#000000'><font color='white'>$row[nama_merk]</font></td>";
	echo "<td bgcolor='#000000' align='right'><font color='white'>Rp ".number_format($row['harga_awam'],0,',','.').",-</font></td>";
	echo "<td bgcolor='#000000' align='right'><font color='white'>$ ".number_format($row['harga_dolar'],0,',','.')."</font></td>";
	echo "<td bgcolor='#000000' align='center'><font color='white'><a href='updateproduk.php?action=ubah&kode=".$kode."'>Ubah</a></font></td>";
	echo "<td bgcolor='#000000' align='center'><font color='white'><a onclick=\"var a=confirm('Anda yakin akan menghapus data produk ini?'); if(a){location.href='hapusproduk.php?kode=$kode';}\" style=\"cursor:pointer\">Hapus</a></font></td>"; 
	echo "</tr>";
	}
	// $no ditambahkan utk halaman
	$no++;
}
	echo "</table>";
	echo "</div>";
	
	?>
	<!-- Tabel ini untuk pengaturan penulisan pada paging -->
	<table>
	<tr><td width="400">&nbsp;</td></tr>
	<tr>
	<td align="center">&nbsp;</td>
	<td>
	<?php
	
	// langkah 3 halaman
	$tampil= mysql_query($sqla);
	$jmldata=mysql_num_rows($tampil);
	$jmlhalaman=ceil($jmldata/$batas);
	$file="produklist.php";
		
	// link ke halaman berikutnya, first-previous
	if($halaman>1)
	{
	$previous=$halaman-1;
	echo "<a href='$file?halaman=1'> << First</a> | <a href=$file?halaman=$previous> < Previous</a> | ";
	}
	else
	echo "<< First | <Previous |";
		
	// tampilkan link halaman 123 modif ala google
	// 3 angka awal
	$angka="";
	if ($halaman>1)
		{				
			for ($i=$halaman-3; $i<$halaman; $i++)
			{
				if ($i<1) continue;					
				$angka =$angka." <a href=$file?halaman=$i>$i</a> ";
			}
		}
		else $angka =" ";
				
		// angka tengah
		$angka .="<b>$halaman</b>";		
		//3 angka setelahnya
		for ($i=$halaman+1;$i<($halaman+4);$i++)
		{
			if ($i > $jmlhalaman)
			break;
			$angka .=" <a href=$file?halaman=$i>$i</a> ";
		}
				
		// angka akhir
		$angka .= ($halaman+2<$jmlhalaman ?" ... <a href=$file?halaman=$jmlhalaman>$jmlhalaman</a> " : " ... ");
	
	// cetak angka semua
	echo "$angka";
	
	// link ke halaman selanjutnya
	if ($halaman<$jmlhalaman)
	{
	$next=$halaman+1;
	echo "<a href=$file?halaman=$next> Next > </a> | <a href=$file?halaman=$jmlhalaman> Last >> </a>";
	}
	else
	{
	echo "Next > | Last >>";
	}
	
	echo "</td></tr></table>";
	include ('./menubawah.php');
?>