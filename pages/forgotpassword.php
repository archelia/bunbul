<?php
	include "../global/global.php";
	if(isset($_SESSION['viouser'])){header("location: homepage.php");}
	include "header.php";	
	$pagecall = "forgotpassword";
	include "frontcontroller.php";	
?>
<div class="container">
	<div class="front-content mini-content forgotpassword">
		<h1>FORGOT PASSWORD</h1>
		<div class="message">
			<p><?php if($pesan!=""){ echo $pesan; }?></p>
		</div>
		<div class="form-container">
			<form action="forgotpassword.php" name="forgotpassword" id="forgotpassword" method="POST">
			<ul>
				<li>
					<input type="email" name="email" id="email" class="" maxlength="50" placeholder="Your Email Address">
					<label for="email" class="error"></label>
				</li>
				<li class="info">
					<p class="righted small"><em>*</em>Harus diisi.</p>					
				</li>
				<li class="centered">
					<input type="submit" name="submit" id="submit" value="SUBMIT">
				</li>
			</ul>
			</form>
		</div>
	</div>	
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
	include "footer.php";
?>
<script type="text/javascript" src="../admin/js/jquery.validate.js"></script>
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