<?php 
error_reporting(-1);
ini_set('display_errors', 'On');
session_start();

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'herrycoo_ethic_dashboard';
 
//open mysql databse
//$db_connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
$db_connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

//check if database connection succeeded 
if(!$db_connection){
  die("Connection failed: " . mysqli_connect_error());
  
}
$stuID = $_POST["stuID"];
$ID = $stuID;
$insert = "INSERT INTO cases (`stuID`) VALUES ('".$ID."')"; 

mysqli_query($db_connection, $insert);
//if(mysqli_query($db_connection, $insert)){
  $query = "SELECT COUNT(caseID) as mycount FROM cases WHERE stuID='".$stuID."'";
  $result = mysqli_query($db_connection, $query);
  $fetch = mysqli_fetch_object($result);
  $currentCases = $fetch->mycount;
  echo $currentCases;
    //echo json_encode(array("statusCode"=>200));
//}else{
    //echo json_encode(array("statusCode"=>201));
//}
mysqli_close($db_connection);
?>