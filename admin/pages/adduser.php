<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "adduser";
	include "controller.php";
?>
<div class="container">
	<div class="content adduser">		
		<div class="box white-box adduser-box">			
			<h3>Add User</h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="adduser.php" name="adduser" id="adduser" method="POST">
					<ul>
						<li>
							<label for="username">Username<em>*</em></label>
							<input type="text" name="username" id="username" class="required" maxlength="20" placeholder="Username">
							<label for="username" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="password">Password<em>*</em></label>
							<input type="password" name="password" id="password" class="required" maxlength="20" placeholder="Password">
							<label for="password" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="password1">Confirm Password<em>*</em></label>
							<input type="password" name="password1" id="password1" class="required" maxlength="20" placeholder="Confirm Password">
							<label for="password1" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="usertype">User Type<em>*</em></label>
							<select name="usertype" id="usertype">
								<option value="1">Super Admin</option>
								<option value="2" selected>Administrator</option>
								<option value="3">Sales</option>
							</select>
							<label for="usertype" class="error">This is a required field.</label>
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
	$("#adduser").validate();
	$("#adduser").submit(function(){
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