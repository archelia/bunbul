<?php
/**
 * Created by PhpStorm.
 * User: lia
 * Date: 3/20/15
 * Time: 11:48 AM
 */

include 'conn.php';
if(isset($_POST['EMAIL'])) $email = $_POST['EMAIL'];
if(isset($_POST['FIRSTNAME'])) $firstname = $_POST['FIRSTNAME'];
if(isset($_POST['LASTNAME'])) $lastname = $_POST['LASTNAME'];
if(isset($_POST['MERGE3'])) $gender = $_POST['MERGE3'];

$sql = "INSERT into customer_subscribe ";
$sql .= "VALUES ('', '$email', '$firstname', '$lastname', '$gender', now(), 1)";
if($query = mysql_query($sql)) {echo "sukses";} else {echo "fail";}

?>
