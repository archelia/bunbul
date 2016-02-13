<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addproduct";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
?>
<?php
	// define variables for editing
	if(isset($_GET['act'])){
		if($_GET['act']=="chg"){
			if($id != ""){
				$action = "change";
				// especially for edit product_name		
				$qload = "SELECT * FROM ".$tabel. " a ";
				$qload .= ", category b, subcategory c ";
				$qload .= "WHERE a.id_category=b.id_category ";
				$qload .= "AND b.id_category=c.id_category ";
				$qload .="AND ".$fieldname."='$id'";
										
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
	<div class="content addproduct">		
		<div class="box white-box tabproduct-box">		
			<nav>
				<ul>
					<li><a href="<?php echo ((isset($action)?"javascript:gototab1();":"")); ?>" class="link-addproduct active">Add Product</a></li>
					<li><a href="<?php echo ((isset($action)?"javascript:gototab2();":"")); ?>" class="link-addvariant">Add Variant</a></li>
					<li><a href="<?php echo ((isset($action)?"javascript:gototab3();":"")); ?>" class="link-addpicture">Add Picture</a></li>
				</ul>
			</nav>
		</div>
		<div class="box white-box addproduct-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ").$tabel); ?></h3>
			<div class="message" id="message1">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="../modules/addproduct.php<?php echo ((isset($action)?"?act=chg&id=$id":"")); ?>" name="addproduct" id="addproduct" method="POST">
					<ul>
						<li>
							<label for="productname">Product Name<em>*</em></label>
							<input type="text" name="productname" id="productname" maxlength="256" class="required" placeholder="Product Name" value="<?php if(isset($action)) echo $row['product_name']; ?>">
							<label for="productname" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="productmodel">Product Model</label>
							<input type="text" name="productmodel" id="productmodel" maxlength="50" class="" placeholder="Product Model / Type" value="<?php if(isset($action)) echo $row['product_model']; ?>">
							<label for="productmodel" class="error">This is a required field.</label>
						</li>
						
						<li>
							<label for="producttype">Category<em>*</em></label>
							<select name="idcategory" id="idcategory">
								<?php
								$query = "SELECT * FROM category WHERE active='1'";
								$result = mysql_query($query);
								$i=0;
								while($rowx=mysql_fetch_array($result)){
									echo '<option value="'.$rowx['id_category'].'" ';
									if(isset($action)){
										if($rowx['id_category']==$row['id_category']){
											echo 'selected="selected"';
											$idcat = $row['id_category'];
										}
									}else{
										if($i==0){$idcat=$rowx['id_category'];}
										$i++;	
									}
									echo '>'.$rowx['category_name'];
									echo '</option>';								
								}
								?>							
							</select>
							<label for="producttype" class="error">This is a required field.</label>
						</li>
						<?php
							$tampilsub = 0;
							$query = "SELECT * FROM subcategory WHERE id_category='$idcat'";
							$result = mysql_query($query);
							if(mysql_num_rows($result)>0){
								$tampilsub = 1;
							}
						?>						
						<li class="subcategory <?php if($tampilsub==0) echo 'hidden';?>">
							<label for="producttype">Subcategory<em>*</em></label>
							<select name="idsubcategory" id="idsubcategory">
							<?php 
							while($rowx=mysql_fetch_array($result)){
									echo '<option value="'.$rowx['id_subcategory'].'" ';
									if(isset($action)){
										if($rowx['id_subcategory']==$row['id_subcategory']){
											echo 'selected="selected"';
										}
									}
									echo '>'.$rowx['subcategory_name'];
									echo '</option>';
							}
							?>
							</select>
							<label for="producttype" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="producttype">Brand<em>*</em></label>
							<select name="idbrand" id="idbrand">
								<?php
								$query = "SELECT * FROM brand WHERE active='1'";
								$result = mysql_query($query);
								$i=0;
								while($rowx=mysql_fetch_array($result)){
									echo '<option value="'.$rowx['id_brand'].'" ';
									if(isset($action)){
										if($rowx['id_brand']==$row['id_brand']){
											echo 'selected="selected"';
										}
									}
									echo '>'.$rowx['brand_name'];
									echo '</option>';								
								}
								?>							
							</select>
							<label for="producttype" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="productdimension">Product Dimension</label>
							<input type="text" name="productdimension" id="productdimension" class="" maxlength="50" placeholder="ex : 12 x 25 x 10 cm" value="<?php if(isset($action)) echo $row['product_dimension']; ?>">
							<label for="productdimension" class="error">This is a required field.</label>
						</li>					
						<li>
							<label for="productprice">Product Price<em>*</em></label>
							<input type="number" name="productprice" id="productprice" class="required" maxlength="10" placeholder="ex : 5000000" min="10000" max="9999999" value="<?php if(isset($action)) echo $row['product_price']; ?>">
							<label for="productprice" class="error">This is a required field.</label>
						</li>					
						<li>
							<label for="discount">Discount</label>
							<input type="number" name="discount" id="discount" class="" placeholder="ex : 20" min="1" max="99" maxlength=2 value="<?php if(isset($action)) echo $row['product_discount']; ?>">
							<label for="discount" class="error">This is a required field.</label>
							<div class="clear"></div>
							<div class="checkbox">
								<label>
									<input type="checkbox" name="discactive" id="discactive" class="" maxlength="2" value="1" <?php if(isset($action)){ if($row['product_discount_active']==1)echo "checked";}; ?>>
									<span></span>Discount Active
								</label>
							</div>						
						</li>					
						<li>
							<label for="productdesc">Product Description</label>
							<textarea name="productdesc" id="productdesc" cols="30" rows="5" placeholder="Product Description" class="ckeditor"><?php if(isset($action)) echo htmlspecialchars_decode($row['product_description']); ?></textarea>
							<label for="productdesc" class="error">This is a required field.</label>
						</li>								
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>		
						</li>
						<li class="centered">
							<a href="<?php echo $pageorigin.".php"?>" class="button">BACK</a>
							<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"NEXT")); ?>">
							<?php
							if(isset($action)){
								echo '<input type="hidden" name="id" id="id" value="'.$row['id_product'].'">';
								echo '<input type="hidden" name="action" id="action" value="$action">';
							}
							?>
						</li>
					</ul>
				</form>
			</div>					
		</div>	
		<div class="box white-box addvariant-box">
			<h3>Add Variant for <span id="name_prod_saved"><?php if(isset($action)){ echo $row['product_name'];} ?></span></h3>		
			<div class="message" id="message2">
				<p>&nbsp;</p>
			</div>			
			<div class="form-container form-add-variant">
				<form action="../module/addvariant.php" name="addvariant" id="addvariant" method="POST">
				<ul>
					<li>
						<label for="productsku">Product SKU<em>*</em></label>
						<input type="text" name="productsku" id="productsku" maxlength="256" class="required" placeholder="Stock Keeping Unit">
						<label for="productsku" class="error">This is a required field.</label>
					</li>
					<li>
						<label for="barcode">Barcode</label>
						<input type="text" name="barcode" id="barcode" maxlength="20" class="required" placeholder="Barcode">
						<label for="barcode" class="error">This is a required field.</label>
					</li>
					<li>
						<label for="productcolor">Color<em>*</em></label>
						<select name="productcolor" id="productcolor">					
						<?php
						$result=mysql_query("SELECT * FROM color WHERE active='1' ORDER BY color_name DESC");
						while($row=mysql_fetch_array($result)){
								echo '<option value="'.$row['id_color'].'">'.$row['color_name'].'</option>';
							}						
						?>								
						</select>
						<label for="productcolor" class="error">This is a required field.</label>
					</li>
					<li>
						<label for="productsize">Size<em>*</em></label>
						<select name="productsize" id="productsize">
						<?php
						if(isset($action)){						
							$querysize="SELECT * FROM size WHERE active='1' AND id_category='$idcat' ORDER BY size_name ASC";
							$result=mysql_query($querysize);
							while($row=mysql_fetch_array($result)){
								echo '<option value="'.$row['id_size'].'">'.$row['size_name'].'</option>';
							}
						}
						?>					
						</select>
						<label for="producttype" class="error">This is a required field.</label>
					</li>
					<li>
						<label for="productstok">Stock</label>
						<input type="number" name="productstok" id="productstok" maxlength="2" class="" placeholder="Number of stock" maxlength="5" min="0">
						<label for="productstok" class="error">This is a required field.</label>					
					</li>
					<li>
						<label for="location">Location</label>
						<input type="text" name="location" id="location" maxlength="256" class="" placeholder="Location/Rack No">
						<label for="location" class="error">This is a required field.</label>
					</li>
					<li class="centered">
						<input type="hidden" name="id_product_saved" id="id_product_saved" class="id_product_saved" value="<?php if(isset($action)){ echo $id;} ?>">
						<input type="submit" name="submit" id="submit" value="CREATE">
						<button type="button" name="button-next" id="button-next" class="button button-next" >NEXT</button>
					</li>
				</ul>
				</form>
			</div>
			<div class="form-container form-edit-variant">		
				<form action="../module/addvariant.php" name="edit-variant" id="edit-variant" method="POST">		
				</form>
			</div>
			<div class="data-table">
				<h3>Variant List</h3>		
				<table border="1" cellpadding="0" cellspacing="0" width="100%" id="variant-table">
					<colgroup>
						<col width="5%">
						<col width="">
						<col width="20%">
						<col width="20%">
						<col width="10%">
						<col width="10%">
						<col width="5%">
					</colgroup>
					<thead>
						<tr>
							<th>&nbsp;</th>
							<th>Sku</th>
							<th>Barcode</th>
							<th>Color/Size</th>
							<th>Stock</th>
							<th>Location</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody id="ajax-load-variant">
					<?php
					if(isset($action)){
						$queryload = "SELECT i.*, c.color_name, s.size_name 
							FROM item i, color c, size s 
							WHERE i.id_color = c.id_color 
							AND i.id_size = s.id_size 
							AND id_product='$id' 
							ORDER BY color_name ASC, size_name ASC ";
						$resload = mysql_query($queryload);
						if($resload){
							while($rowload = mysql_fetch_array($resload)){
								echo "<tr>";
								echo '<td align="center">
									<a href="javascript:editvariant('.$rowload["id_item"].')" class="link-opt"><img src="../images/icon-pencil.png" alt="Edit" title="Edit"></a>								
									</td>';
								echo "<td>$rowload[sku]</td>";
								echo "<td>$rowload[barcode]</td>";
								echo "<td class='centered'>$rowload[color_name] $rowload[size_name]</td>";
								echo "<td class='righted'>$rowload[stock]</td>";
								echo "<td class='centered'>$rowload[location]</td>";
								echo '<td align="center">
											<a href="javascript:deletevariant('.$rowload["id_item"].');" class="link-opt"><img src="../images/icon-trash.png" alt="Delete" title="Delete"></a>
										</td>						
								';
								echo "</tr>";
							}
							if(mysql_num_rows($resload)<1){
								echo "<tr>";
								echo "<td colspan='10' align='center'>There's no item to display.</td>";
								echo "</tr>";
							}
						}
					}			
					?>
					</tbody>
				</table>	
			</div>				
		</div>
		<div class="box white-box addpicture-box">
			<h3>Add Picture</h3>
			<div class="message" id="message3">
				<p>&nbsp;</p>
			</div>	
			<div class="form-container">
			<form action="../modules/uploadpic.php" name="addpictureform" id="addpictureform" method="POST" enctype="multipart/form-data">
			<ul>
				<li class="centered">
					<label class="instruction">Click on the picture to add files.</label>
					<label class="file-wrapper">
						<img id="imgpreview1" name="imgpreview1" 
						<?php
							if(isset($action)){
								$filename ="../../source/placeholder/".$id."-1.jpg";
								if(file_exists($filename)){
									echo 'src="'.$filename.'"';
								}
							}
						?>/>
						<input type="file" id="file1" name="file1" class="" accept="image/*" onchange="PreviewImage(file1,imgpreview1);">
					</label>						
					<label for="file1" class="error">This is a required field.</label>
					<label class="file-wrapper">
						<img id="imgpreview2" name="imgpreview2"
						<?php
							if(isset($action)){
								$filename ="../../source/placeholder/".$id."-2.jpg";
								if(file_exists($filename)){
									echo 'src="'.$filename.'"';
								}
							}
						?>/>
						<input type="file" id="file2" name="file2" class="" accept="image/*" onchange="PreviewImage(file2,imgpreview2);">
					</label>						
					<label class="file-wrapper">
						<img id="imgpreview3" name="imgpreview3" 
						<?php
							if(isset($action)){
								$filename ="../../source/placeholder/".$id."-3.jpg";
								if(file_exists($filename)){
									echo 'src="'.$filename.'"';
								}
							}
						?>/>
						<input type="file" id="file3" name="file3" class="" accept="image/*" onchange="PreviewImage(file3,imgpreview3);">
					</label>
					<label class="file-wrapper">
						<img id="imgpreview4" name="imgpreview4"
						<?php
							if(isset($action)){
								$filename ="../../source/placeholder/".$id."-4.jpg";
								if(file_exists($filename)){
									echo 'src="'.$filename.'"';
								}
							}
						?>/>
						<input type="file" id="file4" name="file4" class="" accept="image/*" onchange="PreviewImage(file4,imgpreview4);">
					</label>
					<label class="instruction">Please input images with 762 x 1040 resolution.</label>
				</li>	
				<li class="centered">
					<input type="hidden" name="id_product_saved" id="id_product_saved" class="id_product_saved" value="<?php if(isset($action)){ echo $id;} ?>">
					<a href="javascript:gototab2();" class="button">BACK</a>
					<input type="submit" name="upload-pic" id="upload-pic" value="Upload">
				</li>
			</ul>
			</form>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<?php
	include "footer.php";
