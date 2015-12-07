<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addproduct";
	include "controller.php";
?>
<div class="container">
	<div class="content addproduct">		
		<div class="box white-box addproduct-box">			
			<h3>Add Product</h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="addproduct.php" name="addproduct" id="addproduct" method="POST">
					<ul>
						<li>
							<label for="productname">Product Name<em>*</em></label>
							<input type="text" name="productname" id="productname" maxlength="256" class="required" placeholder="Product Name">
							<label for="productname" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="producttype">Product Type<em>*</em></label>
							<select name="producttype" id="producttype">
								<option value="">Parent Product</option>
								<option value="">Child Product</option>				
							</select>
							<label for="producttype" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="productsku">Product SKU<em>*</em></label>
							<input type="text" name="productsku" id="productsku" maxlength="256" class="required" placeholder="ex : 1234-B21-35">
							<label for="productsku" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="productdimension">Product Dimension</label>
							<input type="text" name="productdimension" id="productdimension" class="" maxlength="50" placeholder="ex : 12 x 25 x 10 cm">
							<label for="productdimension" class="error">This is a required field.</label>
						</li>					
						<li>
							<label for="productprice">Product Price<em>*</em></label>
							<input type="number" name="productprice" id="productprice" class="required" maxlength="10" placeholder="ex : 5000000">
							<label for="productprice" class="error">This is a required field.</label>
						</li>					
						<li>
							<label for="discount">Discount</label>
							<input type="number" name="discount" id="discount" class="" maxlength="2" placeholder="ex : 20">
							<label for="discount" class="error">This is a required field.</label>
							<div class="clear"></div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="discactive" id="discactive" class="" maxlength="2" value="1">
									<span></span>Discount Active
								</label>
							</div>
							
						</li>					
						<li>
							<label for="producttype">Category<em>*</em></label>
							<select name="idcategory" id="idcategory">
								<?php
								$query = "SELECT * FROM category WHERE active='1'";
								$result=mysql_query($query);
								while($row=mysql_fetch_array($result)){
									echo '<option value="'.$row['id_category'].'">'.$row['category_name'].'</option>';
								}
								?>							
							</select>
							<label for="producttype" class="error">This is a required field.</label>
						</li>
						<li class="idcategory">
							<label for="producttype">Subcategory<em>*</em></label>
							<select name="idsubcategory" id="idsubcategory">
								<?php
								$query = "SELECT * FROM subcategory WHERE active='1'";
								$result=mysql_query($query);
								while($row=mysql_fetch_array($result)){
									echo '<option value="'.$row['id_category'].'">'.$row['category_name'].'</option>';
								}
								?>							
							</select>
							<label for="producttype" class="error">This is a required field.</label>
						</li>						
						<li>
							<label for="file1">Product Pictures</label>
							<label class="file-wrapper">
								<img id="imgpreview1"/>
								<input type="file" id="file1" name="file1" class="" accept="image/*" onchange="PreviewImage(file1,imgpreview1);">
							</label>						
							<label for="file1" class="error">This is a required field.</label>
							<label class="file-wrapper">
								<img id="imgpreview2"/>
								<input type="file" id="file2" name="file2" class="" accept="image/*" onchange="PreviewImage(file2,imgpreview2);">
							</label>						
							<label class="file-wrapper">
								<img id="imgpreview3"/>
								<input type="file" id="file3" name="file3" class="" accept="image/*" onchange="PreviewImage(file3,imgpreview3);">
							</label>
							<label class="file-wrapper">
								<img id="imgpreview4"/>
								<input type="file" id="file4" name="file4" class="" accept="image/*" onchange="PreviewImage(file4,imgpreview4);">
							</label>
						</li>	
						<li>
							<label for="subcategorydesc">Product Description</label>
							<textarea name="subcategorydesc" id="subcategorydesc" cols="30" rows="5" placeholder="Product Description" class="ckeditor"></textarea>
							<label for="subcategorydesc" class="error">This is a required field.</label>
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
<script type="text/javascript">
	 function PreviewImage(somefile,imgprev) {
			var oFReader = new FileReader();
			oFReader.readAsDataURL(somefile.files[0]);

			oFReader.onload = function (oFREvent) {
				imgprev.src = oFREvent.target.result;
			};
		};
</script>
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
	$("#addproduct").validate();
	$("#addproduct").submit(function(){
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