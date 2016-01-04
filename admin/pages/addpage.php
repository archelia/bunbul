<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addpage";
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
	<div class="content addpage">		
		<div class="box white-box addpage-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ").$tabel); ?></h3>
			<div class="message">
				<p><?php if($message!=""){ echo $message; }?></p>
				<p><?php if($messageUpload!=""){ echo $messageUpload; }?></p>
			</div>
			<div class="form-container">
				<form action="addpage.php<?php echo ((isset($action)?"?act=chg&id=$id":"")); ?>" name="addpage" id="addpage" method="POST" enctype="multipart/form-data">
					<ul>
						<li>
							<label for="pagename">Page Name<em>*</em></label>
							<input type="text" name="pagename" id="pagename" class="required" maxlength="20" placeholder="Ex : pageextra (Must be unique, without space or special characters). ">
							<label for="pagename" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="pageurl">Page Url</label>
							<input type="text" name="pageurl" id="pageurl" class="required disabled" maxlength="20" placeholder="" readonly>
							<label for="pageurl" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="pagetitle">Page Title<em>*</em></label>
							<input type="text" name="pagetitle" id="pagetitle" class="required" maxlength="20" placeholder="Page Title">
							<label for="pagetitle" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="pagetype">Page Type<em>*</em></label>
							<select name="pagetype" id="pagetype">
								<option value="1col" selected>1 Column</option>
								<option value="2col">2 Columns</option>
								<option value="3col">3 Columns</option>				
							</select>
							<label for="pagetype" class="error">This is a required field.</label>
						</li>					
						<li>
							<label for="pagecontent">Page Content</label>
							<textarea name="pagecontent" id="pagecontent" cols="30" rows="5" placeholder="Write your page content here. You may using html tags as well." class="ckeditor"></textarea>
							<label for="pagecontent" class="error">This is a required field.</label>
						</li>	
						<li class="centered">
							<label for="file1" class="instruction">
								Click on the picture to add files.								
							</label>
							<label class="file-wrapper">
								<img id="imgpreview1" name="imgpreview1"/>
								<input type="file" id="file1" name="file1" class="" accept="image/*" onchange="PreviewImage(file1,imgpreview1);">
							</label>						
							<label for="file1" class="error">This is a required field.</label>
							<label class="file-wrapper">
								<img id="imgpreview2" name="imgpreview2"/>
								<input type="file" id="file2" name="file2" class="" accept="image/*" onchange="PreviewImage(file2,imgpreview2);">
							</label>						
							<label class="file-wrapper">
								<img id="imgpreview3" name="imgpreview3"/>
								<input type="file" id="file3" name="file3" class="" accept="image/*" onchange="PreviewImage(file3,imgpreview3);">
							</label>
							<label class="file-wrapper">
								<img id="imgpreview4" name="imgpreview4"/>
								<input type="file" id="file4" name="file4" class="" accept="image/*" onchange="PreviewImage(file4,imgpreview4);">
							</label>
						</li>	
						<li>
							<label class="instruction centered">
								Picture which is succesfully uploaded can be used inside the content with format url :
								source/content/page_name-1.jpg
							</label>
						</li>
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>
						</li>
						<li class="centered">
							<a href="<?php echo $pageorigin.".php"?>" class="button">BACK</a>
							<input type="submit" name="submit" id="submit" value="CREATE">
							<?php
							if(isset($action)){
								echo '<input type="hidden" name="id" id="id" value="'.$row['id_brand'].'">';
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
	$("#addpage").validate();
	$("#pagename").keyup(function(){
		$("#pageurl").val($("#pagename").val());
	});
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