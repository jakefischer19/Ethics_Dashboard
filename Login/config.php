<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

//$DATABASE_HOST = '69.172.204.200';
//$DATABASE_USER = 'rwalker';
//$DATABASE_PASS = 'weN2021account';
//$DATABASE_NAME = 'rwalker_Ethics_Dashboard_OC_224';

// $DATABASE_HOST = '69.172.204.200';
// $DATABASE_USER = 'herrycoo_yhu';
// $DATABASE_PASS = 'hY592836711@';
// $DATABASE_NAME = 'herrycoo_Ethic_Dashboard';

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'herrycoo_Ethic_Dashboard';
 
//open mysql databse
$db_connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

//check if database connection succeeded 
if(!$db_connection){
  die("Connection failed: " . mysqli_connect_error());
  
}
?>