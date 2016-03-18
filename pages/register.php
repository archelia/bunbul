<?php
	include "../global/global.php";
	include "header.php";	
?>
<div class="container">
	<div class="front-content register">
		<h1>REGISTER</h1>
		<div class="form-container">
			<form action="" name="form-register" id="form-register" method="POST">
			<ul>
				<li>
					<label for=""></label>
					<input type="text" name="" id="" class="">
					<label for="" class="error"></label>
				</li>
				<li>
					<label for=""></label>
					<input type="text" name="" id="" class="">
					<label for="" class="error"></label>
				</li>
				<li>
					<label for=""></label>
					<input type="text" name="" id="" class="">
					<label for="" class="error"></label>
				</li>
				<li>
					<p class="righted small"><em>*</em>Required fields.</p>					
				</li>
				<li class="centered">
					<a href="<?php echo $pageorigin.".php"?>" class="button">BACK</a>
					<input type="submit" name="submit" id="submit" value="<?php echo ((isset($action)?"EDIT":"CREATE")); ?>">
					<?php
					if(isset($action)){
						echo '<input type="hidden" name="id" id="id" value="'.$row['id_category'].'">';
						echo '<input type="hidden" name="action" id="action" value="$action">';
					}
					?>
				</li>
			</ul>
			</form>
		</div>	
	</div>	
</div>