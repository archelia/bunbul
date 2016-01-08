<?php
switch($pagecall){
	case "catalog" :
	// variables needed :
	$filteropt = array
	(
		array("Product Name A-Z","product_name:ASC"),
		array("Product Name Z-A","product_name:DESC"),	
		array("Category A-Z","category_name:ASC"),	
		array("Category Z-A","category_name:DESC"),			
		array("Price Low-High","product_price:ASC"),
		array("Price High-Low","product_price:DESC")
	);
	break;	
}	

?>
<div class="form-tools">
	<form action='<?php echo $pagecall;?>.php' method='POST' name="sorting" id="sorting">
		<div class="filter-box sorting">		
			<select name='sortingchoice' id='sortingchoice'>
				<option value='all' selected>Newest</option>
				<?php		
				if(!isset($_POST["sortingchoice"])){$_POST["sortingchoice"]="all";}
				for ($i = 0; $i < count($filteropt) ; $i++) {
					echo '<option value='.$filteropt[$i][1].' '.(($filteropt[$i][1]==$_POST["sortingchoice"])?"selected":"").'>'.$filteropt[$i][0];
					echo '</option>';				
				}	
				?>
			</select>
		</div>
		<div class="filter-box search">
			<input type='text' name='tekscari' id='tekscari' value='<?php if(isset($_POST['tekscari'])){ echo $_POST["tekscari"];}?>'>
			<input type='submit' name='search' id='search' value=''>	
			<?php
			if(isset($kode)){
				echo '<input type="hidden" name="kode" id="'.$kode.'" value="'.$kode.'">';
			}
			?>
		</div>
		<div class="clear"></div>
	</form>
</div>