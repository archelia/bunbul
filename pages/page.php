<?php	
	include "../global/global.php";
	include "header.php";	
	$pagecall = "pdp";
	if(!isset($_GET['page'])){header("location: 404.php");}
	$sql = "SELECT * FROM page ";
	$sql .= "WHERE active=1 ";
	$sql .= "AND page_name='$_GET[page]'";
	
	$result = mysql_query($sql);
	$row=mysql_fetch_array($result);
	if(mysql_num_rows($result)<1){
		header("location: 404.php");
	}
?>
<div class="container">
	<div class="front-content pages">	
		<h1><?php echo $row['page_title'];?></h1>
	</div>
	<div class="page-detail">
		<?php echo htmlspecialchars_decode($row['page_content']); ?>
	</div>
	<div class="clear"></div>
</div>
<?php
	include "footer.php";	
?>