<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addcategory";
	include "controller.php";
?>
<div class="container">
	<div class="content addcategory">		
		<div class="box white-box addcategory-box">			
			<h3>Add Category</h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="addcategory.php" name="addcategory" id="addcategory" method="POST">
					<ul>
						<li>
							<label for="categoryname">Category Name<em>*</em></label>
							<input type="text" name="categoryname" id="categoryname" class="required" maxlength="20" placeholder="Category Name">
							<label for="categoryname" class="error">This is a required field.</label>
						</li>
						
						<li>
							<label for="categorydesc">Category Description<em>*</em></label>
							<textarea name="categorydesc" id="categorydesc" cols="30" rows="7" placeholder="Description"></textarea>
							<label for="categorydesc" class="error">This is a required field.</label>
						</li>
						<li><p class="righted small"><em>*</em>Required fields.</p>					
						</li><li class="centered"><input type="submit" name="submit" id="submit" value="CREATE"></li>
					</ul>
				</form>
			</div>			
		</div>
		
	</div>
	<div class="clear"></div>
</div>
<?php
if($pesan!=""){
	if($success!=1){
		echo '<script>
		$(".message").addClass("error");
		</script>
		';
	}
	else{
		echo '<script>
		$(".message").addClass("valid");
		</script>
		';
	}
}
?>
<?php
	include "/footer.php";
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
	$("#addcategory").validate();
});
</script>