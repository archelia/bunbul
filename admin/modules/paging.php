<?php
// langkah 3 halaman
$tampil= mysql_query($sql);
$jmldata=mysql_num_rows($tampil);
$jmlhalaman=ceil($jmldata/$batas);
$file="../pages/".$pagecall.".php";
?>
<div class="pagination">
	<nav>
		<ul>		
		<?php		
		// link ke halaman berikutnya, first-previous
		if($halaman>1)
		{
			$previous=$halaman-1;
			echo "<li><a href='$file?halaman=1'>&lt;&lt;</a></li>";
			echo "<li><a href='$file?halaman=$previous'>&lt;</a></li>";
		}
		else
		{
			echo "<li><b>&lt;&lt;</b></li>";
			echo "<li><b>&lt;</b></li>";
		}
		
		// tampilkan link halaman 123 modif ala google
		// 3 angka awal
		if ($halaman>1)
			{				
				for ($i=$halaman-3; $i<$halaman; $i++)
				{
					if ($i<1) continue;					
					echo "<li><a href=$file?halaman=$i>$i</a></li>";
				}
			}
				
		// angka tengah
		echo "<li><b class='active'>$halaman</b></li>";		
		//3 angka setelahnya
		for ($i=$halaman+1;$i<($halaman+4);$i++)
		{
			if ($i > $jmlhalaman)
			break;
			echo "<li><a href=$file?halaman=$i>$i</a></li>";
		}
				
		// angka akhir
		echo ($halaman+2<$jmlhalaman ? " ...  
          <li><b><a href=$file?halaman=$jmlhalaman>$jmlhalaman</a></b></li> " : "");
	
		// link ke halaman selanjutnya
		if ($halaman<$jmlhalaman)
		{
			$next=$halaman+1;
			echo "<li><a href=$file?halaman=$next>&gt;</a></li>";
			echo "<li><a href=$file?halaman=$jmlhalaman>&gt;&gt;</a></li>";
		}
		else{
			echo "<li><b>&gt;</b></li>";
			echo "<li><b>&gt;&gt;</b></li>";
		}
?>
		</ul>
	</nav>	
</div>