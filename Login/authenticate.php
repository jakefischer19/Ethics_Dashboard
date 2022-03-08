<?php
session_start();

//$DATABASE_HOST = '69.172.204.200';
//$DATABASE_USER = 'rwalker';
//$DATABASE_PASS = 'weN2021account';
//$DATABASE_NAME = 'rwalker_Ethics_Dashboard_OC_224';

$DATABASE_HOST = '69.172.204.200';
$DATABASE_USER = 'herrycoo_yhu';
$DATABASE_PASS = 'hY592836711@';
$DATABASE_NAME = 'herrycoo_Ethic_Dashboard';


//check for required fields from the form
if ((!filter_input(INPUT_POST, 'email')) || (!filter_input(INPUT_POST, 'password'))) {
  header("Location: https://https://herrycooly.com/EBoard/Login/login.html");
  exit;
}

//open mysql databse
$db_connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

//check if database connection succeeded 
if(!$db_connection){
  die("Connection failed: " . mysqli_connect_error());
}

//declare login variables
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
//session username for home
$_SESSION["email"] = "$email";
 
////$login_sql = $db_connection->prepare("SELECT password FROM user_accounts WHERE username=?");
//$login_sql->bind_param("s", $username);
//$login_sql->execute();
//$login_result = $login_sql->get_result();

//if ($login_result->num_rows == 1){
  $query = "SELECT password FROM students WHERE email='".$email."'";
  $result = mysqli_query($db_connection, $query);

  $row = mysqli_fetch_row($result);
  $hash = $row[0] ?? false;
  
  if(password_verify($password, $hash)){
    //set authorization cookie using curent Session ID
    //setcookie("user", $email, time()+3600, '/');

    header("Location: https://https://herrycooly.com/EBoard/home.html");
    exit;
  }else if(!password_verify($password, $hash)){
    //check if in admin database
    $query = "SELECT password FROM admins WHERE email='".$email."'";
    $result = mysqli_query($db_connection, $query);

    $row = mysqli_fetch_row($result);
    $hash = $row[0] ?? false;
    if(password_verify($password, $hash)){
      header("Location: https://https://herrycooly.com/EBoard/Admin/admin_page.html");
      exit;
    }
  }else{
    //redirect back to login form if not authorized
    
    unset($_SESSION['username']);
    header("Location: https://https://herrycooly.com/EBoard/Login/login.html");
    echo '<script language="javascript">alert("Incorrect email/password")</script>';
    exit;
  }
?>
