<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addproduct";
	include "controller.php";
?>
<div class="container">
	<div class="content addproduct">		
		<div class="box white-box tabproduct-box">		
			<nav>
				<ul>
					<li><a href="#addproduct" class="link-addproduct active">Add Product</a></li>
					<li><a href="#addvariant" class="link-addvariant">Add Variant</a></li>
					<li><a href="#addpicture" class="link-addpicture">Add Picture</a></li>
				</ul>
			</nav>
		</div>
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
							<label for="producttype">Category<em>*</em></label>
							<select name="idcategory" id="idcategory">
								<?php
								$query = "SELECT * FROM category WHERE active='1'";
								$result = mysql_query($query);
								$i=0;
								while($row=mysql_fetch_array($result)){
									echo '<option value="'.$row['id_category'].'" '.(($i==0)?'selected="selected"':"").'>'.$row['category_name'].'</option>';
									if($i==0){$idcat=$row['id_category'];}
									$i++;
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
							while($row=mysql_fetch_array($result)){
									echo '<option value="'.$row['id_subcategory'].'">'.$row['subcategory_name'].'</option>';
								}
							?>
							</select>
							<label for="producttype" class="error">This is a required field.</label>
						</li>	
						<li>
							<label for="productdimension">Product Dimension</label>
							<input type="text" name="productdimension" id="productdimension" class="" maxlength="50" placeholder="ex : 12 x 25 x 10 cm">
							<label for="productdimension" class="error">This is a required field.</label>
						</li>					
						<li>
							<label for="productprice">Product Price<em>*</em></label>
							<input type="number" name="productprice" id="productprice" class="required" maxlength="10" placeholder="ex : 5000000" min="1" max="9999999">
							<label for="productprice" class="error">This is a required field.</label>
						</li>					
						<li>
							<label for="discount">Discount</label>
							<input type="number" name="discount" id="discount" class="" placeholder="ex : 20" min="1" max="99" maxlength=2>
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
							<label for="productdesc">Product Description</label>
							<textarea name="productdesc" id="productdesc" cols="30" rows="5" placeholder="Product Description" class="ckeditor"></textarea>
							<label for="productdesc" class="error">This is a required field.</label>
						</li>								
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>		
						</li>
						<li class="centered">
							<input type="submit" name="submit" id="submit" value="NEXT">
						</li>
					</ul>
				</form>
			</div>					
		</div>	
		<div class="box white-box addvariant-box">
			<?php
				// temp
				$_SESSION['id_inputed']=1;
				$_SESSION['cat_inputed']=1;
				
				$sqlprod = "SELECT product_name FROM product WHERE id_product = '$_SESSION[id_inputed]'";
				$resprod = mysql_query($sqlprod);
				$rowprod = mysql_fetch_array($resprod);
			?>
			<h3>Add Variant for <?php echo $rowprod[0]; ?></h3>		
			<div class="message message2">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>			
			<div class="form-container">
				<form action="../module/addvariant.php" name="addvariant" id="addvariant" method="POST">
				<ul>
					<li>
						<label for="productsku">Product SKU<em>*</em></label>
						<input type="text" name="productsku" id="productsku" maxlength="256" class="required" placeholder="Stock Keeping Unit">
						<label for="productsku" class="error">This is a required field.</label>
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
							$result=mysql_query("SELECT * FROM size WHERE active='1' AND id_category='$_SESSION[cat_inputed]' ORDER BY size_name DESC");
							while($row=mysql_fetch_array($result)){
								echo '<option value="'.$row['id_size'].'">'.$row['size_name'].'</option>';
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
						<input type="submit" name="submit" id="submit" value="CREATE">
					</li>
				</ul>
				</form>
			</div>
			<div class="data-table">
				<h3>Variant List</h3>		
				<table border="1" cellpadding="0" cellspacing="0" width="100%" id="variant-table">
					<colgroup>
						<col width="">
						<col width="20%">
						<col width="20%">
						<col width="10%">
						<col width="10%">
						<col width="5%">
					</colgroup>
					<thead>
						<tr>
							<th>Sku</th>
							<th>Color</th>
							<th>Size</th>
							<th>Stock</th>
							<th>Location</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					<tbody id="ajax-load-variant">			
						<?php
						$resload = mysql_query("
							SELECT i.*, c.color_name, s.size_name 
							FROM item i, color c, size s 
							WHERE i.id_color = c.id_color 
							AND i.id_size = s.id_size 
							AND id_product='$_SESSION[id_inputed]' 
							ORDER BY color_name ASC ");
						while($rowload = mysql_fetch_array($resload)){
							echo "<tr>";
							echo "<td>$rowload[sku]</td>";
							echo "<td class='centered'>$rowload[color_name]</td>";
							echo "<td class='centered'>$rowload[size_name]</td>";
							echo "<td class='righted'>$rowload[stock]</td>";
							echo "<td class='centered'>$rowload[location]</td>";
							echo '<td align="center">
										<a href="deletion.php?kode='.$rowload["id_item"].'&pagecall='.$pagecall.'" class="link-opt"><img src="../images/icon-trash.png" alt="Delete" title="Delete"></a>
									</td>						
							';
							echo "</tr>";
						}
						?>				
					</tbody>
				</table>			
			</div>				
		</div>
		<div class="box white-box addpicture-box">
			<h3>Add Picture</h3>
			<div class="form-container">
			<ul>
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
				<li class="centered">
					<input type="submit" name="submit" id="submit" value="SAVE">
				</li>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
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
						$(".message").addClass("error");
						$(".message p").text(response[1]);
						$('html, body').animate({
							scrollTop: ($(".addproduct").offset()).top
						}, 500);
					}
					else{
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
function adddatavariant(){
	var values = $("#addvariant").serialize();
	$.ajax({
		url: "../modules/addvariant.php",
		type: "post",
		data: values,
		dataType: "json",
		success: function (response){  
alert("success");		
			if(response[0]==0){				
				$(".message2").addClass("error");
				$(".message2 p").text(response[1]);
				$('html, body').animate({
					scrollTop: ($(".addproduct").offset()).top
				}, 500);
				return false();
			}		
			loaddatavariant();
			
		},
		error: function(jqXHR, textStatus, errorThrown) {
		   console.log(textStatus, errorThrown);
		}
	});	
}
function loaddatavariant(){
	alert("masuk load data");
	var values = $("#addproduct").serialize();
			$.ajax({
				url: "../modules/addproduct.php",
				type: "post",
				data: values,
				dataType: "json",
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
$(function(){
	gototab2();
	$("#addvariant").submit(function(e){
		e.preventDefault();
		if($("#productsku").val() == ""){
			$("#productsku").removeClass("valid");
			$("#productsku").addClass("error");
			$("#productsku").next("label").show();
			return false;
		}
		adddatavariant();		
	});
});
</script>