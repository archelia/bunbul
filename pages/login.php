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
		<?php
			include "form-login.php";	
		?>
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