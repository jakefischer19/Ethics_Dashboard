<?php
error_reporting(-1);
ini_set('display_errors', 'On');
session_start();

// $DATABASE_HOST = '69.172.204.200';
// $DATABASE_USER = 'herrycoo_yhu';
// $DATABASE_PASS = 'hY592836711@';
// $DATABASE_NAME = 'herrycoo_Ethic_Dashboard';


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

$sql = $db_connection->prepare("SELECT summary, role, dilemmas FROM cases WHERE caseID = ?");
$sql->bind_param("i", $caseID);
$sql->execute();
$result = $sql->get_result();

//$query = "SELECT summary WHERE caseID ='".$caseID."'";
//$result = mysqli_query($db_connection, $query);

$returnArr = [];
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($returnArr, $row["summary"]);
    array_push($returnArr, $row["role"]);
    array_push($returnArr, $row["dilemmas"]);
  }
}
$sql->close();

$sql = $db_connection->prepare("SELECT option1, option2, option3 FROM cases WHERE caseID = ?");
$sql->bind_param("i", $caseID);
$sql->execute();
$result = $sql->get_result();

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($returnArr, $row["option1"]);
    array_push($returnArr, $row["option2"]);
    array_push($returnArr, $row["option3"]);
  }
}
$sql->close();

$sql = $db_connection->prepare("SELECT s1_name, s2_name, s3_name, s4_name, s5_name, s6_name FROM stakeholders WHERE caseID = ?");
$sql->bind_param("i", $caseID);
$sql->execute();
$result = $sql->get_result();

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($returnArr, $row["s1_name"]);
    array_push($returnArr, $row["s2_name"]);
    array_push($returnArr, $row["s3_name"]);
    array_push($returnArr, $row["s4_name"]);
    array_push($returnArr, $row["s5_name"]);
    array_push($returnArr, $row["s6_name"]);
  }
}
$sql->close();

echo json_encode($returnArr);

mysqli_close($db_connection);
