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
  
    $s1_defense = "";
    $s2_defense = "";
    $s3_defense = "";
    $s1_slider = "";
    $s2_slider = "";
    $s3_slider = "";
  
    if (isset($_POST['util-2-submit'])) {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $s1_defense = filter_input(INPUT_POST, "stakeholder-1");
        $s2_defense = filter_input(INPUT_POST, "stakeholder-2");
        $s3_defense = filter_input(INPUT_POST, "stakeholder-3");
        $s1_slider = filter_input(INPUT_POST, "stakeholder1");
        $s2_slider = filter_input(INPUT_POST, "stakeholder2");
        $s3_slider = filter_input(INPUT_POST, "stakeholder3");
      }
  
      
      $sql = "UPDATE util SET s1_defense= ?, s2_defense= ?, s3_defense= ?, s1_slider= ?, s2_slider= ?, s3_slider= ? WHERE caseID= ?";
      $save_sql = $db_connection->prepare($sql);
      $save_sql->bind_param("sssiiii", $s1_defense, $s2_defense, $s3_defense, $s1_slider, $s2_slider, $s3_slider, $caseID);
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
    <title>Ethics Dashboard</title>

    <script>
    
      var hook = true;
      window.onbeforeunload = function () {
        if (hook) {
          return "Did you save your stuff?";
        }
      };
      function unhook() {
        hook = false;
      }
    /*
      var st1 = "";
      var st2 = "";
      var st3 = "";
      var st4 = "";
      var st5 = "";
      var st6 = "";

      var send1 = "";
      var send2 = "";
      var send3 = "";
      var send4 = "";
      var send5 = "";
      var send6 = "";

      var sendCounter = 0;
*/

      var counter = 3;      
      var opt_counter = "";
      var st_counter = "";

      $(document).ready(function () {
       st_counter = localStorage.getItem("stakeholders_counter");
      opt_counter = localStorage.getItem("options_counter");
      ta_counter = localStorage.getItem("ta_counter");
        if(ta_counter >=1)
        {
          document.getElementById("stakeholder-1").disabled = true;
     document.getElementById("stakeholder-2").disabled = true;
      document.getElementById("stakeholder-3").disabled = true;
      document.getElementById("stakeholder-4").disabled = true;
      document.getElementById("stakeholder-5").disabled = true;
      document.getElementById("stakeholder-6").disabled = true;

      document.getElementById("stakeholder1").disabled = true;
      document.getElementById("stakeholder2").disabled = true;
      document.getElementById("stakeholder3").disabled = true;
      document.getElementById("stakeholder4").disabled = true;
      document.getElementById("stakeholder5").disabled = true;
      document.getElementById("stakeholder6").disabled = true;   
    
    }

  if (opt_counter < 3) {
  document.getElementById("pag-option-3").style.display = "none";
}
       if (st_counter < 4) {     
          document.getElementById("stakeholder-4-div").style.display = "none";   
          document.getElementById("stakeholder-5-div").style.display = "none";
          document.getElementById("stakeholder-6-div").style.display = "none";        
        }
        else
        if(st_counter < 5){
          document.getElementById("stakeholder-5-div").style.display = "none";
          document.getElementById("stakeholder-6-div").style.display = "none";       
        }
        else
        if(st_counter < 6)
        {
          document.getElementById("stakeholder-6-div").style.display = "none";
        }

        $(".dropdown").hover(function () {
        var dropdownMenu = $(this).children(".dropdown-menu");
        if (dropdownMenu.is(":visible")) {
          dropdownMenu.parent().toggleClass("open");
        }
      });
    });
     /*   
       opt_counter = localStorage.getItem("opt_counter");
        if (opt_counter < 3) {
          document.getElementById("util-3rd-option").style.display = "none";   
        }
      
      function getStakeholder1Title() {
        st1 = document.getElementById("stakeholder-1").value;
      }
      function getStakeholder2Title() {
        st2 = document.getElementById("stakeholder-2").value;
      }
      function getStakeholder3Title() {
        st3 = document.getElementById("stakeholder-3").value;
      }
      function getStakeholderTitle() {
        st4 = document.getElementById("stakeholder-4").value;
        st5 = document.getElementById("stakeholder-5").value;
        st6 = document.getElementById("stakeholder-6").value;
      }
     
      function sendStakeholders()
      {
        send1 = st1;
        send2 = st2;
        send3 = st3;
        send4 = st4;
        send5 = st5;
        send6 = st6;
        sendCounter = counter;

        localStorage.setItem("stake-1-value", send1);
        localStorage.setItem("stake-2-value", send2);
        localStorage.setItem("stake-3-value", send3);
        localStorage.setItem("stake-4-value", send4);
        localStorage.setItem("stake-5-value", send5);
        localStorage.setItem("stake-6-value", send6);
        localStorage.setItem("counter-val",sendCounter);

        
      }

      function sendStakeholders2()
      {
        send1 = st1;
        send2 = st2;
        send3 = st3;
        send4 = st4;
        send5 = st5;
        send6 = st6;

        localStorage.setItem("stake-1-value", send1);
        localStorage.setItem("stake-2-value", send2);
        localStorage.setItem("stake-3-value", send3);
        localStorage.setItem("stake-4-value", send4);
        localStorage.setItem("stake-5-value", send5);
        localStorage.setItem("stake-6-value", send6);
        localStorage.setItem("counter-val",sendCounter);

        
      }

      
      function sendStakeholders3()
      {
        send1 = st1;
        send2 = st2;
        send3 = st3;
        send4 = st4;
        send5 = st5;
        send6 = st6;

        localStorage.setItem("stake-1-value", send1);
        localStorage.setItem("stake-2-value", send2);
        localStorage.setItem("stake-3-value", send3);
        localStorage.setItem("stake-4-value", send4);
        localStorage.setItem("stake-5-value", send5);
        localStorage.setItem("stake-6-value", send6);
        localStorage.setItem("counter-val",sendCounter);

        
      }
*/
      function sendStakeholdersCounter()
      {
        localStorage.setItem("stakeholders_counter", st_counter);
      }
    </script>
  </head>
  <body onload="loadStakeholders();">
    <!-- Load Header -->
    <div id="header">
      <script>
        $(function () {
          $("#header").load("header.php");
        });
      </script>
    </div>
    <form action="utilitarianism-2.php" method="POST">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <p style="font-size: 18px">
            <h5 class="pb-2">
                Stakeholders are persons or groups that will be impacted by the
                decision/action taken. List the stakeholders and what they want in
                the simplest terms – wealth, social status, etc. Note: It’s good
                to start with the decision-maker as the first stakeholder and then
                work out from there.
            </h5>
            </p>
            <hr />
            <div class="row p-2">
              <div class="col-lg p-2">
                <h4 class="pb-2">STAKEHOLDER 1 - 
                <span 
                    class="stakeholder1-title" 
                    style="color: grey"
                    id="s1-title"
                        >Stakeholder 1 displays here</span
                      >
                </h4>
                <textarea
                  name="stakeholder-1"
                  id="stakeholder-1"
                  cols="10"
                  rows="7"
                  placeholder="The engineer is directly , and significantly impacted by the issue."
                  class="stakeholder-input"
              
                ></textarea>
              </div>
            </div>

            <label for="stakeholder1" class="form-label stakeholder-input">Importance:</label>
            <input type="range" min="1" max="100" value="50" name="stakeholder1" class="form-range"  id="stakeholder1"  />
            <br><br>



            <div class="row p-2">
              <div class="col-lg p-2">
                <h4 class="pb-2">STAKEHOLDER 2- 
                  <span 
                    class="stakeholder2-title" 
                    style="color: grey"
                    id="s2-title"
                        >Stakeholder 2 displays here</span
                      ></h4>
                <textarea
                  name="stakeholder-2"
                  id="stakeholder-2"
                  cols="10"
                  rows="7"
                  placeholder="Defend the inclusion of Stakeholder 2 "
                  class="stakeholder-input"
              
                ></textarea>
              </div>
            </div>

            <label for="stakeholder2" class="form-label stakeholder-input">Importance:</label>

            <input type="range" min="1" max="100" value="50" name="stakeholder2" class="form-range" id="stakeholder2" />

        <br><br>
            <div class="row p-2">
              <div class="col-lg p-2">
                <h4 class="pb-2">STAKEHOLDER 3- 
                <span 
                    class="stakeholder3-title" 
                    style="color: grey"
                    id="s3-title"
                        >Stakeholder 3 displays here</span
                      ></h4>
                <textarea
                  name="stakeholder-3"
                  id="stakeholder-3"
                  cols="10"
                  rows="7"
                  placeholder="Defend the inclusion of Stakeholder 3"
                  class="stakeholder-input"
                  
                ></textarea>        
              </div>
            </div>

            <label for="stakeholder3" class="form-label stakeholder-input">Importance:</label>
            <input type="range" min="1" max="100" value="50" name="stakeholder3" class="form-range" id="stakeholder3" />
            <br><br>

            <div class="row p-2" id="stakeholder-4-div">
              <div class="col-lg p-2">
                <h4 class="pb-2">STAKEHOLDER 4- 
                  <span class="stakeholder4-title" style="color: grey"
                        >Stakeholder 4 displays here</span
                      ></h4>
                <textarea
                  name="stakeholder-4"
                  id="stakeholder-4"
                  cols="10"
                  rows="7"
                  placeholder="Defend the inclusion of Stakeholder 4"
                  class="stakeholder-input"
                    
                ></textarea>        
              </div>
          

            <label for="stakeholder4" class="form-label stakeholder-input" id="stakeholder4-lbl">Importance:</label>
            <input type="range" class="form-range" id="stakeholder4" />
          </div>
            <br><br>
          
            <div class="row p-2" id="stakeholder-5-div">
              <div class="col-lg p-2">
                <h4 class="pb-2">STAKEHOLDER 5- 
                  <span class="stakeholder5-title" style="color: grey"
                        >Stakeholder 5 displays here</span
                      ></h4>
                <textarea
                  name="stakeholder-5"
                  id="stakeholder-5"
                  cols="10"
                  rows="7"
                  placeholder="Defend the inclusion of Stakeholder 5"
                  class="stakeholder-input"
                    
                ></textarea>        
              </div>
          
            <label for="stakeholder5" class="form-label stakeholder-input" id="stakeholder5-lbl">Importance:</label>
            <input type="range" class="form-range" id="stakeholder5" />
          </div>

            <br><br>

            <div class="row p-2" id="stakeholder-6-div">
              <div class="col-lg p-2">
                <h4 class="pb-2">STAKEHOLDER 6- 
                  <span class="stakeholder6-title" style="color: grey"
                        >Stakeholder 6 displays here</span
                      ></h4>
                <textarea
                  name="stakeholder-6"
                  id="stakeholder-6"
                  cols="10"
                  rows="7"
                  placeholder="Defend the inclusion of Stakeholder 6"
                  class="stakeholder-input"
                    
                ></textarea>        
              </div>
          

            <label for="stakeholder6" class="form-label stakeholder-input" id="stakeholder6-lbl">Importance:</label>
            <input type="range" class="form-range" id="stakeholder6" />
              </div>
          
              <div class="row ms-1 justify-content-center">
              <input
                type="submit"
                value="Save"
                id="util-2-submit"
                name="util-2-submit"
                class="stakeholders-btn ms-2 mt-3"
                onclick="sendStakeholdersCounter();unhook()"
              />
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
          <a class="page-link" href="utilitarianism.php" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>

        <li class="page-item ">
          <a class="page-link" href="utilitarianism.php">Options</a>
        </li>
        <li class="page-item active">
          <a class="page-link" href="utilitarianism-2.php">Stakeholders</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="utilitarianism-3.php">Option-1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="utilitarianism-4.php">Option-2</a>
        </li>
        <li class="page-item" id="pag-option-3">
          <a class="page-link" href="utilitarianism-3rd-option.html"
            >Option-3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="utilitarianism-5.php">Conclusion</a>
        </li>

        <li class="page-item">
          <a class="page-link" href="utilitarianism-3.php" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
      </ul>
    </nav>

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
      function loadStakeholders() {
        //alert("working");
        $.ajax({
          type: "POST",
          url: 'Scripts/get_util2.php',
          data: {
            "caseID": caseID
          },
          dataType: 'json',
          cache: false,
          success: function(data){
            var s1_name = data[0];
            var s2_name = data[1];
            var s3_name = data[2];
            var s1_response = data[3];
            var s2_response = data[4];
            var s3_response = data[5];
            var s1_slider = data[6];
            var s2_slider = data[7];
            var s3_slider = data[8];

            document.getElementById('s1-title').innerHTML = s1_name;
            document.getElementById('stakeholder-1').innerHTML = s1_response;
            document.getElementById('s2-title').innerHTML = s2_name;
            document.getElementById('stakeholder-2').innerHTML = s2_response;
            document.getElementById('s3-title').innerHTML = s3_name;
            document.getElementById('stakeholder-3').innerHTML = s3_response;
            document.getElementById("stakeholder1").value = s1_slider;
            document.getElementById("stakeholder2").value = s2_slider;
            document.getElementById("stakeholder3").value = s3_slider;
          },
          error: function(xhr, status, error){
          console.error(xhr);
          }
          });
      }
    </script>
  </body>
</html>