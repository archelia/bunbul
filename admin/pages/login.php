<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "login";
	include "controller.php";
?>
<div class="container">
	<div class="content login">		
		<div class="box black-box login-box">			
			<h3>Login</h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="login.php" name="login" id="login" method="POST">
					<ul>
						<li>
							<input type="text" name="username" id="username" class="required" maxlength="20" placeholder="Username">
							<label for="username" class="error">This is a required field.</label>
						</li>
						<li>
							<input type="password" name="password" id="password" class="required" maxlength="20" placeholder="Password">
							<label for="password" class="error">This is a required field.</label>
						</li>
						<li><p class="centered small">If you forget your password, please call your administrator.</p>					
						</li><li class="centered"><input type="submit" name="submit" id="submit" value="LOGIN"></li>
					</ul>
				</form>
			</div>			
		</div>
		
	</div>
	<div class="clear"></div>
</div>
<?php
if($pesan!=""){
	echo '<script>
		$(".message").addClass("error");
	</script>
	';
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
	$("#login").validate()
});
</script>