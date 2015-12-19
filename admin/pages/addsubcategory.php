<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addsubcategory";
	include "controller.php";
?>
<div class="container">
	<div class="content addsubcategory">		
		<div class="box white-box addsubcategory-box">			
			<h3>Add Subcategory</h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="addsubcategory.php" name="addsubcategory" id="addsubcategory" method="POST">
					<ul>
						<li>
							<label for="idcategory">ID Category<em>*</em></label>
							<select name="idcategory" id="idcategory">
								<?php
								$query = "SELECT * FROM category WHERE active='1'";
								$result=mysql_query($query);
								while($row=mysql_fetch_array($result)){
									echo '<option value="'.$row['id_category'].'">'.$row['category_name'].'</option>';
								}
								?>							
							</select>
							<label for="usertype" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="subcategoryname">Subcategory Name<em>*</em></label>
							<input type="text" name="subcategoryname" id="subcategoryname" class="required" maxlength="20" placeholder="Subcategory Name">
							<label for="subcategoryname" class="error">This is a required field.</label>
						</li>
						
						<li>
							<label for="subcategorydesc">Subcategory Description<em>*</em></label>
							<textarea name="subcategorydesc" id="subcategorydesc" cols="30" rows="5" placeholder="Description"></textarea>
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
	$("#addsubcategory").validate();
});
</script>