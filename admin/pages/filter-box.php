<?php
switch($pagecall){
	case "listuser" :
	// variables needed :
	$addnewpage = "adduser.php"
	$filteropt = array
	(
		array("Username","username"),
		array("User Type","user_type"),
	);
	break;
}	
?>
<div class="form-tools">
	<div class="filter-box add-new">		
		<a href="" class="button add-button">Add New</a>
	</div>
	<div class="filter-box sorting">
		<form action='listuser.php' method='POST'>
			<select name='pilihancari' id='pilihancari'>
				<option value='all' selected>By Date Created</option>
				<?php		
							
				for ($i = 0; $i < count($filteropt) ; $i++) {
					echo "a";
					echo '<option value='.$filteropt[$i][1].'>'.$filteropt[$i][0].'</option>';				
				}	
				?>
			</select>
		</form>
	</div>
	<div class="filter-box search">
		<form action='listuser.php' method='POST'>
			<input type='text' name='tekscari' id='tekscari'>
			<input type='submit' name='search' id='search' value=''>
		</form>
	</div>
	<div class="clear"></div>
</div>