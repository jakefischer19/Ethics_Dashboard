<?php
session_start();

$DATABASE_HOST = '69.172.204.200';
$DATABASE_USER = 'herrycooly';
$DATABASE_PASS = 'hY592836711@';
$DATABASE_NAME = 'herrycoo_Ethic_Dashboard';

// Connect to database
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_REQUEST['email'], $_REQUEST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the email and password fields!');
}

if ($stmt = $con->prepare('SELECT email, password FROM students WHERE email = ?')) {
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

  if ($stmt->num_rows > 0) {
    $stmt->bind_result($email, $password);
    $stmt->fetch();
    
    // Account exists, now we verify the password.
    // Note: remember to use password_hash in your registration file to store the hashed passwords.
    
    if ($_POST['password'] === $password) { 
      
      // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
      session_regenerate_id();
      $_SESSION['loggedin'] = TRUE;
      $_SESSION['name'] = $_POST['username'];
      $_SESSION['id'] = $id;
      header('Location: home.php');
    } else {
      // Incorrect password
      echo 'Incorrect email and/or password!';
    }
  } else {
    // Incorrect username
    echo 'Incorrect email and/or password!';
  }

	$stmt->close();
}
?>