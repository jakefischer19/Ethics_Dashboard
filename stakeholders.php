<?php
error_reporting(-1);
ini_set('display_errors', 'On');
session_start();

if (empty($_SESSION['caseID']) || $_SESSION['caseID'] == '') {
  header("Location: Login/login.html");
  die();
}

require_once "Login/config.php";

$stuID = $_SESSION["stuID"];
$caseID = $_SESSION["caseID"];

$s1_name = "";
$s1_interests = "";
$s2_name = "";
$s2_interests = "";
$s3_name = "";
$s3_interests = "";
$s4_name = "";
$s4_interests = "";
$s5_name = "";
$s5_interests = "";
$s6_name = "";
$s6_interests = "";

if (isset($_POST['save'])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $s1_name = filter_input(INPUT_POST, "stakeholder-1");
    $s1_interests = filter_input(INPUT_POST, "interests-1");
    $s2_name = filter_input(INPUT_POST, "stakeholder-2");
    $s2_interests = filter_input(INPUT_POST, "interests-2");
    $s3_name = filter_input(INPUT_POST, "stakeholder-3");
    $s3_interests = filter_input(INPUT_POST, "interests-3");
    $s4_name = filter_input(INPUT_POST, "stakeholder-4");
    $s4_interests = filter_input(INPUT_POST, "interests-4");
    $s5_name = filter_input(INPUT_POST, "stakeholder-5");
    $s5_interests = filter_input(INPUT_POST, "interests-5");
    $s6_name = filter_input(INPUT_POST, "stakeholder-6");
    $s6_interests = filter_input(INPUT_POST, "interests-6");
  }


  $sql = "UPDATE stakeholders 
              SET s1_name = ?, s1_interests = ?, s2_name = ?, s2_interests = ?, s3_name = ?, s3_interests = ?, 
                  s4_name = ?, s4_interests = ?, s5_name = ?, s5_interests = ?, s6_name = ?, s6_interests = ? 
              WHERE caseID= ?";
  $save_sql = $db_connection->prepare($sql);
  $save_sql->bind_param(
    "ssssssssssssi",
    $s1_name,
    $s1_interests,
    $s2_name,
    $s2_interests,
    $s3_name,
    $s3_interests,
    $s4_name,
    $s4_interests,
    $s5_name,
    $s5_interests,
    $s6_name,
    $s6_interests,
    $caseID
  );
  $save_sql->execute();


  if ($save_sql === TRUE) {
    if ($save_sql->affected_rows === 1) {
      echo "<script> alert('Your case information was saved sucessfully.'); window.location='dashboard.php'</script>";
    } else {
      echo "<script> alert('Unable to save your information. Please try again.'); window.location='dashboard.php'</script>";
    }
    $save_sql->close();
  }
}
$db_connection->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <title>Ethics Dashboard</title>
  <script src="//code.jquery.com/jquery.min.js"></script>

  <script>
    var counter = 3;

    function goBack() {
      window.location.href = "/EBoard/dashboard.php";
    }

    $(document).ready(function() {
      // counter = localStorage.getItem("stakeholders_counter");
      ta_counter = localStorage.getItem("ta_counter");
      if (ta_counter >= 1) {
        document.getElementById("stakeholder-1").disabled = true;
        document.getElementById("stakeholder-2").disabled = true;
        document.getElementById("stakeholder-3").disabled = true;
        document.getElementById("stakeholder-4").disabled = true;
        document.getElementById("stakeholder-5").disabled = true;
        document.getElementById("stakeholder-6").disabled = true;


        document.getElementById("interests-1").disabled = true;
        document.getElementById("interests-2").disabled = true;
        document.getElementById("interests-3").disabled = true;
        document.getElementById("interests-4").disabled = true;
        document.getElementById("interests-5").disabled = true;
        document.getElementById("interests-6").disabled = true;
      }
    });

    function incCounter() {
      counter++;
    }

    function sendStakeholdersCounter() {
      localStorage.setItem("stakeholders_counter", counter);
    }
  </script>

  <link rel="stylesheet" href="style.css" />
</head>

