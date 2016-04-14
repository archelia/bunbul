<?php	
	include "../../global/global.php";
	if(isset($_GET['kode'])){$kode=$_GET['kode'];}
	else {
		header("Location: listprovince.php");
	}
	include "header.php";	
	$pagecall = "addcity";
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
	// after save change the kode province
	if(isset($newkode)){$kode=$newkode;}
?>
<div class="container">
	<div class="content addcity">		
		<div class="box white-box addcity-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ").$tabel); ?></h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="addcity.php?kode=<?php echo $kode.((isset($action)?"&act=chg&id=$id":""));?>" name="addcity" id="addcity" method="POST">
					<ul>
						<li>
							<label for="idprovince">Province<em>*</em></label>
							<select name="idprovince" id="idprovince">
								<?php
								$query = "SELECT * FROM province WHERE active='1'";
								$result=mysql_query($query);
								while($rowx=mysql_fetch_array($result)){
									echo '<option value="'.$rowx['id_province'].'"'.(($kode==$rowx['id_province'])?"selected ":"").'>'.$rowx['province_name'].'</option>';
								}
								?>							
							</select>
							<label for="usertype" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="cityname">City Name<em>*</em></label>
							<input type="text" name="cityname" id="cityname" class="required" maxlength="20" placeholder="City Name" value="<?php if(isset($action)) echo $row['city_name']; ?>">
							<label for="cityname" class="error">This is a required field.</label>
						</li>						
						<li>
							<label for="ongkir">Shipping Cost<em>*</em></label>
							<input type="text" name="ongkir" id="ongkir" class="required" maxlength="20" placeholder="Shipping Cost to this city" value="<?php if(isset($action)) echo $row['ongkir']; ?>">
							<label for="ongkir" class="error">This is a required field.</label>
						</li>
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>					
						</li>
						<li class="centered">
						<a href="<?php echo $pageorigin.".php?kode=$kode"?>" class="button">BACK</a>
							<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"CREATE")); ?>">
							<?php
							if(isset($action)){
								echo '<input type="hidden" name="id" id="id" value="'.$row['id_city'].'">';
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
	$("#addcity").validate();
});
</script>