<?php
	include "../global/global.php";
	if(isset($_SESSION['custlogin'])){header("location: homepage.php");}
	include "header.php";	
	$pagecall = "resetpassword";
	include "frontcontroller.php";	
?>
<div class="container">
	<div class="front-content mini-content resetpassword">
		<h1>RESET PASSWORD</h1>
		<div class="message">
			<p><?php if($pesan!=""){ echo $pesan; }?></p>
		</div>
		<div class="form-container">
			<form action="login.php" name="login" id="login" method="POST">
			<ul>
				
				<li>
					<input type="password" name="password" id="password" class="required" placeholder="Password">
					<label for="password" class="error"></label>
				</li>
				<li>
					<input type="password" name="password1" id="password1" class="required" maxlength="" placeholder="Confirm Password" value="<?php if(isset($action)) echo $row['password']; ?>">
					<label for="password1" class="error">This is a required field.</label>
				</li>
				
				<li class="info">
					<p class="righted small"><em>*</em>Required fields.</p>					
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