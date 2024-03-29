<?php
error_reporting(-1);
ini_set('display_errors', 'On');

require_once "config.php";

$error_message = "";
$style = "visibility:visible";

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = $db_connection->prepare("SELECT * FROM students WHERE email=?");
  $sql->bind_param("s", $email);
  $sql->execute();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" href="../style.css" />
  <title>Ethics Dashboard</title>
  <script src="//code.jquery.com/jquery.min.js"></script>

  <script>
    $(document).ready(function() {
      var resetValue = 0;

      localStorage.setItem("admin_counter", resetValue);
      localStorage.setItem("ta_counter", resetValue);
    });
  </script>
</head>

<body>
  <section class="login-greeting">
    <h1 class="login-heading">Welcome to the Ethics Dashboard!</h1>
    <br />
    <p>The perfect study tool for Ethics students</p>
  </section>
  <section class="vh-100" style="background: hsl(var(--clr-neutral-200))">
    <div class="container py-5 h-75">
      <!-- <center>
        <div class="alert alert-danger login-error mb-2 col-6" style="<?php echo $style; ?>">Email and password combination do not match out records. Please try again or or go to sign up!</div>
      </center> -->
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-6">
          <div class="card shadow p-3 mb-5 bg-white rounded" style="border-radius: 1rem">
            <div class="card-body p-5 text-center">
              <h3 class="mb-5">Sign in</h3>
              <form action="authenticate.php" method="post">
                <div class="form-outline mb-4">
                  <input type="email" name="email" id="email" class="form-control form-control-lg col-10 mx-auto" required />
                  <label class="form-label" for="email">Email</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" id="password" class="form-control form-control-lg col-10 mx-auto" required />
                  <label class="form-label" for="password">Password</label>
                </div>
                <br />
                <button class="login-btn btn btn-dark btn-lg btn-block col-7 mx-auto" type="submit" name="login">
                  Login
                </button>
                <hr class="my-4" />
              </form>
              <form action="stu_registration.html" method="post">
                <button class="register-btn btn btn-dark btn-lg btn-block col-7 mx-auto" type="submit">
                  Sign Up
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>