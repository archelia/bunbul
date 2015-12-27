<?php	
	include "../../global/global.php";
	include "header.php";
	$pagecall = "editbrand";
	include "controller.php";
	
	if(isset($_GET['id'])){
		$qload = "SELECT * FROM brand WHERE id_brand='$_GET[id]'";
		$rload = mysql_query($qload);
		if(mysql_num_rows($rload))>0{
			$row = mysql_fetch_array($rload);
		}
		else{
			header("location: ../index.php");
		}
	}
	else{
		header("location: ../index.php");
	}	
?>
<div class="container">
	<div class="content addbrand">		
		<div class="box white-box addbrand-box">			
			<h3>Edit Brand</h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="editbrand.php" name="editbrand" id="editbrand" method="POST">
					<ul>
						<li>
							<label for="brandname">Brand Name<em>*</em></label>
							<input type="text" name="brandname" id="brandname" class="required" maxlength="20" placeholder="Brand Name">
							<label for="brandname" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="branddesc">Brand Description</label>
							<textarea name="branddesc" id="branddesc" cols="30" rows="6" placeholder="Brand Description"></textarea>
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
	$("#editbrand").validate();
});
</script>