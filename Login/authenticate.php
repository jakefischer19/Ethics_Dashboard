<?php
error_reporting(-1);
ini_set('display_errors', 'On');
session_start();


//msqli server connection file
require_once "config.php";


//check for required fields from the form
if ((!filter_input(INPUT_POST, 'email')) || (!filter_input(INPUT_POST, 'password'))) {
 // header("Location: https://https://herrycooly.com/EBoard/Login/login.html");
  header("Location: login.php");
  exit;
}

//declare login variables
$old_email = filter_input(INPUT_POST, 'email');
$email = strtolower($old_email);
$password = filter_input(INPUT_POST, 'password');
//session username for home
$_SESSION["email"] = "$email";

$login_sql = $db_connection->prepare("SELECT email FROM students WHERE email=?");
$login_sql->bind_param("s", $email);
$login_sql->execute();
////$login_result = $login_sql->get_result();
$login_sql->bind_result($email);
$login_result = $login_sql->fetch();


if($login_result){
  $login_sql->close();
    $query = "SELECT password FROM students WHERE email='".$email."'";
  $result = mysqli_query($db_connection, $query);

  $row = mysqli_fetch_array($result, MYSQLI_NUM);
  $hash = $row[0] ?? false;
  
  if(password_verify($password, $hash)){
    //set session
    $_SESSION['loggedin'] = true;
    //pass stuID
    $idquery = "SELECT stuID FROM students WHERE email='".$email."'";
    $result = mysqli_query($db_connection, $idquery);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    $stuID = $row[0] ?? false;
    $_SESSION["stuID"] = $stuID;

    $userFirstNameQuery = "SELECT f_name FROM students where stuID = '".$stuID."'";
    $firstNameResult = mysqli_query($db_connection, $userFirstNameQuery);
    $firstNameRow = mysqli_fetch_array($firstNameResult, MYSQLI_NUM);
    $firstName = $firstNameRow[0] ?? false;
    $_SESSION["firstName"] = $firstName;

    $userLastNameQuery = "SELECT l_name FROM students where stuID = '".$stuID."'";
    $lastNameResult = mysqli_query($db_connection, $userLastNameQuery);
    $lastNameRow = mysqli_fetch_array($lastNameResult, MYSQLI_NUM);
    $lastName = $lastNameRow[0] ?? false;
    $_SESSION["lastName"] = $lastName;

    //header("Location: https://https://herrycooly.com/EBoard/home.html");
    header("Location: /EBoard/home.php");

    exit;
  }else{
    //redirect back to login form if not authorized
    
    unset($_SESSION['email']);
    //header("Location: https://https://herrycooly.com/EBoard/Login/login.html");
    header("Location: login.php");

    echo '<script language="javascript">alert("Incorrect email/password")</script>';
    exit;
  }
}else{
  $login_sql->close();
  
  $login_sql = $db_connection->prepare("SELECT email FROM admins WHERE email=?");
  $login_sql->bind_param("s", $email);
  $login_sql->execute();
  //$login_result = $login_sql->get_result();
  $login_sql->bind_result($email);
  $login_result = $login_sql->fetch();

  
  if($login_result){
    //check if in admin database
    $login_sql->close();
    $query = "SELECT password FROM admins WHERE email='".$email."'";
    $result = mysqli_query($db_connection, $query);

    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    $hash = $row[0] ?? false;
    
    if(password_verify($password, $hash)){
      //header("Location: https://https://herrycooly.com/EBoard/Admin/admin_page.html");
      header("Location: /EBoard/Admin/admin_page.html");

      exit;
    }else{
      unset($_SESSION['email']);
      //header("Location: https://https://herrycooly.com/EBoard/Login/login.html");
      header("Location: login.php");
    }
  }else{
    //redirect back to login form if not authorized
    
    unset($_SESSION['email']);
    //header("Location: https://https://herrycooly.com/EBoard/Login/login.html");
    header("Location: login.php");
    exit;
  }
}
?>
