<?php
/**
 * Created by PhpStorm.
 * User: lia
 * Date: 3/24/15
 * Time: 10:31 AM
 */

include '../conn.php';

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=subscribed-customer.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('id_cust','email', 'gender', 'date_subscribe'));

// fetch the data

$sql = "SELECT id_cust, email, gender, date_subscribe FROM customer_subscribe ORDER BY date_subscribe ASC ";
$query = mysql_query($sql);
while ($row = mysql_fetch_assoc($query)) fputcsv($output, $row);
?>