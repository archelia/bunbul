<?php
switch($pagecall){
	case "listuser" :
	// variables needed :
	$addnewpage = "adduser.php";
	$filteropt = array
	(
		array("Username A-Z","username:ASC"),
		array("Username Z-A","username:DESC"),
		array("User Type A-Z","user_type:ASC"),
		array("User Type Z-A","user_type:DESC")
	);
	break;
	case "listbrand" :
	// variables needed :
	$addnewpage = "addbrand.php";
	$filteropt = array
	(
		array("Brand Name A-Z","brand_name:ASC"),
		array("Brand Name Z-A","brand_name:DESC")
	);
	break;	
	case "listcategory" :
	// variables needed :
	$addnewpage = "addcategory.php";
	$filteropt = array
	(
		array("Category Name A-Z","category_name:ASC"),
		array("Category Name Z-A","category_name:DESC")	
	);
	break;	
	case "listsize" :
	// variables needed :
	$addnewpage = "addsize.php";
	$filteropt = array
	(
		array("Size A-Z","size_name:ASC"),
		array("Size Z-A","size_name:DESC"),
		array("Category A-Z","category_name:ASC"),		
		array("Category Z-A","category_name:DESC")		
	);
	break;	
	case "listsubcategory" :
	// variables needed :
	$addnewpage = "addsubcategory.php";
	$filteropt = array
	(
		array("Subcategory A-Z","subcategory_name:ASC"),
		array("Subcategory Z-A","subcategory_name:DESC")	
	);
	break;	
	case "listcolor" :
	// variables needed :
	$addnewpage = "addcolor.php";
	$filteropt = array
	(
		array("Color A-Z","color_name:ASC"),
		array("Color Z-A","color_name:DESC"),	
		array("Color Code A-Z","color_code:DESC"),	
		array("Color Code Z-A","color_code:DESC")	
	);
	break;	
	
}	
?>
<div class="form-tools">
	<div class="filter-box add-new">		
		<a href="<?php echo $addnewpage; ?>" class="button add-button">Add New</a>
	</div>
	<form action='<?php echo $pagecall;?>.php' method='POST' name="sorting" id="sorting">
		<div class="filter-box sorting">		
			<select name='sortingchoice' id='sortingchoice'>
				<option value='all' selected>By Date Created</option>
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