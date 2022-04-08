<?php

  error_reporting(-1);
  ini_set('display_errors', 'On');
  session_start();

  if(empty($_SESSION['caseID']) || $_SESSION['caseID'] == ''){
    header("Location: Login/login.php");
    die();
  } 

  require_once "Login/config.php";

  $stuID = $_SESSION["stuID"];
  $caseID = $_SESSION["caseID"];

$summary = "";
$role = "";
$dilemmas = "";

if (isset($_POST['save'])) {

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $summary = filter_input(INPUT_POST, "case-summary");
  $role = filter_input(INPUT_POST, "role");
  $dilemmas = filter_input(INPUT_POST, "dilemmas");
}

//get case # from db
// $query = "SELECT caseNum FROM cases WHERE caseID ='".$caseID."'";
// $result = mysqli_query($db_connection, $query);
// $row = mysqli_fetch_array($result, MYSQLI_NUM);
// $caseNum = $row[0] ?? false;

  $sql = "UPDATE cases SET summary='$summary', role='$role', dilemmas='$dilemmas' WHERE caseID='$caseID'";

  if ($db_connection->query($sql) === TRUE) {
    print "<div class='alert alert-success d-flex align-items-center' role='alert'><svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
    <div>
      You have successfully saved the information!
    </div>
  </div>";
  } else {
    print "<div class='alert alert-danger d-flex align-items-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
    <div>
      Save failed, please try again!
    </div>
  </div>";
  }

$db_connection->close();
}

?>

<!DOCTYPE html>
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
    <title>Ethics Dashboard</title>
    <script>
      $(document).ready(function () {
        $(".dropdown").hover(function () {
          var dropdownMenu = $(this).children(".dropdown-menu");
          if (dropdownMenu.is(":visible")) {
            dropdownMenu.parent().toggleClass("open");
          }
        });
      });
    </script>
  </head>
  <body>
    <!-- Load Header -->
    <div id="header">
   
      <script>
         $(function () {
          $("#header").load("header.php");
        });
        
        var hook = true;
      window.onbeforeunload = function () {
        if (hook) {
          return "Did you save your stuff?";
        }
      };
      function unhook() {
        hook = false;
      }
       
        
      </script>
  </div>
    <form action="dashboard.php" method="POST">
      <div class="container-fluid">
        <div class="row pb-3">
          <div class="col-lg pb-3">
            <div class="card">
              <div class="card-body">
                <h3 class="pb-2">Step 1 - Case Summary</h3>
                <textarea
                  name="case-summary"
                  id="case-summary"
                  cols="30"
                  rows="12"
                  placeholder="Briefly describe the key, features of the case—the who, what, where, when and why."
                ></textarea>
              </div>
            </div>
          </div>
          <div class="col-lg pb-3">
            <div class="card">
              <div class="card-body">
                <h3 class="pb-2">Step 2 - Choose Your Role</h3>
                <textarea
                  name="role"
                  id="role"
                  cols="30"
                  rows="12"
                  placeholder="Put yourself in the position of a key decision maker in the case."
                ></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="row pb-3">
          <div class="col-lg pb-3">
            <div class="card">
              <div class="card-body">
                <h3 class="pb-2">Step 3 - Identify the Dilemmas</h3>
                <textarea
                  name="dilemmas"
                  id="dilemmas"
                  cols="30"
                  rows="13"
                  placeholder="What are the ethical dilemmas you are facing? Describe the dilemmas in ethical terms, eg. Honesty, deception, loyalty, betrayal, beneficence, malfeasance, autonmy, paternalism, confidentiality, transparency, integrity, etc..."
                ></textarea>
              </div>
            </div>
          </div>
          <div class="col-lg pb-3">
            <div class="card h-100">
              <div class="card-body">
                <h3 class="pb-2">Step 4 -Identify Your Options</h3>
                <a
                  href="options.html"
                  class="btn btn-dark"
                  role="button"
                  style="position: absolute; bottom: 8px; right: 8px"
                >
                  Edit Options
                </a>
                <br />
                <h5>Option 1</h5>
                <h5>Option 2</h5>
                <h5>Option 3</h5>
              </div>
            </div>
          </div>
          <div class="col-lg pb-3">
            <div class="card h-100">
              <div class="card-body">
                <h3 class="pb-2">Step 5 - Stakeholders</h3>
                <br />
                <a
                  href="stakeholders.html"
                  class="btn btn-dark"
                  role="button"
                  style="position: absolute; bottom: 8px; right: 8px"
                >
                  Edit Stakeholders
                </a>
                <h5>Stakeholder 1</h5>
                <h5>Stakeholder 2</h5>
                <h5>Stakeholder 3</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
         <center>
      <input
        class="btn btn-dark justify-content-center"
        type="submit"
        name="save"
        value="Save Data"
        style="margin-bottom: 30px"
        onclick="unhook()"
      />
   
      <a href="/EBoard/utilitarianism.html" style="margin-left: 20px; margin-bottom: 30px;" class="btn btn-dark justify-content-center"
        name="nextPage">Go to utilitarianism</a>
      </center>
      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
     
      
    </form>

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
