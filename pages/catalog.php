<?php	
	include "../global/global.php";
	include "header.php";	
	$pagecall = "catalog";
?>
<div class="container">
	<div class="front-content catalog">	
		<h1>CATALOG PRODUCT</h1>
		<?php								   
			// pagination
			include ("filter-box.php");
		?>	
		<div class="product-container">
			<?php
			// step 1 pagination
			$batas=24;
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

			//if there is category request
			if (isset($_GET['cat']))
			{
				//get category id
				$sqcari = "SELECT id_category FROM category WHERE category_name='$_GET[cat]'";
				$qcari = mysql_query($sqcari);
				if($qcari){
					$rowcat = mysql_fetch_array($qcari);			
					$sql .= "AND p.id_category = '$rowcat[id_category]' ";	
				}									
			}	
			//if there is subcategory request
			if (isset($_GET['subcat']))
			{
				//get category id
				$sqcari = "SELECT id_subcategory FROM subcategory WHERE id_subcategory='$_GET[subcat]'";
				$qcari = mysql_query($sqcari);
				if($qcari){
					$rowcat = mysql_fetch_array($qcari);			
					$sql .= "AND p.id_subcategory = '$rowcat[id_subcategory]' ";	
				}	
			}
			
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
				echo '<div class="product-block">';	
				
				echo '<div class="product-pic">';
				if(file_exists("../source/placeholder/".$row['id_product']."-1.jpg")){
					echo '<a href="productdetail.php?pid='.$row['id_product'].'"><img src="../source/placeholder/'.$row['id_product'].'-1.jpg" alt="picture" title="picture" class="image-preview"></a>';
				}
				else echo '<a href="productdetail.php?pid='.$row['id_product'].'"><img src="../source/images/default.jpg" alt="picture" title="picture" class="image-preview"></a>';
				echo '</div>';
				
				echo '<div class="product-name"><a href="productdetail.php?pid='.$row['id_product'].'"><h3>'.$row['product_name'].'</h3></a></div>';
						
				// product price
				echo '<div class="product-price">';				
				if($row['product_discount_active']=='1'){
					$price = $row["product_price"] - ($row['product_discount']/100*$row["product_price"]);
					echo '<span class="before">
							Rp. '.number_format($row["product_price"],0,",",".").
						'</span>';
				}
				else{
					$price = $row["product_price"];
				}
				echo '<span>Rp. '.number_format($price,0,",",".").'</span>'; 
				echo '</div>';
				
				//echo '<div class="product-category">'.$row['category_name'].'</div>';	
				if ($row['product_discount_active']=='1'){
					echo '<div class="product-discount"><span class="prod-dc">'.$row['product_discount'].'% OFF</span></div>';
				}
															
				// $no for pagination
				$no++;
				echo '</div>';
			}
			echo "<div class='clear'></div>";
			if(mysql_num_rows($result)<1){echo"
			<div class='row-count'>
				<p>There's no data to display.</p>
			</div>";}
			?>		
		</div>									   			
		<?php
		// pagination
		// langkah 3 halaman
		$tampil= mysql_query($sql);
		$jmldata=mysql_num_rows($tampil);
		$jmlhalaman=ceil($jmldata/$batas);
		$file="../pages/".$pagecall.".php";
				
		if (isset($_GET['cat']))
		{
			$filewithcat = "&cat=$_GET[cat]";						
		}
		else if(isset($_GET['subcat']))
		{	
			$filewithcat = "&subcat=$_GET[subcat]";	
		}
		
		?>
		<div class="pagination">
			<nav>
				<ul>		
				<?php		
				// link ke halaman berikutnya, first-previous
				if($halaman>1)
				{
					$previous=$halaman-1;
					echo "<li><a href='$file?halaman=1".((isset($filewithcat))?$filewithcat:"")."'>&lt;&lt;</a></li>";
					echo "<li><a href='$file?halaman=$previous'".((isset($filewithcat))?$filewithcat:"").">&lt;</a></li>";
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
							echo "<li><a href=$file?halaman=$i".((isset($filewithcat))?$filewithcat:"").">$i</a></li>";
						}
					}					
				// angka tengah
				echo "<li><b class='active'>$halaman</b></li>";		
				//3 angka setelahnya
				for ($i=$halaman+1;$i<($halaman+4);$i++)
				{
					if ($i > $jmlhalaman)
					break;
					echo "<li><a href=$file?halaman=$i".((isset($filewithcat))?$filewithcat:"").">$i</a></li>";
				}
						
				// angka akhir
				echo ($halaman+3<$jmlhalaman ? "<li><b>...</b></li><li><a href=$file?halaman=$jmlhalaman".((isset($filewithcat))?$filewithcat:"").">$jmlhalaman</a></li>" : "");
			
				// link ke halaman selanjutnya
				if ($halaman<$jmlhalaman)
				{
					$next=$halaman+1;
					echo "<li><a href=$file?halaman=$next".((isset($filewithcat))?$filewithcat:"").">&gt;</a></li>";
					echo "<li><a href=$file?halaman=$jmlhalaman".((isset($filewithcat))?$filewithcat:"").">&gt;&gt;</a></li>";
				}
				else{
					echo "<li><b>&gt;</b></li>";
					echo "<li><b>&gt;&gt;</b></li>";
				}
				?>
				</ul>
			</nav>	
		</div>	
	</div>
	<div class="clear"></div>
</div>

<?php
	include "footer.php";	
?>
<script>
$( document ).ready(function() {
	$( "#sortingchoice" ).change(function() {
	  $( "#sorting" ).submit();
	});
});
</script>