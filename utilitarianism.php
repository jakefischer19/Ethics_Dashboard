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

$o1_response = "";
$o2_response = "";
$o3_resonese = "";

if (isset($_POST['util-1-submit'])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $o1_response = filter_input(INPUT_POST, "util_option1_response");
    $o2_response = filter_input(INPUT_POST, "util_option2_response");
    $o3_response = filter_input(INPUT_POST, "util_option3_response");
  }


  $sql = "UPDATE util SET o1_response= ?, o2_response= ?, o3_response = ? WHERE caseID= ?";
  $save_sql = $db_connection->prepare($sql);
  $save_sql->bind_param("sssi", $o1_response, $o2_response, $o3_response, $caseID);
  $save_sql->execute();


  if ($save_sql === TRUE) {
    // $sql = "UPDATE cases SET summary='$summary', role='$role', dilemmas='$dilemmas' WHERE caseID='$caseID'";
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
<!--home.html may be renamed to dashboard, and dashboard.html renamed to home-->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="//code.jquery.com/jquery.min.js"></script>
  <link rel="stylesheet" href="style.css" />
  <title>Ethics Dashboard</title>
  <script>
    var opt_counter = "";
    // var op1 = "";
    //  op1 = localStorage.getItem("title1");
    // document.getElementById("option1-title").textContent = op1;

    var hook = true;
    window.onbeforeunload = function() {
      if (hook) {
        return "Did you save your stuff?";
      }
    };

    function unhook() {
      hook = false;
    }

    $(document).ready(function() {
      opt_counter = localStorage.getItem("options_counter");
      admin_counter = localStorage.getItem("admin_counter");
      ta_counter = localStorage.getItem("ta_counter");

      if (admin_counter < 1 && ta_counter < 1) {
        document.getElementById("util-options-fb-btn").innerText = "View the comments";
      }


      if (ta_counter >= 1) {
        document.getElementById("util_option1_response").disabled = true;
        document.getElementById("util_option2_response").disabled = true;
        document.getElementById("util_option3_response").disabled = true;
      }
      $(".dropdown").hover(function() {
        var dropdownMenu = $(this).children(".dropdown-menu");
        if (dropdownMenu.is(":visible")) {
          dropdownMenu.parent().toggleClass("open");
        }
      });
    });

    function sendOptionsCounter() {
      localStorage.setItem("options_counter", opt_counter);
    }
  </script>
</head>

<body onload="loadOptions();">
  <!-- Load Header -->
  <div id="header">
    <script>
      $(function() {
        $("#header").load("header.php");
      });
    </script>
  </div>
  <form action="utilitarianism.php" method="POST">
    <div class="container-fluid">
      <div class="row pb-3">
        <div class="col-lg">
          <div class="card">
            <div class="card-body">
              <h5>
                Utilitarianism is a consequentialist theory - meaning that the
                moral worth of an action is determined by the consequences of
                the action. The first step is to consider the consequences, both
                short-term and long-term, for the options you've identified.
              </h5>
            </div>
          </div>
        </div>
      </div>
      <div class="row pb-3">
        <div class="col-lg">
          <div class="card">
            <div class="card-body">
              <div class="row p-2">
                <div class="col-lg p-2">
                  <h4 class="pb-2">
                    Option 1 -

                    <span class="option1-title" id="option1-title" style="color: grey">Option 1 displays here</span>
                  </h4>
                  <textarea name="util_option1_response" id="util_option1_response" cols="10" rows="7" placeholder="Short term – personal guilt but I keep my job – the consumers are betrayed – the environment is damaged

  Long term - If the device is discovered I will likely lose my job and possibly my career – VW’s reputation, and business, will be damaged"></textarea>
                </div>
              </div>
              <br />
              <div class="row p-2">
                <div class="col-lg p-2">
                  <h4 class="pb-2">
                    Option 2 -
                    <span class="option2-title" id="option2-title" style="color: grey">Option 2 displays here</span>
                  </h4>
                  <textarea name="util_option2_response" id="util_option2_response" cols="10" rows="7" placeholder="Short term – I will have done the right thing, but I will likely lose my job and possibly my career. The device will not be built and that will have a negative impact on VW’s ability to produce certain types of vehicles.
                      
  Long term – I will feel good knowing that I did the right thing – consumers will not be betrayed – the environment is protected"></textarea>
                </div>
              </div>
              <br />
              <div class="row p-2" id="option3">
                <div class="col-lg p-2">
                  <h4 class="pb-2">
                    Option 3 -
                    <span class="option3-title" id="option3-title" style="color: grey">Option 3 displays here</span>
                  </h4>
                  <textarea name="util_option3_response" id="util_option3_response" cols="10" rows="7" placeholder="Short term – I will have done the right thing, but I will likely lose my job and possibly my career. The device will not be built and that will have a negative impact on VW’s ability to produce certain types of vehicles.
                      
  Long term – I will feel good knowing that I did the right thing – consumers will not be betrayed – the environment is protected"></textarea>
                </div>
              </div>

              <div class="row ms-1 justify-content-center">
                &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
                <!-- Button trigger modal -->
                <button type="button" class="stakeholders-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" id="util-options-fb-btn" name="util-options-fb-btn" style="margin-left:10px; margin-top:15px; background-color: blue;">
                  Leave a comment
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <textarea rows="15" cols="10" id="util-options-fb" name="util-options-fb">
            </textarea>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                          Close
                        </button>
                        <button type="button" class="btn btn-primary" id="save-util-options-fb" name="save-util-options-fb">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div>
                <input type="submit" value="Save" id="util-1-submit" name="util-1-submit" class="stakeholders-btn ms-2 mt-3" onclick="sendOptionsCounter();unhook()" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <br />
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="#" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>

      <li class="page-item active">
        <a class="page-link" href="utilitarianism.php">Options</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="utilitarianism-2.php">Stakeholders</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="utilitarianism-3.php">Option-1</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="utilitarianism-4.php">Option-2</a>
      </li>
      <li class="page-item" id="pag-option-3">
        <a class="page-link" href="utilitarianism-3rd-option.php">Option-3</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="utilitarianism-5.php">Conclusion</a>
      </li>

      <li class="page-item">
        <a class="page-link" href="utilitarianism-2.php" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script>
    var stuID = <?php echo json_encode($stuID); ?>;
    var caseID = <?php echo json_encode($caseID); ?>;

    function loadOptions() {
      //alert("working");
      $.ajax({
        type: "POST",
        url: 'Scripts/get_util.php',
        data: {
          "caseID": caseID
        },
        dataType: 'json',
        cache: false,
        success: function(data) {
          var o1_name = data[0];
          var o2_name = data[1];
          var o3_name = data[2];
          var o1_response = data[3];
          var o2_response = data[4];
          var o3_response = data[5];
          document.getElementById('option1-title').innerHTML = o1_name;
          document.getElementById('util_option1_response').innerHTML = o1_response;
          document.getElementById('option2-title').innerHTML = o2_name;
          document.getElementById('util_option2_response').innerHTML = o2_response;
          document.getElementById('option3-title').innerHTML = o3_name;
          document.getElementById('util_option3_response').innerHTML = o3_response;
        },
        error: function(xhr, status, error) {
          console.error(xhr);
        }
      });
    }
  </script>
</body>

</html>