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
if (!$db_connection) {
  die("Connection failed: " . mysqli_connect_error());
}

$caseID = $_POST["caseID"];

$sql = $db_connection->prepare("SELECT option1, option2, option3 FROM cases WHERE caseID = ?");
$sql->bind_param("i", $caseID);
$sql->execute();
$result = $sql->get_result();


$returnArr = [];
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($returnArr, $row["option1"]);
    array_push($returnArr, $row["option2"]);
    array_push($returnArr, $row["option3"]);
  }
}
$sql->close();

$sql = $db_connection->prepare("SELECT o1_response, o2_response, o3_response FROM util WHERE caseID = ?");
$sql->bind_param("i", $caseID);
$sql->execute();
$result = $sql->get_result();

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($returnArr, $row["o1_response"]);
    array_push($returnArr, $row["o2_response"]);
    array_push($returnArr, $row["o3_response"]);
  }
}

$sql->close();
echo json_encode($returnArr);
mysqli_close($db_connection);
