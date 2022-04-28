<?php
error_reporting(-1);
ini_set('display_errors', 'On');
session_start();

//msqli server connection file
require_once "config.php";

if (isset($_POST['submit'])) {
  //check for required fields from the form
  if ((!filter_input(INPUT_POST, 'email')) || (!filter_input(INPUT_POST, 'password')) || 
  (!filter_input(INPUT_POST, 'f_name')) || (!filter_input(INPUT_POST, 'l_name'))) {
    header("Location: https://https://herrycooly.com/EBoard/Login/stu_registration.html");
    exit;
  }
}

//open mysql databse
$db_connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

//check if database connection succeeded 
if (!$db_connection) {
  die("Connection failed: " . mysqli_connect_error());
}

$f_name = filter_input(INPUT_POST, 'f_name');
$l_name = filter_input(INPUT_POST, 'l_name');
$oldemail = filter_input(INPUT_POST, 'email');
$email = strtolower($oldemail);
$password = filter_input(INPUT_POST, 'password');
$hash = password_hash($password, PASSWORD_DEFAULT);



//prepared statement for select
$login_sql = $db_connection->prepare("SELECT email FROM students WHERE email=?");
$login_sql->bind_param("s", $email);
$login_sql->execute();
$login_sql->bind_result($email);
$login_result = $login_sql->fetch();

if($login_result){

  //header("Location: https://https://herrycooly.com/EBoard/Login/login.html");
  // header("Location: add_account.php");
  
  echo "<script>alert('User Account Already Exists'); window.location='stu_registration.html'</script>";

}else{
  $login_sql->close();

  //$stmt_check->close();

  $stmt_check = $db_connection->prepare("INSERT INTO students (f_name, l_name, email, password) VALUES(?,?,?,?)");
  $stmt_check->bind_param("ssss", $f_name, $l_name, $email, $hash);
  $stmt_check->execute();

  echo "<script>alert('New User Account Created, Please Log In') window.location='stu_registration.html'</script>";

  $stmt_check->close();

  //header("Location: https://https://herrycooly.com/EBoard/Login/login.html");
  header("Location: login.html");
}
?>
