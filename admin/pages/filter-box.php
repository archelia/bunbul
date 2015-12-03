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
	case "listsize" :
	// variables needed :
	$addnewpage = "addsize.php";
	$filteropt = array
	(
		array("Size A-Z","size_name:ASC"),
		array("Size Z-A","size_name:DESC"),
		array("Size Type A-Z","size_type:ASC"),
		array("Size Type Z-A","size_type:DESC")
		
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
		</div>
		<div class="clear"></div>
	</form>
</div>