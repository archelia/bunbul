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
				switch($_GET['cat']){
					case "tshirt" :
						$cat_id="2";
						break;
					case "shoes" :
						$cat_id="1";
						break;
						
				}
				$sql .= "AND p.id_category = '$cat_id' ";						
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
						
				echo '<div class="product-price">Rp. '.number_format($row['product_price'],0,',','.').'</div>';
				//echo '	<div class="product-category">'.$row['category_name'].'</div>';		
				//echo '	<div><span class="prod-dc'.(($row['product_discount_active']=='1')?' ON':'').'">'.$row['product_discount'].'%'.'</span></div>';											
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
			include ("../admin/modules/paging.php");
		?>		
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