<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addsize";
	include "controller.php";
?>
<div class="container">
	<div class="content addsize">		
		<div class="box white-box addsize-box">			
			<h3>Add Size</h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="addsize.php" name="addsize" id="addsize" method="POST">
					<ul>
						<li>
							<label for="sizetype">Product Type<em>*</em></label>
							<select name="sizetype" id="sizetype">
								<option value="1">Shoes</option>
								<option value="2" selected>T-Shirt</option>
							</select>
							<label for="sizetype" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="sizename">Size<em>*</em></label>
							<input type="text" name="sizename" id="sizename" class="required" maxlength="20" placeholder="Size">
							<label for="sizename" class="error">This is a required field.</label>
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
	$("#addsize").validate();
	$("#addsize").submit(function(){
		if($("#password").val() != $("#password1").val()){
			$("#password1").removeClass("valid");
			$("#password1").addClass("error");
			$("#password1").next("label").html("Please enter the same password as above");
			$("#password1").next("label").show();
			return false;
		}
	});
});
</script>