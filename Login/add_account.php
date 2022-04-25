<?php
error_reporting(-1);
ini_set('display_errors', 'On');
session_start();

//msqli server connection file
require_once "config.php";

class iimysqli_result
{
  public $stmt, $nCols;
}
function iimysqli_stmt_get_result($stmt)
{
  /**    EXPLANATION:
   * We are creating a fake "result" structure to enable us to have
   * source-level equivalent syntax to a query executed via
   * mysqli_query().
   *
   *    $stmt = mysqli_prepare($conn, "");
   *    mysqli_bind_param($stmt, "types", ...);
   *
   *    $param1 = 0;
   *    $param2 = 'foo';
   *    $param3 = 'bar';
   *    mysqli_execute($stmt);
   *    $result _mysqli_stmt_get_result($stmt);
   *        [ $arr = _mysqli_result_fetch_array($result);
   *            || $assoc = _mysqli_result_fetch_assoc($result); ]
   *    mysqli_stmt_close($stmt);
   *    mysqli_close($conn);
   *
   * At the source level, there is no difference between this and mysqlnd.
   **/
  $metadata = mysqli_stmt_result_metadata($stmt);
  $ret = new iimysqli_result;
  if (!$ret) return NULL;

  $ret->nCols = mysqli_num_fields($metadata);
  $ret->stmt = $stmt;

  mysqli_free_result($metadata);
  return $ret;
}
function iimysqli_result_fetch_array(&$result)
{
  $ret = array();
  $code = "return mysqli_stmt_bind_result(\$result->stmt ";

  for ($i = 0; $i < $result->nCols; $i++) {
    $ret[$i] = NULL;
    $code .= ", \$ret['" . $i . "']";
  };

  $code .= ");";
  if (!eval($code)) {
    return NULL;
  };

  // This should advance the "$stmt" cursor.
  if (!mysqli_stmt_fetch($result->stmt)) {
    return NULL;
  };

  // Return the array we built.
  return $ret;
}


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