
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


echo "<script>alert('Variable set!')</script>";
  
    $old_email = filter_input(INPUT_POST, 'email');
    $email = strtolower($old_email);
    $password = filter_input(INPUT_POST, 'password');
    echo $email;
    echo "<br>";
    echo $password;

    $login_sql = $db_connection->prepare("SELECT email FROM students WHERE email=?");
$login_sql->bind_param("s", $email);
$login_sql->execute();
////$login_result = $login_sql->get_result();
$login_sql->bind_result($email);
$login_result = $login_sql->fetch();

if($login_result){
    echo "<br>";
echo "Logged in successfully !";

$login_sql->close();
$query = "SELECT password FROM students WHERE email='".$email."'";
$result = mysqli_query($db_connection, $query);

$row = mysqli_fetch_array($result, MYSQLI_NUM);
$hash = $row[0] ?? false;

if($password == $hash){
 echo "Password verified !";
 $_SESSION['loggedin'] = true;

 $idquery = "SELECT stuID FROM students WHERE email='".$email."'";
    $result = mysqli_query($db_connection, $idquery);
    $row = mysqli_fetch_array($result, MYSQLI_NUM);
    $stuID = $row[0] ?? false;
    $_SESSION["stuID"] = $stuID;

    //To show Admin's First and Last name in navbar
   $_SESSION["firstName"] = $_SESSION['adminFirstName'];
   $_SESSION["lastName"] = $_SESSION['adminLastName'];
  
    header("Location: /EBoard/home.php");
 }
 else
 {
    echo "Password not verified !";
 }
}





?>
