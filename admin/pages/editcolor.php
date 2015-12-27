<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "editcolor";
	include "controller.php";
	
	if(isset($_GET['id'])){
		$qload = "SELECT * FROM color WHERE id_color='$_GET[id]'";
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
	<div class="content addcolor">		
		<div class="box white-box addcolor-box">			
			<h3>Add Color</h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="editcolor.php" name="editcolor" id="editcolor" method="POST">
					<ul>
						<li>
							<label for="colorname">Color<em>*</em></label>
							<input type="text" name="colorname" id="colorname" class="required" maxlength="20" placeholder="Color">
							<label for="colorname" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="color_code">HTML Code #</label>
							<input type="text" name="color_code" id="color_code" maxlength="6">
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
	$("#editcolor").validate();
});
</script>