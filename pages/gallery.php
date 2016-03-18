<?php	
	include "../global/global.php";
	include "header.php";	
	$pagecall = "gallery";
?>
<div class="container">
	<div class="front-content gallery">	
		<h1>GALLERY</h1>
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
			$sql = "SELECT * FROM gallery ";
			$sql .= "WHERE active=1 ";

			// if there's a search
			if (isset($_POST['tekscari']))
			{
				$sql .= "AND gallery_title LIKE '%$_POST[tekscari]%' ";						
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
				echo '<div class="gallery-block">';					
				echo '<div class="gallery-pic"><div class="pic-content">';
				if(file_exists("../source/gallery/".$row['id_gallery']."-1.jpg")){
					echo '<a href="gallerydetail.php?idg='.$row['id_gallery'].'"><img src="../source/gallery/'.$row['id_gallery'].'-1.jpg" alt="picture" title="picture" class="image-preview"></a>';
				}
				else echo '<a href="gallerydetail.php?idg='.$row['id_gallery'].'"><img src="../source/images/default.jpg" alt="picture" title="picture" class="image-preview"></a>';
				echo '</div></div>';
				
				echo '<div class="product-name"><a href="gallerydetail.php?idg='.$row['id_gallery'].'"><h3>'.$row['gallery_title'].'</h3></a></div>';
						
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
<script type='text/javascript' src="../source/js/jquery.validate.js"></script>
<script>
$( document ).ready(function() {
	$( "#sortingchoice" ).change(function() {
	  $( "#sorting" ).submit();
	});
});
</script>