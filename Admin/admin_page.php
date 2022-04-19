<?php session_start(); 
$_SESSION["name"] = $_SESSION["adminFirstName"] ." ". $_SESSION["adminLastName"];
?>

<!DOCTYPE html>
<!--home.html may be renamed to dashboard, and dashboard.html renamed to home-->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <script src="//code.jquery.com/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Document</title>
  </head>

  <body>
    <!-- Replace with header without buttons -->
    <div id="header">
      <nav
        class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded"
      >
        <div class="container-fluid">
          <a class="navbar-brand fs-3 fw-bolder">Ethics Dashboard</a>
          <div class="navbar-nav justify-content-end ">
          <a href="#" class="btn justify-content-end btn-sm" role="button" style="margin-right:10px;"><img src="/EBoard/login-icon.png" height="20"> <?php echo $_SESSION["name"]; ?></a>
              <a href="/EBoard/Login/logout.php" id="logoutbtn" class="btn justify-content-end btn-outline-primary btn-sm" role="button">Log out</a>
</div>
        </div>
      </nav>
    </div>

    <div class="container-fluid">
      <div class="row pb-3">
        <div class="col text-center">
          <form action="/EBoard/Login/stu_registration.html" method="get">
            <button type="submit" class="btn btn-secondary">
              Add a new student account
            </button>
          </form>
        </div>
      </div>
    
    <div class="row pb-3">
      <div class="col text-center">
        <form action="/EBoard/Login/admin_registration.html" method="get">
          <button type="submit" class="btn btn-secondary">
            Add a new admin/TA account
          </button>
        </form>
      </div>
    </div>

    <div class="row pb-3">
      <div class="col text-center">
        <form action="/EBoard/Admin/student-cases.php" method="get">
          <button type="submit" class="btn btn-secondary">
        View student cases
          </button>
        </form>
      </div>
    </div>
 
  </div>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
      integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
      integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
