<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "addsubcategory";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
	
	// GET kode
	if(isset($_GET['kode'])){$kode=$_GET['kode'];}
	else {header("Location: listcategory.php");}
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
	// after save change the kode category
	if(isset($newkode)){$kode=$newkode;}
?>
<div class="container">
	<div class="content addsubcategory">		
		<div class="box white-box addsubcategory-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ").$tabel); ?></h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="addsubcategory.php?kode=<?php echo $kode.((isset($action)?"&act=chg&id=$id":""));?>" name="addsubcategory" id="addsubcategory" method="POST">
					<ul>
						<li>
							<label for="idcategory">Category<em>*</em></label>
							<select name="idcategory" id="idcategory">
								<?php
								$query = "SELECT * FROM category WHERE active='1'";
								$result=mysql_query($query);
								while($rowx=mysql_fetch_array($result)){
									echo '<option value="'.$rowx['id_category'].'"'.(($kode==$rowx['id_category'])?"selected ":"").'>'.$rowx['category_name'].'</option>';
								}
								?>							
							</select>
							<label for="usertype" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="subcategoryname">Subcategory Name<em>*</em></label>
							<input type="text" name="subcategoryname" id="subcategoryname" class="required" maxlength="20" placeholder="Subcategory Name" value="<?php if(isset($action)) echo $row['subcategory_name']; ?>">
							<label for="subcategoryname" class="error">This is a required field.</label>
						</li>
						
						<li>
							<label for="subcategorydesc">Subcategory Description<em>*</em></label>
							<textarea name="subcategorydesc" id="subcategorydesc" cols="30" rows="5" placeholder="Description"><?php if(isset($action)) echo $row['subcategory_desc']; ?></textarea>
							<label for="subcategorydesc" class="error">This is a required field.</label>
						</li>
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>					
						</li>
						<li class="centered">
						<a href="<?php echo $pageorigin.".php?kode=$kode"?>" class="button">BACK</a>
							<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"CREATE")); ?>">
							<?php
							if(isset($action)){
								echo '<input type="hidden" name="id" id="id" value="'.$row['id_subcategory'].'">';
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