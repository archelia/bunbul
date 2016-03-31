<?php	
	include "../../global/global.php";
	if(!isset($_GET['idcust'])){header("location: listreseller.php");}
	include "header.php";	
	$pagecall = "addreseller";
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
	
	// get customer data
	if(isset($_GET['idcust'])){
		$idcust = $_GET['idcust'];
	} else $idcust = $_POST['idcust'];
	
	$sqcust = "SELECT * FROM customer WHERE id_customer='$idcust'";
	$result = mysql_query($sqcust);
	$rowcust = mysql_fetch_array($result);
?>
<div class="container">
	<div class="content addreseller">		
		<div class="box white-box addreseller-box">			
			<h3><?php echo ucwords((isset($action)?"Edit ":"Add ").$tabel); ?></h3>
			<div class="message">
				<p><?php if($pesan!=""){ echo $pesan; }?></p>
			</div>
			<div class="form-container">
				<form action="addreseller.php?idcust=<?php echo $idcust.((isset($action)?"&act=chg&id=$id":"")); ?>" name="addreseller" id="addreseller" method="POST" enctype="multipart/form-data">
					<ul>
						<li>
							<label for="resellerdesc">Reseller Name</label>
							<input type="text" name="resellername" id="resellername" placeholder="Reseller Name" value="<?php echo $rowcust['customer_name']; ?>" readonly>
						</li>
						<li>
							<label for="bank_acc_no">Bank Account Number</label>
							<input type="text" name="bank_acc_no" id="bank_acc_no" class="required" maxlength="20" placeholder="Bank Account Number" value="<?php if(isset($action)) echo $row['bank_acc_no']; ?>">
							<label for="bank_acc_no" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="acc_holder_name">Bank Account Holder Name</label>
							<input type="text" name="acc_holder_name" id="acc_holder_name" class="required" maxlength="256" placeholder="Bank Account Holder Name" value="<?php if(isset($action)) echo $row['acc_holder_name']; ?>">
							<label for="acc_holder_name" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="resellerdesc">Bank Name</label>
							<select name="id_bank" id="id_bank">
							<?php
								$sqlbank = "SELECT * FROM bank ORDER by bank_name ASC";
								$result = mysql_query($sqlbank);
								while($rowbank=mysql_fetch_array($result)){
									echo "<option value='$rowbank[id_bank]'>$rowbank[bank_name]</option>";
								}
							?>
							</select>
							<label for="id_bank" class="error">This is a required field.</label>
						</li>
						<li>
							<label for="cashback">Cashback</label>
							<input type="number" name="cashback" id="cashback" class="" maxlength="20" placeholder="Reseller Cashback Reward" value="<?php if(isset($action)) echo $row['cashback']; ?>">
							<label for="gallerytitle" class="error">This is a required field.</label>
						</li>
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
									$filename = "../../source/reseller_idcard/".$id."-1.jpg";
									if(file_exists($filename)){echo "src='".$filename."'";} 
								}			
								?>/>
								<input type="file" id="file1" name="file1" class="" accept="image/*" onchange="PreviewImage(file1,imgpreview1);" >
							</label>						
							<label for="file1" class="error">This is a required field.</label>
						</li>	
						<li>
							<p class="righted small"><em>*</em>Required fields.</p>					
						</li>
						<li class="centered">
							<a href="<?php echo $pageorigin.".php"?>" class="button">BACK</a>
							<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"CREATE")); ?>">
							<input type="hidden" name="idcust" id="idcust" value="<?php echo $idcust; ?>">
							<?php
							if(isset($action)){
								echo '<input type="hidden" name="id" id="id" value="'.$row['id_reseller'].'">';
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
	$("#addreseller").validate();
});
</script>