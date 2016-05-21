<?php
include "../../global/global.php";
if($_POST)
{
	$q=$_POST['search'];
	$sql_res=mysql_query("SELECT * FROM customer WHERE customer_name like '%$q%' or email like '%$q%'  order by customer_name LIMIT 5");
	
	echo '<ul>';	
	while($row=mysql_fetch_array($sql_res))
	{
		$username=$row['customer_name'];
		$email=$row['email'];
		$b_username='<strong>'.$q.'</strong>';
		$b_email='<strong>'.$q.'</strong>';
		$final_username = str_ireplace($q, $b_username, $username);
		$final_email = str_ireplace($q, $b_email, $email);
		
		echo '<li class="show" data-idcust="'.$row['id_customer'].'" data-cust-name="'.$row['customer_name'].'">'.$final_username.'('.$final_email.')'.'</li>';
	}
	echo '</ul>';
}
?>