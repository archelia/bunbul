<?php
include "../../global/global.php";
$iditem = $_POST['iditem'];

 $resload = mysql_query("
	SELECT i.*, c.color_name, s.size_name, p.id_product, p.id_category
	FROM item i, color c, size s, product p 
	WHERE i.id_color = c.id_color 
	AND i.id_size = s.id_size 
	AND i.id_product=p.id_product  
	AND id_item='$iditem' ");
	
if($resload){
	$rowx = mysql_fetch_array($resload);
	echo '<ul>';
	echo '<li>
			<label for="productsku">Product SKU<em>*</em></label>
			<input type="text" name="productsku" id="productsku" maxlength="256" class="required" placeholder="Stock Keeping Unit" value="'.$rowx['sku'].'">
			<label for="productsku" class="error">This is a required field.</label>
		</li>';
	echo '<li>
			<label for="barcode">Barcode</label>
			<input type="text" name="barcode" id="barcode" maxlength="20" class="required" placeholder="Barcode" value="'.$rowx['barcode'].'">
			<label for="barcode" class="error">This is a required field.</label>
		</li>';
	echo '<li>
			<label for="productcolor">Color<em>*</em></label>
			<select name="productcolor" id="productcolor">	
			';	
			$result=mysql_query("SELECT * FROM color WHERE active='1' ORDER BY color_name DESC");
			while($row=mysql_fetch_array($result)){
					echo '<option value="'.$row['id_color'].'" ';
						if($row['id_color']==$rowx['id_color']){
							echo "selected";
						}
					echo '>'.$row['color_name'].'</option>';
				}
	echo '</select>
			<label for="productcolor" class="error">This is a required field.</label>
		</li>';			
	echo '<li>
			<label for="productsize">Size<em>*</em></label>
			<select name="productsize" id="productsize">';					
			$querysize="SELECT * FROM size WHERE active='1' AND id_category=".$rowx['id_category']." ORDER BY size_name ASC";
			$result=mysql_query($querysize);
				while($row=mysql_fetch_array($result)){
					echo '<option value="'.$row['id_size'].'" ';
					if($row['id_size']==$rowx['id_size']){
							echo "selected";
						}
					echo '>'.$row['size_name'].'</option>';
				}
	echo '</select>
			<label for="producttype" class="error">This is a required field.</label>
		</li>';			
	echo '<li>
				<label for="productstok">Stock</label>
				<input type="number" name="productstok" id="productstok" maxlength="2" placeholder="Number of stock" maxlength="5" min="0" value="'.$rowx['stock'].'">
				<label for="productstok" class="error">This is a required field.</label>					
			</li>';			
	echo '	<li>
				<label for="location">Location</label>
				<input type="text" name="location" id="location" maxlength="256" placeholder="Location/Rack No"  value="'.$rowx['location'].'">
				<label for="location" class="error">This is a required field.</label>
			</li>';			
	echo '<li class="centered">	
				<input type="hidden" name="id_product" id="id_product2" value="'.$rowx['id_product'].'">
				<input type="hidden" name="iditem" id="iditem" value="'.$iditem.'">				
				<button type="button" name="button-cancel" id="button-cancel-edit" class="button" onclick="canceledit();" style="margin-right: 30px;">CANCEL</button>
				<input type="submit" name="submit" id="submit" value="EDIT" class="button-edit-variant">
				<button type="button" name="button-next" id="button-next" class="button button-next" onclick="gototab3();">NEXT</button>
			</li>';					
	echo '</ul>';
}
?>	
	

	
				
				