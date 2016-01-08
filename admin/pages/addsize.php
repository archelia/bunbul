<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addsize";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
?>
<?php
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
	<div class="content addsize">		
		<div class="box white-box addsize-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ").$tabel); ?></h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="addsize.php<?php echo ((isset($action)?"?act=chg&id=$id":""));?>" name="addsize" id="addsize" method="POST">
					<ul>
						<li>
							<label for="sizetype">Product Type<em>*</em></label>
							<select name="sizetype" id="sizetype">
								<?php
									$rescat = mysql_query ("SELECT * FROM category WHERE active=1 ORDER BY category_name ASC");
									while($rowcat=mysql_fetch_array($rescat)){
										echo '<option value='.$rowcat["id_category"].
										(($row["id_category"]==$rowcat["id_category"])?" selected":"").
										'>'.$rowcat["category_name"].'</option>';
									}
								?>
							</select>
							<label for="sizetype" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="sizename">Size<em>*</em></label>
							<input type="text" name="sizename" id="sizename" class="required" maxlength="20" placeholder="Size" value="<?php if(isset($action)) echo $row['size_name']; ?>">
							<label for="sizename" class="error">This is a required field.</label>
						</li>
						
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>					
						</li>
						<li class="centered">
							<a href="<?php echo $pageorigin.".php"?>" class="button">BACK</a>
							<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"CREATE")); ?>">
							<?php
							if(isset($action)){
								echo '<input type="hidden" name="id" id="id" value="'.$row['id_size'].'">';
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
	$("#addsize").validate();
});
</script>