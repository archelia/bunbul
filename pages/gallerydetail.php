<?php	
	include "../global/global.php";
	include "header.php";	
	$pagecall = "gallery";
	if(!isset($_GET['idg'])){header("location: 404.php");}
	$sql = "SELECT * FROM gallery ";
	$sql .= "WHERE ";
	$sql .= "id_gallery='$_GET[idg]'";
	
	$result = mysql_query($sql);
	$row=mysql_fetch_array($result);
	if(mysql_num_rows($result)<1){
		header("location: 404.php");
	}
?>
<div class="container">
	<div class="front-content gallery-detail">	
		<h1>GALLERY DETAIL PAGE</h1>
		<div class="gallery-image">
		<?php
		if(file_exists("../source/gallery/".$row['id_gallery']."-1.jpg")){
					echo '<img src="../source/gallery/'.$row['id_gallery'].'-1.jpg" alt="picture" title="picture" class="image-preview">';
				}
		?>
		</div>
		<h2><?php echo $row['gallery_title'];?></h2>
		<div class="gallery-content">
			<?php echo htmlspecialchars_decode($row['gallery_description']); ?>
		</div>
	</div>
	
	<div class="clear"></div>
</div>
<?php
	include "footer.php";	
?>