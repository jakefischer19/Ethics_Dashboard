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
$sql = $db_connection->prepare("SELECT s1_name, s1_interests, s2_name, s2_interests, s3_name, s3_interests, 
                                s4_name, s4_interests, s5_name, s5_interests, s6_name, s6_interests FROM stakeholders WHERE caseID = ?");
$sql->bind_param("i", $caseID);
$sql->execute();
$result = $sql->get_result();


$returnArr = [];
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($returnArr, $row["s1_name"]);
    array_push($returnArr, $row["s1_interests"]);
    array_push($returnArr, $row["s2_name"]);
    array_push($returnArr, $row["s2_interests"]);
    array_push($returnArr, $row["s3_name"]);
    array_push($returnArr, $row["s3_interests"]);
    array_push($returnArr, $row["s4_name"]);
    array_push($returnArr, $row["s4_interests"]);
    array_push($returnArr, $row["s5_name"]);
    array_push($returnArr, $row["s5_interests"]);
    array_push($returnArr, $row["s6_name"]);
    array_push($returnArr, $row["s6_interests"]);
  }
}
$sql->close();
echo json_encode($returnArr);
mysqli_close($db_connection);
