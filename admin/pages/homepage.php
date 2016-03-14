<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "homepage";
	include "controller.php";
?>
<div class="container">
	<div class="content homepage">	
		<?php
		$sql = "SELECT * FROM announcement WHERE active=1 ORDER BY date_created DESC";
		$query = mysql_query($sql);
		while($row=mysql_fetch_array($query)){
			echo '
			<div class="announce-block">
				<p class="date">'.$row['date_created'].'</p>
				<h3>'.$row['announcement_title'].'</h3>
				<div class="editor">
					<article>
						<p>'.$row['announcement_description'].'</p>
					</article>
				</div>
			</div>
			';
		}
		?>
		
					
				
		
	</div>
	<div class="clear"></div>
</div>
<?php
	include "footer.php";
?>
<script>
$(function() {
	// highlight
	var elements = $("input[type!='submit'], textarea, select");
	elements.focus(function() {
		$(this).parents('li').addClass('highlight');
	});
	elements.blur(function() {
		$(this).parents('li').removeClass('highlight');
	});
	$("#login").validate()
});
</script>