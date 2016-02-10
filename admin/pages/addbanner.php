<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addbanner";
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
	<div class="content addbanner">		
		<div class="box white-box addbanner-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ").$tabel); ?></h3>
			<div class="message">
				<p><?php if($message!=""){ echo $message; }?></p>
				<p><?php if($messageUpload!=""){ echo $messageUpload; }?></p>
			</div>
			<div class="form-container">
				<form action="addbanner.php<?php echo ((isset($action)?"?act=chg&id=$id":"")); ?>" name="addbanner" id="addbanner" method="POST" enctype="multipart/form-data">
					<ul>
						<li class="centered">
							<label for="file1" class="instruction">								
								<?php
								if(isset($action)){
									echo "Click on the picture to change the picture.";
									
								}else {echo "Click on the picture to add files.";}
								?>
							</label>
							<label class="file-wrapper">
								<img id="imgpreview1" name="imgpreview1" 
								<?php 
								if(isset($action)){
									$filename = "../../source/banner/".$id."-1.jpg";
									if(file_exists($filename)){echo "src='".$filename."'";} 
								}			
								?>
								/>
								<input type="file" id="file1" name="file1" class="" accept="image/*" onchange="PreviewImage(file1,imgpreview1);" >
							</label>						
							<label for="file1" class="error">This is a required field.</label>
							<label class="instruction">Please input images with 845 x 700 resolution.</label>
						</li>	
						<li>
							<label for="bannertitle">Banner Title<em>*</em></label>
							<input type="text" name="bannertitle" id="bannertitle" class="required" maxlength="80" placeholder="Banner Title" value="<?php if(isset($action)) echo $row['banner_title']; ?>">
							<label for="bannertitle" class="error">This is a required field.</label>
						</li>						
						<li>
							<label for="bannerurl">Banner Url</label>
							<input type="text" name="bannerurl" id="bannerurl" class="required" maxlength="20" placeholder="www.vioreshop.com" value="<?php if(isset($action)) echo $row['banner_url']; ?>">
							<label for="bannerurl" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="bannercontent">Banner Text</label>
							<textarea name="bannercontent" id="bannercontent" cols="30" rows="5" placeholder="Write your banner content here. You may using html tags as well." class="ckeditor"><?php if(isset($action)) echo htmlspecialchars_decode($row['banner_description']); ?></textarea>
							<label for="bannercontent" class="error">This is a required field.</label>
						</li>						
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>
						</li>
						<li class="centered">
							<a href="<?php echo $pageorigin.".php"?>" class="button">BACK</a>
							<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"CREATE")); ?>">
							<?php
							if(isset($action)){
								echo '<input type="hidden" name="id" id="id" value="'.$row['id_banner'].'">';
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
if(isset($message)&&($message!="")){
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
	$("#addbanner").validate();
});
</script>
<script type="text/javascript">
 function PreviewImage(somefile,imgprev) {
		var oFReader = new FileReader();
		oFReader.readAsDataURL(somefile.files[0]);

		oFReader.onload = function (oFREvent) {
			imgprev.src = oFREvent.target.result;
		};
	};
</script>