?>
<script>
function closealltabs(){
	$(".tabproduct-box ul li a").removeClass("active");
	$(".addproduct-box").hide();
	$(".addvariant-box").hide();
	$(".addpicture-box").hide();
	$(".message").removeClass("error");
	$("html, body").animate({ scrollTop: 0 }, "fast");
}
function gototab1(){
	closealltabs();	
	$(".link-addproduct").addClass("active");
	$(".addproduct-box").show();
}
function gototab2(){
	closealltabs();
	$(".link-addproduct").addClass("active");
	$(".link-addvariant").addClass("active");
	$(".addvariant-box").show();	
}
function gototab3(){
	closealltabs();
	$(".link-addproduct").addClass("active");
	$(".link-addvariant").addClass("active");
	$(".link-addpicture").addClass("active");
	$(".addpicture-box").show();
}
$(function(){
	// category change function
	$("#idcategory").change(function(){
		$(".subcategory").addClass('hidden');
		$("#idsubcategory")
			.find('option')
			.remove()
			.end();
		var idcat = $(this).val();
		$.ajax({
			url: "../modules/ajaxsubcategory.php",
			type: "post",
			data: {idcat: idcat },
			success: function (response) { 				
				$("#idsubcategory")
				    .append(response);
					if(response!=0){
						$(".subcategory").removeClass('hidden');
						$(".subcategory").slideDown();	
					}						
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
		});	
	});
});	
</script>
<script>
$(function(){
	// closing all tabs and open tab 1
	gototab1();
	// ckeditor handle
	CKEDITOR.replace('productdesc');
	// highlight validation
	var elements = $("input[type!='submit'], textarea, select");
	elements.focus(function() {
		$(this).parents('li').addClass('highlight');
	});
	elements.blur(function() {
		$(this).parents('li').removeClass('highlight');
	});	
	// validation
	$("#addproduct").validate({
		submitHandler: function(){	
			var datackeditor = CKEDITOR.instances.productdesc.getData();
			$("#productdesc").text(datackeditor);
			var values = $("#addproduct").serialize();
			$.ajax({
				url: "../modules/addproduct.php",
				type: "post",
				data: values,
				dataType: "json",
				success: function (response){  			
					if(response[0]==0){
						$("#message1").addClass("error");
						$("#message1 p").text(response[1]);
						$('html, body').animate({
							scrollTop: ($(".addproduct").offset()).top
						}, 500);
					}
					else{
						$(".id_product_saved").val(response[2]);
						$("#name_prod_saved").html(response[3]);
						loadproductsize(response[4]);
						gototab2();
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
				   console.log(textStatus, errorThrown);
				}
			});		
		}
	});
});
</script>
<script>
function canceledit(){
	$(".form-edit-variant").hide();
	$(".form-add-variant").show();
}
function editvariant(iditem){
	$.ajax({
		url: "../modules/ajaxloadvariantedit.php",
		type: "post",
		data: {iditem: iditem },
		success: function (response){ 
			$(".form-edit-variant form")
				.empty()
				.append(response);	
			$(".form-add-variant").hide();
			$(".form-edit-variant").show();
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});
	
}
function deletevariant(iditem){
	$.ajax({
		url: "../modules/ajaxdeletevariant.php",
		type: "post",
		data: {iditem: iditem },
		success: function (response){  
			loaddatavariant();	
			
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}
function adddatavariant(){
	var values = $("#addvariant").serialize();	
	$.ajax({
		url: "../modules/addvariant.php",
		type: "post",
		data: values,
		dataType: "json",
		success: function (response){  		
			if(response[0]==0){				
				$("#message2").addClass("error");
				$("#message2 p").text(response[1]);
				$('html, body').animate({
					scrollTop: ($(".addproduct").offset()).top
				}, 500);
			}	
			loaddatavariant();			
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}
function loaddatavariant(){
	idprod = $("#id_product_saved").val();
	$.ajax({
		url: "../modules/ajaxloadvariant.php",
		type: "post",
		data: {idprod: idprod },
		success: function (response){  	
			$("#variant-table")
			.find('tbody')
			.remove()
			.end()
			.append(response);
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}
function loadproductsize(idcat){
	$.ajax({
		url: "../modules/ajaxloadproductsize.php",
		type: "post",
		data: {idcat: idcat},
		success: function (response){  	
			$("#productsize")
			.empty()
			.append(response);
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}
$(function(){
	gototab1();
	$(".form-edit-variant").hide();	
	$("#addvariant").submit(function(e){
		$("#message2").removeClass("error");
		e.preventDefault();
		if($("#productsku").val() == ""){
			$("#productsku").removeClass("valid");
			$("#productsku").addClass("error");
			$("#productsku").next("label").show();
			return false;
		}
		adddatavariant();		
	});
	$("#button-next").click(function(e){
		e.preventDefault();
		gototab3();
	});
	$("#edit-variant").submit(function(e){
		e.preventDefault();
		var values = $("#edit-variant").serialize();	
		$.ajax({
			url: "../modules/ajaxeditvariant.php",
			type: "post",
			data: values,
			dataType: "json",
			success: function (response){  		
				if(response[0]==0){				
					$("#message2").addClass("error");
					$("#message2 p").text(response[1]);
					$('html, body').animate({
						scrollTop: ($(".addproduct").offset()).top
					}, 500);
				}	
				loaddatavariant();			
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			}
		});	
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