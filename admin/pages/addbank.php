<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addbank";
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
	<div class="content addbank">		
		<div class="box white-box addbank-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ").$tabel); ?></h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="addbank.php<?php echo ((isset($action)?"?act=chg&id=$id":"")); ?>" name="addbank" id="addbank" method="POST">
					<ul>
						<li>
							<label for="bankname">Bank Name<em>*</em></label>
							<input type="text" name="bankname" id="bankname" class="required" maxlength="20" placeholder="Bank Name" value="<?php if(isset($action)) echo $row['bank_name']; ?>">
							<label for="bankname" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="bankdesc">Bank Description</label>
							<textarea name="bankdesc" id="bankdesc" cols="30" rows="10" placeholder="Bank Description"><?php if(isset($action)) echo $row['bank_description']; ?></textarea>
							<label for="bankdesc" class="error">This is a required field.</label>
						</li>
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>					
						</li>
						<li class="centered">
							<a href="<?php echo $pageorigin.".php"?>" class="button">BACK</a>
							<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"CREATE")); ?>">
							<?php
							if(isset($action)){
								echo '<input type="hidden" name="id" id="id" value="'.$row['id_bank'].'">';
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
	$("#addbank").validate();
});
</script>