<?php
  error_reporting(-1);
  ini_set('display_errors', 'On');
  session_start();

  if(empty($_SESSION['caseID']) || $_SESSION['caseID'] == ''){
    header("Location: Login/login.html");
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


    $sql = "UPDATE cases SET summary= ?, role= ?, dilemmas= ? WHERE caseID= ?";
    $save_sql = $db_connection->prepare($sql);
    $save_sql->bind_param("sssi", $summary, $role, $dilemmas, $caseID);
    $save_sql->execute();
    
    if ($db_connection->query($sql) === TRUE) {
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css" />
    <title>Ethics Dashboard</title>
    <script>
        var op_count ,st_counter = "";
      op_count = localStorage.getItem("options_counter");
      st_counter = localStorage.getItem("stakeholders_counter");
      var admin_counter = 0;

           function nextPage() {
        window.location.href = "utilitarianism.php";
      }
 
    function sendOptionsCounter()
    {
      localStorage.setItem("options_counter", op_count);
    }

    function sendStakeholdersCounter()
    {
      localStorage.setItem("stakeholders_counter",  st_counter);
    }
      var hook = true;
      window.onbeforeunload = function () {
        if (hook) {
          return "Did you save your stuff?";
        }
      };
      function unhook() {
        hook = false;
      }
    
      $(document).ready(function () {
        //admin_counter verifies if the logged in user is admin or not
        admin_counter = localStorage.getItem("admin_counter");
        ta_counter = localStorage.getItem("ta_counter");
     if(admin_counter < 1 && ta_counter < 1)
     {
       //Buttons for the feedback popups
document.getElementById("options-fb-btn").innerText = "View the comments";
document.getElementById("stakeholders-fb-btn").innerText = "View the comments";
document.getElementById("dilemmas-fb-btn").innerText = "View the comments";
document.getElementById("role-fb-btn").innerText = "View the comments";
document.getElementById("summary-fb-btn").innerText = "View the comments";

//save buttons for all the feedbacks
document.getElementById("save-role-fb").style.display = "none";
document.getElementById("save-summary-fb").style.display = "none";
document.getElementById("save-stakeholders-fb").style.display = "none";
document.getElementById("save-options-fb").style.display = "none";
document.getElementById("save-dilemmas-fb").style.display = "none";
     }
     else
     if(ta_counter >= 1)
     {
       document.getElementById("case-summary").disabled = true;
       document.getElementById("role").disabled = true;
       document.getElementById("dilemmas").disabled = true;
       document.getElementById("options-btn").innerText = "View the options";
       document.getElementById("stakeholders-btn").innerText = "View the stakeholders";


     }
        $(".dropdown").hover(function () {
          var dropdownMenu = $(this).children(".dropdown-menu");
          if (dropdownMenu.is(":visible")) {
            dropdownMenu.parent().toggleClass("open");
          }
        });

      });

   
    </script>
    <style>
      
      </style>
  </head>
  <body onload="loadDash();">
    <!-- Load Header -->
    <div id="header">
      <script>
        $(function () {
          $("#header").load("header.php");
        });
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
                   <!-- Button trigger modal -->
                <button
      type="button"
      class="btn btn-primary"
      data-bs-toggle="modal"
      data-bs-target="#exampleModal"
      id = "summary-fb-btn"
      name = "summary-fb-btn"
    >
    Leave a comment
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <textarea rows="15" cols="10" id="summary-fb" name="summary-fb">
            </textarea>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary" id="save-summary-fb">Save changes</button>
          </div>
        </div>
      </div>
    </div>
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
                       <!-- Button trigger modal -->
                       <button
      type="button"
      class="btn btn-primary"
      data-bs-toggle="modal"
      data-bs-target="#exampleModal"
      id = "role-fb-btn"
      name = "role-fb-btn"
    >
    Leave a comment
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <textarea rows="15" cols="10" id="role-fb" name="role-fb">
            </textarea>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary" id="save-role-fb">Save changes</button>
          </div>
        </div>
      </div>
    </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row pb-3">
          <div class="col-lg pb-3">
            <div class="card">
              <div class="card-body">
                <h3 class="pb-2">Step 3 - Indentify the Dilemmas</h3>
                <textarea
                  name="dilemmas"
                  id="dilemmas"
                  cols="30"
                  rows="13"
                  placeholder="What are the ethical dilemmas you are facing? Describe the dilemmas in ethical terms, eg. Honesty, deception, loyalty, betrayal, beneficence, malfeasance, autonmy, paternalism, confidentiality, transparency, integrity, etc..."
                
                ></textarea>
                       <!-- Button trigger modal -->
                       <button
      type="button"
      class="btn btn-primary"
      data-bs-toggle="modal"
      data-bs-target="#exampleModal"
       id = "dilemmas-fb-btn"
       name = "dilemmas-fb-btn"
    >
    Leave a comment
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <textarea rows="15" cols="10" id="dilemmas-fb" name="dilemmas-fb">
            </textarea>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary" id="save-dilemmas-fb">Save changes</button>
          </div>
        </div>
      </div>
    </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg pb-3">
            <div class="card h-100">
              <div class="card-body">
                <h3 class="pb-2">Step 4 -Indentify Your Options</h3>
       <!-- Button trigger modal -->
       <button
      type="button"
      class="btn btn-primary"
      data-bs-toggle="modal"
      data-bs-target="#exampleModal"
      style="position: absolute; bottom: 8px; left: 8px"
       id = "options-fb-btn"
       name = "options-fb-btn"
    >
    Leave a comment
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <textarea rows="15" cols="10" id="options-fb" name="options-fb">
            </textarea>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary" id="save-options-fb">Save changes</button>
          </div>
        </div>
      </div>
    </div>                
                <a
                  href="options.php"
                  class="btn btn-dark"
                  role="button"
                  style="position: absolute; bottom: 8px; right: 8px"
                  id="options-btn"
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
                  <!-- Button trigger modal -->
       <button
      type="button"
      class="btn btn-primary"
      data-bs-toggle="modal"
      data-bs-target="#exampleModal"
      style="position: absolute; bottom: 8px; left: 8px"
      id = "stakeholders-fb-btn"
      name = "stakeholders-fb-btn"
    >
    Leave a comment
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <textarea rows="15" cols="10" id="stakeholders-fb" name="stakeholders-fb">
            </textarea>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary" id="save-stakeholders-fb">Save changes</button>
          </div>
        </div>
      </div>
    </div>             
                <a
                  href="stakeholders.php"
                  class="btn btn-dark"
                  role="button"
                  style="position: absolute; bottom: 8px; right: 8px"
                  id="stakeholders-btn"
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
        value="Save"
        style="margin-bottom: 30px"
        onclick="unhook()"
      />

      <input
        class="btn btn-dark justify-content-center"
        type="button"
        name="go-util"
        value="Go to Utilitarianism"
        style=" margin-bottom: 30px"
        onclick = "sendOptionsCounter();sendStakeholdersCounter();nextPage()"
      />
      </center>
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
    <script>
      var stuID = <?php echo json_encode($stuID);?>;
      var caseID = <?php echo json_encode($caseID);?>;
      function loadDash(){
        //alert("working");
        $.ajax({
          type: "POST",
          url: 'Scripts/load_dash.php',
          data: {
            "caseID": caseID
          },
          dataType: 'json',
          cache: false,
          success: function(data){
            var summary = data[0];
            var role = data[1];
            var dilemmas = data[2];
            //alert(summary + role + dilemmas);
            document.getElementById('case-summary').innerHTML = summary;
            document.getElementById('role').innerHTML = role;
            document.getElementById('dilemmas').innerHTML = dilemmas;
          },
          error: function(xhr, status, error){
          console.error(xhr);
          }
          });
      }
    </script>
  </body>
</html>
