<?php 
error_reporting(-1);
ini_set('display_errors', 'On');
session_start();

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

$caseID = $_POST["caseID"];

$sql = $db_connection->prepare("SELECT s1_name, s2_name, s3_name, s4_name, s5_name, s6_name FROM stakeholders WHERE caseID = ?");
$sql->bind_param("i", $caseID);
$sql->execute();
$result = $sql->get_result();

$returnArr = [];
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    array_push($returnArr, $row["s1_name"]);
    array_push($returnArr, $row["s2_name"]);
    array_push($returnArr, $row["s3_name"]);
    array_push($returnArr, $row["s4_name"]);
    array_push($returnArr, $row["s5_name"]);
    array_push($returnArr, $row["s6_name"]);
  }
} 
$sql->close();

$sql = $db_connection->prepare("SELECT s1_defense, s2_defense, s3_defense, s4_defense, s5_defense, s6_defense, 
                                      s1_slider, s2_slider, s3_slider, s4_slider, s5_slider, s6_slider 
                                FROM util 
                                WHERE caseID = ?");
$sql->bind_param("i", $caseID);
$sql->execute();
$result = $sql->get_result();

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    array_push($returnArr, $row["s1_defense"]);
    array_push($returnArr, $row["s2_defense"]);
    array_push($returnArr, $row["s3_defense"]);
    array_push($returnArr, $row["s4_defense"]);
    array_push($returnArr, $row["s5_defense"]);
    array_push($returnArr, $row["s6_defense"]);
    array_push($returnArr, $row["s1_slider"]);
    array_push($returnArr, $row["s2_slider"]);
    array_push($returnArr, $row["s3_slider"]);
    array_push($returnArr, $row["s4_slider"]);
    array_push($returnArr, $row["s5_slider"]);
    array_push($returnArr, $row["s6_slider"]);
  }
} 

$sql->close();
echo json_encode($returnArr);
mysqli_close($db_connection);
