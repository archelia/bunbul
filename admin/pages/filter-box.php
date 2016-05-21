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
	$addnewpage = "addsubcategory.php?kode=$kode";
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
		array("Color Code A-Z","html_code:DESC"),	
		array("Color Code Z-A","html_code:DESC")	
	);
	break;	
	case "listpage" :
	// variables needed :
	$addnewpage = "addpage.php";
	$filteropt = array
	(
		array("Page Name A-Z","page_name:ASC"),
		array("Page Name Z-A","page_name:DESC"),	
		array("Page Title A-Z","page_title:DESC"),	
		array("Page Title Z-A","page_title:DESC")
	);
	break;	
	case "listproduct" :
	// variables needed :
	$addnewpage = "addproduct.php";
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
	case "listgallery" :
	// variables needed :
	$addnewpage = "addgallery.php";
	$filteropt = array
	(
		array("Gallery Title A-Z","gallery_title:ASC"),
		array("Gallery Title Z-A","gallery_title:DESC")
	);
	break;	
	case "listcustomer" :
	// variables needed :
	$addnewpage = "addcustomer.php";
	$filteropt = array
	(
		array("Customer Name A-Z","customer_name:ASC"),
		array("Customer Name Z-A","customer_name:DESC"),
		array("Customer Email A-Z","email:ASC"),
		array("Customer Email Z-A","email:DESC")
	);
	break;	
	case "listbanner" :
	// variables needed :
	$addnewpage = "addbanner.php";
	$filteropt = array
	(
		array("Banner Title A-Z","banner_title:ASC"),
		array("Banner Title Z-A","banner_title:DESC")
	);
	break;	
	case "listannouncement" :
	// variables needed :
	$addnewpage = "addannouncement.php";
	$filteropt = array
	(
		array("Title A-Z","announcement_title:ASC"),
		array("Title Z-A","announcement_title:DESC")
	);
	break;	
	case "listbank" :
	// variables needed :
	$addnewpage = "addbank.php";
	$filteropt = array
	(
		array("Bank Name A-Z","bank_name:ASC"),
		array("Bank Name Z-A","bank_name:DESC")
	);
	break;	
	case "listreseller" :
	// variables needed :
	$addnewpage = "listcustomer.php";
	$filteropt = array
	(
		array("Cashback Lower-Higher","cashback:ASC"),
		array("Cashback Higher-Lower","cashback:DESC"),
		array("Customer Name A-Z","customer_name:ASC"),
		array("Customer Name Z-A","customer_name:DESC")
	);
	break;		
	case "listpaymentmethod" :
	// variables needed :
	$addnewpage = "addpaymentmethod.php";
	$filteropt = array
	(
		array("Method Name A-Z","method_title:ASC"),
		array("Method Name Z-A","method_title:DESC")
	);
	break;	
	case "listshippingmethod" :
	// variables needed :
	$addnewpage = "addshippingmethod.php";
	$filteropt = array
	(
		array("Method Name A-Z","method_title:ASC"),
		array("Method Name Z-A","method_title:DESC")
	);
	break;	
	case "listprovince" :
	// variables needed :
	$addnewpage = "addprovince.php";
	$filteropt = array
	(
		array("Province Name A-Z","province_name:ASC"),
		array("Province Name Z-A","province_name:DESC")
	);
	break;	
	case "listcity" :
	// variables needed :
	$addnewpage = "addcity.php?kode=$kode";
	$filteropt = array
	(
		array("City Name A-Z","city_name:ASC"),
		array("City Name Z-A","city_name:DESC")
	);
	break;	
	case "listdistrict" :
	// variables needed :
	$addnewpage = "adddistrict.php?kode=$kode";
	$filteropt = array
	(
		array("Disctrict Name A-Z","district_name:ASC"),
		array("Disctrict Name Z-A","district_name:DESC")
	);
	break;	
	case "listorder" :
	// variables needed :
	$addnewpage = "addorder.php";
	$filteropt = array
	(
		array("Order No A-Z","id_order:ASC"),
		array("Order No Z-A","id_order:DESC"),
		array("Order Date A-Z","order_date:ASC"),
		array("Order Date Z-A","order_date:DESC"),
		array("Customer Name A-Z","customer_name:ASC"),
		array("Customer Name Z-A","customer_name:DESC")
	);
	break;		
}	
?>
<div class="form-tools">
	<div class="filter-box add-new">		
		<a href="<?php echo $addnewpage; ?>" class="button add-button">Add New</a>
	</div>
	<form action='<?php echo $pagecall;?>.php<?php if(isset($_GET['discard']))echo "?discard"; ?>' method='POST' name="sorting" id="sorting">
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