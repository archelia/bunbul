<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "adduser";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
?>
<?php
	// define variables for editing
	if(isset($_GET['act'])){
		if($_GET['act']=="chg"){
			if($id != ""){
				$action = "change";
				$qload = "SELECT * FROM ".$tabel." WHERE ".$fieldname."='$id'";
				$rload = mysql_query($qload);
				if(mysql_num_rows($rload)>0){
					$row = mysql_fetch_array($rload);
				}
				else{
					header("location: ".$pageorigin.".php");
				}
			}
			else{
				header("location: ".$pageorigin.".php");
			}
		}
	}
?>
<div class="container">
	<div class="content adduser">		
		<div class="box white-box adduser-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ").$tabel); ?></h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="adduser.php<?php echo ((isset($action)?"?act=chg&id=$id":"")); ?>" name="adduser" id="adduser" method="POST">
					<ul>
						<li>
							<label for="username">Username<em>*</em></label>
							<input type="text" name="username" id="username" class="required" maxlength="20" placeholder="Username" value="<?php if(isset($action)) echo $row['username']; ?>">
							<label for="username" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="password">Password<em>*</em></label>
							<input type="password" name="password" id="password" class="required" maxlength="" placeholder="Password" value="<?php if(isset($action)) echo $row['password']; ?>">
							<label for="password" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="password1">Confirm Password<em>*</em></label>
							<input type="password" name="password1" id="password1" class="required" maxlength="" placeholder="Confirm Password" value="<?php if(isset($action)) echo $row['password']; ?>">
							<label for="password1" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="usertype">User Type<em>*</em></label>
							<select name="usertype" id="usertype">
								<?php 
									$usertype = array("Super Admin", "Administrator", "Sales");
									for ($x = 0; $x < 3; $x++) {
										$j = $x + 1;
										echo '<option value="'.($j).'"'.(($row['user_type']==$j)?"selected":"").'>'.$usertype[$x].'</option>';
									}
								?>
							</select>
							<label for="usertype" class="error">This is a required field.</label>
						</li>
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>					
						</li>
						<li class="centered">
							<a href="<?php echo $pageorigin.".php"?>" class="button">BACK</a>
							<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"CREATE")); ?>">
							<?php
							if(isset($action)){
								echo '<input type="hidden" name="id" id="id" value="'.$row['id_user'].'">';
								echo '<input type="hidden" name="action" id="action" value="$action">';
							}
							?>
						</li>
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