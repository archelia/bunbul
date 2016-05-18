<?php	
	include "../../global/global.php";
	if(isset($_GET['kode'])){$kode=$_GET['kode'];}
	else {
		header("Location: listcity.php");
	}
	include "header.php";	
	$pagecall = "adddistrict";
	include "controller.php";
	include "getfieldname.php"; // return $tabel, $fieldname, $id
	
	// GET kode
	
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
	// after save change the kode city
	if(isset($newkode)){$kode=$newkode;}
?>
<div class="container">
	<div class="content adddistrict">		
		<div class="box white-box adddistrict-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ").$tabel); ?></h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="adddistrict.php?kode=<?php echo $kode.((isset($action)?"&act=chg&id=$id":""));?>" name="adddistrict" id="adddistrict" method="POST">
					<ul>
						<li>
							<label for="idcity">City<em>*</em></label>
							<select name="idcity" id="idcity">
								<?php
								$query = "SELECT * FROM city WHERE active='1'";
								$result=mysql_query($query);
								while($rowx=mysql_fetch_array($result)){
									echo '<option value="'.$rowx['id_city'].'"'.(($kode==$rowx['id_city'])?"selected ":"").'>'.$rowx['city_name'].'</option>';
								}
								?>							
							</select>
							<label for="usertype" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="districtname">District Name<em>*</em></label>
							<input type="text" name="districtname" id="districtname" class="required" placeholder="district Name" value="<?php if(isset($action)) echo $row['district_name']; ?>">
							<label for="districtname" class="error">This is a required field.</label>
						</li>						
						<li>
							<label for="postal_fee">Shipping Cost<em>*</em></label>
							<input type="text" name="postal_fee" id="postal_fee" class="required" placeholder="Shipping Cost to this district" value="<?php if(isset($action)) echo $row['postal_fee']; ?>">
							<label for="postal_fee" class="error">This is a required field.</label>
						</li>
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>					
						</li>
						<li class="centered">
						<a href="<?php echo $pageorigin.".php?kode=$kode"?>" class="button">BACK</a>
							<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"CREATE")); ?>">
							<?php
							if(isset($action)){
								echo '<input type="hidden" name="id" id="id" value="'.$row['id_district'].'">';
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
	$("#adddistrict").validate();
});
</script>