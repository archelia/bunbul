<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addannouncement";
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
	<div class="content addannouncement">		
		<div class="box white-box addannouncement-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ").$tabel); ?></h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="addannouncement.php<?php echo ((isset($action)?"?act=chg&id=$id":"")); ?>" name="addannouncement" id="addannouncement" method="POST">
					<ul>
						<li>
							<label for="announcementtitle">Title<em>*</em></label>
							<input type="text" name="announcementtitle" id="announcementtitle" class="required" maxlength="20" placeholder="Announcement Title" value="<?php if(isset($action)) echo $row['announcement_title']; ?>">
							<label for="announcementtitle" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="announcementdesc">Description</label>
							<textarea name="announcementdesc" id="announcementdesc" cols="30" rows="6" placeholder="Description"><?php if(isset($action)) echo $row['announcement_description']; ?></textarea>
						</li>
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>					
						</li>
						<li class="centered">
							<a href="<?php echo $pageorigin.".php"?>" class="button">BACK</a>
							<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"CREATE")); ?>">
							<?php
							if(isset($action)){
								echo '<input type="hidden" name="id" id="id" value="'.$row['id_announcement'].'">';
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
	$("#addannouncement").validate();
});
</script>