<body onload="loadStakeholders();">
  <!-- Load Header -->
  <div id="header">
    <script>
      $(function() {
        $("#header").load("header.php");
      });
    </script>
  </div>
  <form action="stakeholders.php" method="POST">
    <div class="container-fluid">
      <center>
        <h3 class="pb-2">STAKEHOLDER ANALYSIS</h3>
      </center>
      <br />
      <div class="card">
        <div class="card-body">
          <p style="font-size: 18px">
            <b>
              Stakeholders are persons or groups that will be impacted by the
              decision/action taken. List the stakeholders and what they want in
              the simplest terms – wealth, social status, etc. Note: It’s good
              to start with the decision-maker as the first stakeholder and then
              work out from there.
            </b>
          </p>
          <hr />
          <div class="row p-2">
            <div class="col-lg p-2">
              <h4 class="pb-2">STAKEHOLDER 1</h4>
              <textarea name="stakeholder-1" id="stakeholder-1" cols="10" rows="7" placeholder="The engineer asked to design the VW defeat device."></textarea>
            </div>
            <div class="col-lg p-2">
              <h4 class="pb-2">INTERESTS</h4>
              <textarea name="interests-1" id="interests-1" cols="10" rows="7" placeholder="Professional success, job security, a clear conscience."></textarea>
            </div>
          </div>

          <div class="row p-2">
            <div class="col-lg p-2">
              <h4 class="pb-2">STAKEHOLDER 2</h4>
              <textarea name="stakeholder-2" id="stakeholder-2" cols="10" rows="7" placeholder="The decision makers at VW who asked the engineer to create the device"></textarea>
            </div>
            <div class="col-lg p-2">
              <h4 class="pb-2">INTERESTS</h4>
              <textarea name="interests-2" id="interests-2" cols="10" rows="7" placeholder="Increase Profit, Satisfy Consumer needs"></textarea>
            </div>
          </div>

          <div class="row p-2">
            <div class="col-lg p-2">
              <h4 class="pb-2">STAKEHOLDER 3</h4>
              <textarea name="stakeholder-3" id="stakeholder-3" cols="10" rows="7" placeholder="Consumers - vehicle buyers"></textarea>
            </div>
            <div class="col-lg p-2">
              <h4 class="pb-2">INTERESTS</h4>
              <textarea name="interests-3" id="interests-3" cols="10" rows="7" placeholder="A 'green' vehicle, a clear conscience, social status"></textarea>
            </div>
          </div>

          <div class="row p-2">
            <div class="col-lg p-2">
              <h4 class="pb-2">STAKEHOLDER 4</h4>
              <textarea name="stakeholder-4" id="stakeholder-4" cols="10" rows="7" placeholder="Enter your stakeholder here" onchange="incCounter()"></textarea>
            </div>
            <div class="col-lg p-2">
              <h4 class="pb-2">INTERESTS</h4>
              <textarea name="interests-4" id="interests-4" cols="10" rows="7" placeholder="Enter the interests here"></textarea>
            </div>
          </div>

          <div class="row p-2">
            <div class="col-lg p-2">
              <h4 class="pb-2">STAKEHOLDER 5</h4>
              <textarea name="stakeholder-5" id="stakeholder-5" cols="10" rows="7" placeholder="Enter your stakeholder here" onchange="incCounter()"></textarea>
            </div>
            <div class="col-lg p-2">
              <h4 class="pb-2">INTERESTS</h4>
              <textarea name="interests-5" id="interests-5" cols="10" rows="7" placeholder="Enter the interests here"></textarea>
            </div>
          </div>

          <div class="row p-2">
            <div class="col-lg p-2">
              <h4 class="pb-2">STAKEHOLDER 6</h4>
              <textarea name="stakeholder-6" id="stakeholder-6" cols="10" rows="7" placeholder="Enter your stakeholder here" onchange="incCounter()"></textarea>
            </div>
            <div class="col-lg p-2">
              <h4 class="pb-2">INTERESTS</h4>
              <textarea name="interests-6" id="interests-6" cols="10" rows="7" placeholder="Enter the interests here"></textarea>
            </div>
          </div>
          <br />
          <div class="btns">
            <input type="submit" name="save" id="Submit" value="Submit" class="stakeholders-btn ms-2 mt-3" onclick="sendStakeholdersCounter();unhook()" />

            <input type="button" class="stakeholders-btn ms-2 mt-3" value="Go back" onclick="goBack()">

          </div>
        </div>
      </div>
    </div>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script>
    var stuID = <?php echo json_encode($stuID); ?>;
    var caseID = <?php echo json_encode($caseID); ?>;

    function loadStakeholders() {

      //alert("working");
      $.ajax({
        type: "POST",
        url: 'Scripts/get_stakeholders.php',
        data: {
          "caseID": caseID
        },
        dataType: 'json',
        cache: false,
        success: function(data) {
          var s1_name = data[0];
          var s1_interests = data[1];
          var s2_name = data[2];
          var s2_interests = data[3];
          var s3_name = data[4];
          var s3_interests = data[5];
          var s4_name = data[6];
          var s4_interests = data[7];
          var s5_name = data[8];
          var s5_interests = data[9];
          var s6_name = data[10];
          var s6_interests = data[11];
          document.getElementById('stakeholder-1').innerHTML = s1_name;
          document.getElementById('interests-1').innerHTML = s1_interests;
          document.getElementById('stakeholder-2').innerHTML = s2_name;
          document.getElementById('interests-2').innerHTML = s2_interests;
          document.getElementById('stakeholder-3').innerHTML = s3_name;
          document.getElementById('interests-3').innerHTML = s3_interests;
          document.getElementById('stakeholder-4').innerHTML = s4_name;
          document.getElementById('interests-4').innerHTML = s4_interests;
          document.getElementById('stakeholder-5').innerHTML = s5_name;
          document.getElementById('interests-5').innerHTML = s5_interests;
          document.getElementById('stakeholder-6').innerHTML = s6_name;
          document.getElementById('interests-6').innerHTML = s6_interests;
        },
        error: function(xhr, status, error) {
          console.error(xhr);
        }
      });
    }
  </script>
</body>

</html>