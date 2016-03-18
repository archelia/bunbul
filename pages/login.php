<?php
	include "../global/global.php";
	if(isset($_SESSION['viouser'])){header("location: homepage.php");}
	include "header.php";	
	$pagecall = "login";
	include "frontcontroller.php";	
?>
<div class="container">
	<div class="front-content login">
		<div class="login">
			<h1>LOGIN</h1>
			<div class="form-container">
				<form action="" name="form-register" id="form-register" method="POST">
				<ul>
					<li>
						<label for="idcustomer">Username</label>
						<input type="text" name="username" id="username" class="" maxlength="50" placeholder="Username" placeholder="Username">
						<label for="" class="error"></label>
					</li>
					<li>
						<label for="">Password</label>
						<input type="password" name="password" id="password" class="required" placeholder="Password">
						<label for="" class="error"></label>
					</li>
					<li>
						<p class="righted small"><em>*</em>This is required fields.</p>					
					</li>
					<li>
						<p class="centered small">If you forget your password, please call your administrator.</p>
						
						</li><li class="centered"><input type="submit" name="submit" id="submit" value="LOGIN">
					</li>
				</ul>
				</form>
			</div>
		</div>	
	</div>	
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