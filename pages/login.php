<?php
	include "../global/global.php";
	if(isset($_SESSION['custlogin'])){header("location: homepage.php");}
	include "header.php";	
	$pagecall = "login";
	include "frontcontroller.php";	
?>
<div class="container">
	<div class="front-content mini-content login">
		<h1>LOGIN</h1>
		<div class="message">
			<p><?php if($pesan!=""){ echo $pesan; }?></p>
		</div>
		<div class="form-container">
			<form action="login.php" name="login" id="login" method="POST">
			<ul>
				<li>
					<input type="email" name="email" id="email" class="required" maxlength="50" placeholder="Your Email Address" placeholder="email">
					<label for="email" class="error"></label>
				</li>
				<li>
					<input type="password" name="password" id="password" class="required" placeholder="Password">
					<label for="password" class="error"></label>
				</li>
				<li class="info">
					<p class="righted small"><em>*</em>Required field.</p>					
				</li>
				<li>
					<p class="lefted small">Not a member? <a href="register.php">Register here</a>.</p>
					<p class="righted small"><a href="forgotpassword.php">Forgot Password</a></p>				
				</li>
				<li class="centered">
					<input type="submit" name="submit" id="submit" value="LOGIN">
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