<?php
	include "../global/global.php";
	if(isset($_SESSION['viouser'])){header("location: homepage.php");}
	include "header.php";	
	$pagecall = "login";
	include "frontcontroller.php";	
?>
<div class="container">
	<div class="front-content mini-content login">
		<h1>LOGIN</h1>
		<div class="form-container">
			<form action="" name="form-register" id="form-register" method="POST">
			<ul>
				<li>
					<input type="text" name="username" id="username" class="" maxlength="50" placeholder="Username" placeholder="Username">
					<label for="username" class="error"></label>
				</li>
				<li>
					<input type="password" name="password" id="password" class="required" placeholder="Password">
					<label for="password" class="error"></label>
				</li>
				<li class="info">
					<p class="righted small"><em>*</em>Harus diisi.</p>					
				</li>
				<li>
					<p class="lefted small">Belum member? <a href="">Daftar di sini</a>.</p>
					<p class="righted small"><a href="">Lupa Password</a></p>				
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