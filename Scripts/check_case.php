<?php 
error_reporting(-1);
ini_set('display_errors', 'On');
session_start();
/*
$DATABASE_HOST = '69.172.204.200';
$DATABASE_USER = 'herrycoo_yhu';
$DATABASE_PASS = 'hY592836711@';
$DATABASE_NAME = 'herrycoo_Ethic_Dashboard';
*/

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'herrycoo_Ethic_Dashboard';
 
//open mysql databse
//$db_connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$db_connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

//check if database connection succeeded 
if(!$db_connection){
  die("Connection failed: " . mysqli_connect_error());
  
}
$stuID = $_POST["stuID"];

$query = "SELECT caseID FROM cases WHERE stuID='".$stuID."'";
$result = mysqli_query($db_connection, $query);
//$result = mysqli_fetch_all($mysqli->query($query), MYSQLI_NUM);

$returnArr = [];
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    array_push($returnArr, $row["caseID"]);
  }
} 

echo json_encode($returnArr);
mysqli_close($db_connection);
?>