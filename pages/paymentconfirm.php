<?php	
	include "../global/global.php";
	// some validations before processing
	if(!isset($_SESSION['custlogin'])){header("location: homepage.php");}
	// no submit and no id
	if(!isset($_POST['submit']) AND !isset($_GET['id'])){
		{header("location: 404.php");}	
	}
	if(isset($_GET['id'])){
		$id = $_GET['id'];		
	}
	else{
		$id = $_POST['idorder'];	
	}
				
	$sql = "SELECT po.*, pm.method_title, pm.description 
			FROM purchase_order po, paymentmethod pm 
			WHERE po.active=1 
			AND po.id_order = '$id' 
			AND po.id_paymentmethod = pm.id_paymentmethod 
			AND po.id_customer='$_SESSION[custlogin]'";
	$query = mysql_query($sql);
	if(!$query){header("location: 404.php");}

	$row = mysql_fetch_array($query);
	
	$pagecall = "paymentconfirm";
	include "frontcontroller.php";	
	include "header.php";
	
	// find if any payment confirmation has been made before, if so just load the data
	$sql = "SELECT * FROM payment_confirmation WHERE id_order='$id'";
	$query = mysql_query($sql);
	if(mysql_num_rows($query)>0){
		$rowload = mysql_fetch_array($query);
		$date = date('d/m/Y', strtotime($rowload['transfer_date']));
	}
	
?>
<div class="container">
	<div class="front-content mini-content paymentconfirm">			
		<h1>Payment Confirmation</h1>
		<div class="message">
			<p><?php if($pesan!=""){ echo $pesan; }?></p>
		</div>
		<div class="form-container">
			<form action="paymentconfirm.php" name="paymentconfirm" id="paymentconfirm" method="POST">
			<ul>
				<li>
					<label>Payment Method Choosen<em>*</em></label>
					<input type="text" name="idorder" id="idorder" placeholder="Order No" value="<?php echo $row['method_title']; ?>" readonly>
					<p class="info"><?php echo htmlspecialchars_decode($row['description']);?></p>
				</li>
				<li>
					<label>Order No<em>*</em></label>
					<input type="text" name="idorder" id="idorder" placeholder="123456" value="<?php echo $row['id_order']; ?>" readonly>
					<label for="idorder" class="error">This is a required field.</label>
				</li>
				<li>
					<label>Transfer Date<em>*</em></label>
					<input type="text" name="transferdate" id="transferdate" placeholder="12/02/2016" value="<?php echo ((isset($rowload))?"$date":"");?>" readonly>
					<label for="transferdate" class="error">This is a required field.</label>
				</li>
				<li>
					<label>Account Holder Name<em>*</em></label>
					<input type="text" name="accholder" id="accholder" class="required" maxlength="256" placeholder="Account Holder Name" value="<?php echo ((isset($rowload))?"$rowload[acc_holder]":"");?>">
					<label for="accholder" class="error">This is a required field.</label>
				</li>
				<li>
					<label>Amount Transfered<em>*</em></label>
					<input type="number" name="totalamount" id="totalamount" class="required" maxlength="256" placeholder="1000000" value="<?php echo ((isset($rowload))?"$rowload[total_amount]":"");?>">
					<label for="totalamount" class="error">This is a required field.</label>
				</li>			
				<li>
					<label>Note</label>
					<textarea name="description" id="description" cols="30" rows="10"><?php echo ((isset($rowload))?"$rowload[description]":"");?></textarea>
				</li>
				<li>
					<p class="righted small"><em>*</em>Required fields.</p>					
				</li>
				<li class="centered">
					<a href="orderdetail.php?idorder=<?php echo $id;?>" class="button">Back</a>
					<input type="submit" name="submit" id="submit" value="<?php echo ((isset($rowload))?"EDIT":"CONFIRM");?>">					
					<?php
					echo '<input type="hidden" name="idorder" id="idorder" value="'.$id.'">';
					
					if(isset($rowload)){	
						echo '<input type="hidden" name="id" id="id" value="'.$rowload['id_confirm'].'">';
						
					}
					?>
				</li>
			</ul>
			</form>
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
<script type="text/javascript" src="../admin/js/jquery.validate.js"></script>
<script>
$(function() {
	$("#transferdate").datepicker();
	$("#paymentconfirm").validate();	
});
</script>