<?php	
	include "../../global/global.php";
	include "header.php";	
	$pagecall = "listuser";
	include "controller.php";
?>
<div class="container">
	<div class="content list listuser">	
		<h3>List User</h3>
		<div class="addnew"><a href="" class="button add-button">Add New</a></div>
		<div class="data-table">
			<table border="1" cellpadding="0" cellspacing="0" width="100%">
				<colgroup>
					<col width="40%">
					<col width="40%">
					<col width="10%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
						<th>Username</th>
						<th>User Type</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$result = mysql_query("SELECT * FROM user ORDER BY active,date_created desc");
					while ($row=mysql_fetch_array($result))
					{
						echo '<tr>';
						echo '
								<td align="left">'.$row['username'].'</td>';
						$user_type = $row['user_type'];
						switch($user_type){
							case "1" :
							echo '<td>Super Admin</td>';
							break;
							case "2" :
							echo '<td>Administrator</td>';
							break;
							case "1" :
							echo '<td>Sales</td>';
							break;							
						}									
						echo '	<td align="center"><img src="" alt="Edit" title="Edit"></td>								
								<td align="center"><img src="" alt="Delete" title="Delete"></td>						
						';
						echo '</tr>';
					}
					?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="5">
							Showing 45 of 355 data.
						</td>
					</tr>
				</tfoot>
			</table>			
		</div>		
	</div>
	<div class="clear"></div>
</div>

<?php
	include "/footer.php";
?>