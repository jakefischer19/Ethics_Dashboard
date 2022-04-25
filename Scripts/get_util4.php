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
$returnArr = [];

//get options
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

//get stakeholders
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
//get rest of data

$sql = $db_connection->prepare("SELECT st_o2_slider1, st_o2_slider2, st_o2_slider3, st_o2_slider4, st_o2_slider5, st_o2_slider6,
                                       st_o2_slider_txt_1, st_o2_slider_txt_2, st_o2_slider_txt_3, st_o2_slider_txt_4, st_o2_slider_txt_5, st_o2_slider_txt_6, 
                                       st_o2_radio1, st_o2_radio2, st_o2_radio3, st_o2_radio4, st_o2_radio5, st_o2_radio6,
                                       lt_o2_slider1, lt_o2_slider2, lt_o2_slider3,  lt_o2_slider4, lt_o2_slider5, lt_o2_slider6, 
                                       lt_o2_slider_txt_1, lt_o2_slider_txt_2, lt_o2_slider_txt_3, lt_o2_slider_txt_4, lt_o2_slider_txt_5, lt_o2_slider_txt_6, 
                                       lt_o2_radio1, lt_o2_radio2, lt_o2_radio3, lt_o2_radio4, lt_o2_radio5, lt_o2_radio6 
                                       FROM util 
                                       WHERE caseID = ?");
$sql->bind_param("i", $caseID);
$sql->execute();
$result = $sql->get_result();


if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while ($row = mysqli_fetch_assoc($result)) {
    array_push($returnArr, $row["st_o2_slider1"]);
    array_push($returnArr, $row["st_o2_slider2"]);
    array_push($returnArr, $row["st_o2_slider3"]);
    array_push($returnArr, $row["st_o2_slider4"]);
    array_push($returnArr, $row["st_o2_slider5"]);
    array_push($returnArr, $row["st_o2_slider6"]);
    array_push($returnArr, $row["st_o2_slider_txt_1"]);
    array_push($returnArr, $row["st_o2_slider_txt_2"]);
    array_push($returnArr, $row["st_o2_slider_txt_3"]);
    array_push($returnArr, $row["st_o2_slider_txt_4"]);
    array_push($returnArr, $row["st_o2_slider_txt_5"]);
    array_push($returnArr, $row["st_o2_slider_txt_6"]);
    array_push($returnArr, $row["st_o2_radio1"]);
    array_push($returnArr, $row["st_o2_radio2"]);
    array_push($returnArr, $row["st_o2_radio3"]);
    array_push($returnArr, $row["st_o2_radio4"]);
    array_push($returnArr, $row["st_o2_radio5"]);
    array_push($returnArr, $row["st_o2_radio6"]);
    array_push($returnArr, $row["lt_o2_slider1"]);
    array_push($returnArr, $row["lt_o2_slider2"]);
    array_push($returnArr, $row["lt_o2_slider3"]);
    array_push($returnArr, $row["lt_o2_slider4"]);
    array_push($returnArr, $row["lt_o2_slider5"]);
    array_push($returnArr, $row["lt_o2_slider6"]);
    array_push($returnArr, $row["lt_o2_slider_txt_1"]);
    array_push($returnArr, $row["lt_o2_slider_txt_2"]);
    array_push($returnArr, $row["lt_o2_slider_txt_3"]);
    array_push($returnArr, $row["lt_o2_slider_txt_4"]);
    array_push($returnArr, $row["lt_o2_slider_txt_5"]);
    array_push($returnArr, $row["lt_o2_slider_txt_6"]);
    array_push($returnArr, $row["lt_o2_radio1"]);
    array_push($returnArr, $row["lt_o2_radio2"]);
    array_push($returnArr, $row["lt_o2_radio3"]);
    array_push($returnArr, $row["lt_o2_radio4"]);
    array_push($returnArr, $row["lt_o2_radio5"]);
    array_push($returnArr, $row["lt_o2_radio6"]);
  }
}

$sql->close();
echo json_encode($returnArr);
mysqli_close($db_connection);
