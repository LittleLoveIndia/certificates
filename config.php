<?php
define('DB_SERVER','45.13.252.1');
define('DB_USER','u745566821_root');
define('DB_PASS' ,'Password@certificate123');
define('DB_NAME', 'u745566821_vol');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>