<?php
error_reporting(-1);
ini_set('display_errors', 'On');
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  //die(header("location: 404.php"));
  die(header("location: login.html"));
  exit;
}
if (!isset($_SESSION['CREATED'])) {
  $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > 1800) {
  // session started more than 30 minutes ago
  session_regenerate_id(true);    // change session ID for the current session and invalidate old session ID
  $_SESSION['CREATED'] = time();  // update creation time
}

//Set stuID variable
$stuID = $_SESSION['stuID'];
//connect to database for cases
require_once "Login/config.php";

$query = "SELECT COUNT(caseID) as mycount FROM cases WHERE stuID='" . $stuID . "'";
$result = mysqli_query($db_connection, $query);
$fetch = mysqli_fetch_object($result);
$currentCases = $fetch->mycount;

?>

<!DOCTYPE html>
<!--home.html may be renamed to dashboard, and dashboard.html renamed to home-->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css" />
  <title>Document</title>
</head>

<body onload="checkCase();">
  <!-- Replace with header without buttons -->
  <div id="header">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded">
      <div class="container-fluid">
        <a class="navbar-brand fs-3 fw-bolder">Ethics Dashboard</a>
        <a href="Login/logout.php" id="logoutbtn" class="btn justify-content-end btn-outline-primary btn-sm" role="button" style="position: relative; top: 0; right: 0;">Log out</a>
      </div>
    </nav>
  </div>

  <div class="container-fluid">
    <!--4 div id's used for adding new cases-->
    <div id="case1"></div>
    <div id="case2"></div>
    <div id="case3"></div>
    <div id="case4"></div>
    <!--Load case page to be filled out, also add a case to be stored into database, implementation once database is started-->
    <div class="row pb-3">
      <div class="col text-center">
        <button type="button" onclick="addCase();" class="btn btn-secondary">
          Create a new case
        </button>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script>
    //store case num into database when new case is created
    let caseMax = 4;
    let caseNum = <?php echo json_encode($currentCases); ?>;
    var stuID = <?php echo json_encode($stuID); ?>;

    function addCase() {
      if (caseNum < caseMax) {
        $.ajax({
          type: "POST",
          url: 'Scripts/add_case.php',
          data: {
            "stuID": stuID
          },
          dataType: 'json',
          cache: false,
          success: function(data) {
            caseNum = data[0];
            var caseID = data[1];
            //alert("Num of cases" + caseNum + ", case ID" + caseID);
            var caseHTML = '<div class="row pb-3"><div class="col pb"><div class="card"><button id="' + caseID + '" type="button" onclick="loadCase(this.id);" class="btn btn-light"><div class="card-body"><h3 class="pb-2">Case ' + caseNum + '</h3></div></button></div></div></div>';
            document.getElementById("case" + caseNum).insertAdjacentHTML('beforeend', caseHTML);
          },
          error: function(xhr, status, error) {
            console.error(xhr);
          }
        });
      }
    }

    function loadCase(clicked_id) {
      //alert(clicked_id);
      $.ajax({
        type: "POST",
        url: 'Scripts/load_case.php',
        data: {
          "stuID": stuID,
          "caseID": clicked_id
        },
        cache: false,
        success: function(data) {
          // alert("caseID = " + clicked_id);
          location.href = "dashboard.php";
        },
        error: function(xhr, status, error) {
          console.error(xhr);
        }
      });
    }

    function checkCase() {
      $.ajax({
        type: "POST",
        url: 'Scripts/check_case.php',
        data: {
          "stuID": stuID
        },
        dataType: 'json',
        cache: false,
        success: function(data) {
          //alert(data[1]);
          for (i = 0; i < caseNum; i++) {
            var caseHTML = '<div class="row pb-3"><div class="col pb"><div class="card"><button id="' + data[i] + '" type="button" onclick="loadCase(this.id);" class="btn btn-light"><div class="card-body"><h3 class="pb-2">Case ' + (i + 1) + '</h3></div></button></div></div></div>';
            document.getElementById("case" + caseNum).insertAdjacentHTML('beforeend', caseHTML);
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr);
        }
      });
    }

    function checkCase2() {
      //load stored database variable
      //alert(caseNum);
      for (i = 0; i < caseNum; i++) {
        var caseHTML = '<div class="row pb-3"><div class="col pb"><div class="card"><form action="dashboard.php" method="get"><button type="submit" class="btn btn-light"><div class="card-body"><h3 class="pb-2">New Case</h3></div></button></form></div></div></div>';
        document.getElementById("case" + caseNum).insertAdjacentHTML('beforeend', caseHTML);
      }
    }
  </script>
</body>

</html>