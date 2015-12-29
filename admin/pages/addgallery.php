<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addgallery";
	include "controller.php";
?>
<div class="container">
	<div class="content addgallery">		
		<div class="box white-box addgallery-box">			
			<h3>Add Gallery</h3>
			<div class="message">
				<p><?php if($message!=""){ echo $message; }?></p>
				<p><?php if($messageUpload!=""){ echo $messageUpload; }?></p>
			</div>
			<div class="form-container">
				<form action="addgallery.php" name="addgallery" id="addgallery" method="POST" enctype="multipart/form-data">
					<ul>
						<li class="centered">
							<label for="file1" class="instruction">
								Click on the picture to add files.								
							</label>
							<label class="file-wrapper">
								<img id="imgpreview1" name="imgpreview1"/>
								<input type="file" id="file1" name="file1" class="" accept="image/*" onchange="PreviewImage(file1,imgpreview1);">
							</label>						
							<label for="file1" class="error">This is a required field.</label>
						</li>	
						<li>
							<label for="gallerytitle">Gallery Title<em>*</em></label>
							<input type="text" name="gallerytitle" id="gallerytitle" class="required" maxlength="20" placeholder="Gallery Title">
							<label for="gallerytitle" class="error">This is a required field.</label>
						</li>						
						<!--<li>
							<label for="galleryurl">Gallery Url</label>
							<input type="text" name="galleryurl" id="galleryurl" class="required disabled" maxlength="20" placeholder="" readonly>
							<label for="galleryurl" class="error">This is a required field.</label>
						</li>-->
						<li>
							<label for="gallerycontent">Gallery Content</label>
							<textarea name="gallerycontent" id="gallerycontent" cols="30" rows="5" placeholder="Write your gallery content here. You may using html tags as well." class="ckeditor"></textarea>
							<label for="gallerycontent" class="error">This is a required field.</label>
						</li>						
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>
						</li>
						<li class="centered">
							<input type="submit" name="submit" id="submit" value="CREATE">
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
	$("#addgallery").validate();
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