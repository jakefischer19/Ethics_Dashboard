<?php 
session_start();
$DATABASE_HOST = '69.172.204.200';
$DATABASE_USER = 'herrycoo_yhu';
$DATABASE_PASS = 'hY592836711@';
$DATABASE_NAME = 'herrycoo_Ethic_Dashboard';
 
//open mysql databse
$db_connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

//check if database connection succeeded 
if(!$db_connection){
  die("Connection failed: " . mysqli_connect_error());
  
}

$caseID = $_POST["caseID"];
$stuID = $_POST["stuID"];
$caseID++;
$query = "UPDATE cases SET caseID = '".$caseID."' WHERE stuID='".$stuID."'";
mysqli_query($db_connection, $query); 

echo $caseID;
?>