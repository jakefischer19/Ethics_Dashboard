<?php
error_reporting(-1);
ini_set('display_errors', 'On');
session_start();


//msqli server connection file
require_once "config.php";


//check for required fields from the form
if ((!filter_input(INPUT_POST, 'email')) || (!filter_input(INPUT_POST, 'password'))) {
 // header("Location: https://https://herrycooly.com/EBoard/Login/login.html");
  header("Location: login.html");
  exit;
}

//declare login variables
$old_email = filter_input(INPUT_POST, 'email');
$email = strtolower($old_email);
$password = filter_input(INPUT_POST, 'password');
//session username for home
$_SESSION["email"] = "$email";

//Session username for header
$_SESSION["userName"] = filter_input(INPUT_POST , 'email');

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

    //header("Location: https://https://herrycooly.com/EBoard/home.html");
    header("Location: /EBoard/home.php");

    exit;
  }else{
    //redirect back to login form if not authorized
    
    unset($_SESSION['email']);
    //header("Location: https://https://herrycooly.com/EBoard/Login/login.html");
    header("Location: login.html");

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
      header("Location: login.html");
    }
  }else{
    //redirect back to login form if not authorized
    
    unset($_SESSION['email']);
    //header("Location: https://https://herrycooly.com/EBoard/Login/login.html");
    header("Location: login.html");
    exit;
  }
}
?>
