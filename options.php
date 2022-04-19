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
  
    $option1 = "";
    $option2 = "";
    //$option3 = "";
  
    if (isset($_POST['save'])) {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $option1 = filter_input(INPUT_POST, "option1");
        $option2 = filter_input(INPUT_POST, "option2");
        $option3 = filter_input(INPUT_POST, "option3");
      }
  
  
      $sql = "UPDATE cases SET option1= ?, option2= ? WHERE caseID= ?";
      $save_sql = $db_connection->prepare($sql);
      $save_sql->bind_param("ssi", $option1, $option2, $caseID);
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
    <title>Ethics Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
      var opt_counter = 2;
    //  opt_counter = localStorage.getItem("opt_counter");
      function goBack() {
        window.location.href = "/EBoard/dashboard.php";
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
     /* function add_field(el) {
        var total_text = document.getElementsByClassName("input_text");
        if (el.value === "Add another option") {
          opt_counter++;
          el.value = "Remove option";
          document.getElementById("field_div").innerHTML =
            "<br><h4 class='pb-2'>OPTION 3</h4><textarea cols='14' rows='9' name = 'option3' id = 'option3' placeholder='Enter your option here' onchange='getOptions3Title()'></textarea>";
        } else {
          opt_counter--;
          document.getElementById("field_div").innerHTML = "";
          el.value = "Add another option";
        }
      }*/

      var title1 = "";
      var title2 = "";
      var title3 = "";

      function getOptions1Title() {
        title1 = document.getElementById("option1").value;
      }

      function getOptions2Title() {
        title2 = document.getElementById("option2").value;
      }

      function getOptions3Title() {
        title3 = document.getElementById("option3").value;
      }

 function incCounter()
 {
opt_counter++;
 }
      function sendOptions() {
        window.alert(opt_counter);
        localStorage.setItem("options_counter", opt_counter);
      }
    </script>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body onload="loadOptions();">
    <!-- Load Header -->
    <div id="header">
      <script>
        $(function () {
          $("#header").load("header.php");
        });
      </script>
    </div>
    <form action="options.php" method="POST">
        <div class="container-fluid">
          <div class="row p-2">
            <div class="col-lg p-2">
              <div class="card">
                <div class="card-body">
                  <h3 class="pb-2"></h3>
                  <p style="font-size: 20px">
                    <b>
                      Describe the ethical issue or dilemma you would like to
                      analyze. Remember ethical values are things that are important
                      because they are right or wrong - lying, courage,loyalty,
                      theft, etc.</b
                    >
                  </p>
                </div>
              </div>
              <br /><br />
              <div class="row p-2">
                <div class="col-lg p-2">
                  <div class="card">
                    <div class="card-body">
                      <h3 class="pb-2">Case Summary</h3>
                      <textarea
                        disabled
                        name="ethical"
                        id="ethical"
                        cols="15"
                        rows="14"
                        placeholder="I am the engineer who is asked to create the VW defeat device. It will make it possible for vehicles to pass emissions tests designed to protect the environment. I’m not  sure I should do it because it seems wrong to cheat."
                      ></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="card">
                <div class="card-body" style="height: 675px; overflow-y: auto">
                  <h4 class="pb-2">OPTION 1</h4>
                  <textarea
                    name="option1"
                    id="option1"
                    cols="14"
                    rows="9"
                    placeholder="I can put loyalty to the company above my personal concerns and do my job – create the device."
                    onchange="getOptions1Title()"
                  ></textarea>
                  <br /><br />
                  <h4 class="pb-2">OPTION 2</h4>
                  <textarea
                    name="option2"
                    id="option2"
                    cols="14"
                    rows="9"
                    placeholder="I can betray the company, go to the press and blow the whistle."
                    onchange="getOptions2Title()"
                  ></textarea>
                  <br /><br />
                  <h4 class="pb-2">OPTION 3</h4>
                  <textarea
                    name="option3"
                    id="option3"
                    cols="14"
                    rows="9"
                    placeholder="Enter your option here"
                    onchange="getOptions3Title();incCounter()"
                  ></textarea>
                  <br /><br />
                 <!-- <div id="field_div"></div> -->

                  <br />
                  <div class="button-wrapper">
              
                    <input
                      type="submit"
                      name="save"
                      value="Submit"
                      class="options-btn ms-1"
                      onclick="sendOptions();unhook()"
                    />
                    <input
                      type="button"
                      value="Go back"
                      onclick="goBack()"
                      class="options-btn ms-1"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
      function loadOptions(){
        
        //alert("working");
        $.ajax({
          type: "POST",
          url: 'Scripts/get_options.php',
          data: {
            "caseID": caseID
          },
          dataType: 'json',
          cache: false,
          success: function(data){
            var option1 = data[0];
            var option2 = data[1];
            //var option3 = data[2];
            //alert(summary + role + dilemmas);
            document.getElementById('option1').innerHTML = option1;
            document.getElementById('option2').innerHTML = option2;
            //document.getElementById('option3').innerHTML = option3;
          },
          error: function(xhr, status, error){
          console.error(xhr);
          }
          });
        }
    </script>
  </body>
</html>

