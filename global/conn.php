<?php
/**
 * Created by PhpStorm.
 * User: archelia
 * Date: 3/20/15
 * Time: 11:43 AM
 */

$servername = "localhost";
$username = "root";
$password = "";
$db = "vioreshopdb";

// Create connection
$conn = mysql_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}
//else echo "Connected successfully";

$selected = mysql_select_db( $db ,$conn) or die(mysql_error());
?>