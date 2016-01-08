<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "homepage";
	include "controller.php";
?>
<div class="container">
	<div class="content homepage">		
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