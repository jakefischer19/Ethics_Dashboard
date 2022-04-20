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
    $db_connection->close();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <title>Ethics Dashboard</title>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script>
      var i1,
        i2,
        i3,
        i4,
        i5,
        i6,
        i = 0,
        per = 0,
        countVal = 0;
var  admin_counter = 0;
        $(document).ready(function () {
          admin_counter = localStorage.getItem("admin_counter");
          ta_counter = localStorage.getItem("ta_counter");
          if(admin_counter < 1 && ta_counter < 1)
     {
         
          //student can see the grade , but can't edit it
     document.getElementById("text-1").disabled = true;
     document.getElementById("text-2").disabled = true;
     document.getElementById("text-3").disabled = true;
     document.getElementById("text-4").disabled = true;
     document.getElementById("text-5").disabled = true;
     document.getElementById("text-6").disabled = true;
     //student can see the comment , but can't edit it
     document.getElementById("progress-1").disabled = true;
     document.getElementById("progress-2").disabled = true;
     document.getElementById("progress-3").disabled = true;
     document.getElementById("progress-4").disabled = true;
     document.getElementById("progress-5").disabled = true;
     document.getElementById("progress-6").disabled = true;

     document.getElementById("grades-save").style.display = "none";
     }  
    });

      function assignValue() {
        i1 = document.getElementById("text-1").value;
        i = +i + +i1;
        per = (+i / +80) * 100;
        document.getElementById("myText").innerHTML = i;
        document.getElementById("percentage").innerHTML = per.toFixed(2) + "%";
        document.getElementById("issue").innerHTML = i1;
      }

      function assignValue2() {
        i2 = document.getElementById("text-2").value;
        i = +i + +i2;
        per = (+i / +80) * 100;
        document.getElementById("myText").innerHTML = i;
        document.getElementById("percentage").innerHTML = per.toFixed(2) + "%";
        document.getElementById("deontology").innerHTML = i2;
      }

      function assignValue3() {
        i3 = document.getElementById("text-3").value;
        i = +i + +i3;
        per = (+i / +80) * 100;
        document.getElementById("myText").innerHTML = i;
        document.getElementById("percentage").innerHTML = per.toFixed(2) + "%";
        document.getElementById("stakeholder").innerHTML = i3;
      }

      function assignValue4() {
        i4 = document.getElementById("text-4").value;
        i = +i + +i4;
        per = (+i / +80) * 100;
        document.getElementById("myText").innerHTML = i;
        document.getElementById("percentage").innerHTML = per.toFixed(2) + "%";
        document.getElementById("utilitarianism").innerHTML = i4;
      }

      function assignValue5() {
        i5 = document.getElementById("text-5").value;
        i = +i + +i5;
        per = (+i / +80) * 100;
        document.getElementById("myText").innerHTML = i;
        document.getElementById("percentage").innerHTML = per.toFixed(2) + "%";
        document.getElementById("virtue").innerHTML = i5;
      }

      function assignValue6() {
        i6 = document.getElementById("text-6").value;
        i = +i + +i6;
        per = (+i / +80) * 100;
        document.getElementById("myText").innerHTML = i;
        document.getElementById("percentage").innerHTML = per.toFixed(2) + "%";
        document.getElementById("care").innerHTML = i6;
      }

      function valueChange() {
        i = 0;
        i1 = 0;
        document.getElementById("myText").innerHTML = "";
        document.getElementById("percentage").innerHTML = "";
        document.getElementById("issue").innerHTML = "";
      }

      function valueChange2() {
        i = 0;
        i2 = 0;
        document.getElementById("myText").innerHTML = "";
        document.getElementById("percentage").innerHTML = "";
        document.getElementById("deontology").innerHTML = "";
      }

      function valueChange3() {
        i = 0;
        i3 = 0;
        document.getElementById("myText").innerHTML = "";
        document.getElementById("percentage").innerHTML = "";
        document.getElementById("stakeholder").innerHTML = "";
      }

      function valueChange4() {
        i = 0;
        i4 = 0;
        document.getElementById("myText").innerHTML = "";
        document.getElementById("percentage").innerHTML = "";
        document.getElementById("utilitarianism").innerHTML = "";
      }

      function valueChange5() {
        i = 0;
        i5 = 0;
        document.getElementById("myText").innerHTML = "";
        document.getElementById("percentage").innerHTML = "";
        document.getElementById("virtue").innerHTML = "";
      }

      function valueChange6() {
        i = 0;
        i6 = 0;
        document.getElementById("myText").innerHTML = "";
        document.getElementById("percentage").innerHTML = "";
        document.getElementById("care").innerHTML = "";
      }

      function minmax(value, min, max) {
        if (parseInt(value) < 0 || isNaN(value)) return 0;
        else if (parseInt(value) > 10) return 10;
        else return value;
      }

      function minmax2(value, min, max) {
        if (parseInt(value) < 0 || isNaN(value)) return 0;
        else if (parseInt(value) > 15) return 15;
        else return value;
      }
    </script>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!-- Load Header -->
    <div id="header">
      <script>
        $(function () {
          $("#header").load("header.php");
        });
      </script>
    </div>

    <div class="container-fluid">
      <center><h3 class="pb-2">MY PROGRESS</h3></center>
      <br />
      <div class="card">
        <div class="card-body">
          <div class="form">
            <div class="row p-2">
              <div class="col-lg p-2">
                <div class="textarea-container">
                  <h4 class="pb-2">
                    ETHICAL ISSUE & OPTIONS
                    <input
                      type="number"
                      class="text-1"
                      id="text-1"
                      placeholder="/10"
                      min="0"
                      max="10"
                      maxlength="2"
                      onchange="valueChange()"
                      required
                      onkeyup="this.value = minmax(this.value, 0, 10)"
                    />
                  </h4>
                  <textarea
                    name="progress-1"
                    id="progress-1"
                    cols="10"
                    rows="7"
                    placeholder="Comments Summary: This summary lists all comments posted in-text by the marker"
                  ></textarea>
                </div>
              </div>
              <div class="col-lg p-2">
                <div class="textarea-container">
                  <h4 class="pb-2">
                    DEONTOLOGY
                    <input
                      type="number"
                      class="text-1"
                      id="text-2"
                      placeholder="/15"
                      min="0"
                      max="15"
                      onchange="valueChange2()"
                      maxlength="2"
                      required
                      onkeyup="this.value = minmax2(this.value, 0, 15)"
                    />
                  </h4>
                  <textarea
                    name="progress-2"
                    id="progress-2"
                    cols="10"
                    rows="7"
                    placeholder="Comments Summary: This summary lists all comments posted in-text by the marker"
                  ></textarea>
                </div>
              </div>
            </div>

            <div class="row p-2">
              <div class="col-lg p-2">
                <div class="textarea-container">
                  <h4 class="pb-2">
                    STAKEHOLDERS
                    <input
                      type="number"
                      class="text-1"
                      id="text-3"
                      placeholder="/10"
                      min="0"
                      max="10"
                      onchange="valueChange3()"
                      maxlength="2"
                      required
                      onkeyup="this.value = minmax(this.value, 0, 10)"
                    />
                  </h4>
                  <textarea
                    name="progress-3"
                    id="progress-3"
                    cols="10"
                    rows="7"
                    placeholder="Comments Summary: This summary lists all comments posted in-text by the marker"
                  ></textarea>
                </div>
              </div>
              <div class="col-lg p-2">
                <div class="textarea-container">
                  <h4 class="pb-2">
                    UTILITARIANISM
                    <input
                      type="number"
                      class="text-1"
                      id="text-4"
                      placeholder="/15"
                      min="0"
                      max="15"
                      onchange="valueChange4()"
                      maxlength="2"
                      required
                      onkeyup="this.value = minmax2(this.value, 0, 15)"
                    />
                  </h4>
                  <textarea
                    name="progress-4"
                    id="progress-4"
                    cols="10"
                    rows="7"
                    placeholder="Comments Summary: This summary lists all comments posted in-text by the marker"
                  ></textarea>
                </div>
              </div>
            </div>

            <div class="row p-2">
              <div class="col-lg p-2">
                <div class="textarea-container">
                  <h4 class="pb-2">
                    VIRTUE ETHICS
                    <input
                      type="number"
                      class="text-1"
                      id="text-5"
                      placeholder="/15"
                      min="0"
                      max="15"
                      onchange="valueChange5()"
                      maxlength="2"
                      required
                      onkeyup="this.value = minmax2(this.value, 0, 15)"
                    />
                  </h4>
                  <textarea
                    name="progress-5"
                    id="progress-5"
                    cols="10"
                    rows="7"
                    placeholder="Comments Summary: This summary lists all comments posted in-text by the marker"
                  ></textarea>
                </div>
              </div>
              <div class="col-lg p-2">
                <div class="textarea-container">
                  <h4 class="pb-2">
                    CARE ETHICS
                    <input
                      type="number"
                      class="text-1"
                      id="text-6"
                      min="0"
                      max="15"
                      placeholder="/15"
                      onchange="valueChange6()"
                      maxlength="2"
                      required
                      onkeyup="this.value = minmax2(this.value, 0, 15)"
                    />
                  </h4>
                  <textarea
                    name="progress-6"
                    id="progress-6"
                    cols="10"
                    rows="7"
                    placeholder="Comments Summary: This summary lists all comments posted in-text by the marker"
                  ></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row p-2 justify-content-center">
            <input type = "submit" value="Save Data" name="grades-save" id="grades-save" class="stakeholders-btn"> &nbsp; &nbsp;
            <input
              type="submit"
              name="calc-grade"
              id="calc-grade"
              value="Calculate Grades"
              class="stakeholders-btn"
              onclick="assignValue();assignValue2();assignValue3();assignValue4();assignValue5();assignValue6();"
            />
          </div>
          <br />
          <div class="box-container">
            <div class="row p-2">
              <div class="col-lg p-2">
                <h4 class="pb-2">
                  <center>
                    TOTAL: <span id="myText" style="color: red"></span> / 80<br />
                    <span id="percentage" style="color: red"></span>
                  </center>
                </h4>
              </div>
            </div>
            <div class="row p-2">
              <div class="col-lg p-2">
                <h5 class="ms-5">
                  Issue & Options:
                  <span id="issue" style="color: red"></span> / 10
                </h5>
              </div>
              <div class="col-lg p-2">
                <h5 class="ms-5">
                  Stakeholders:
                  <span id="stakeholder" style="color: red"></span> / 10
                </h5>
              </div>
              <div class="col-lg p-2">
                <h5 class="ms-5">
                  Utilitarianism:
                  <span id="utilitarianism" style="color: red"></span> / 15
                </h5>
              </div>
            </div>
            <div class="row p-2">
              <div class="col-lg p-2">
                <h5 class="ms-5">
                  Deontology:
                  <span id="deontology" style="color: red"></span> / 15
                </h5>
              </div>
              <div class="col-lg p-2">
                <h5 class="ms-5">
                  Virtue Ethics:
                  <span id="virtue" style="color: red"></span> / 15
                </h5>
              </div>
              <div class="col-lg p-2">
                <h5 class="ms-5">
                  Care Ethics:
                  <span id="care" style="color: red"></span> / 15
                </h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br />
    <div class="d-grid gap-2">
      <button class="btn btn-secondary" type="button" onclick="loadVar();" id="generateBtn">
        Generate Report
      </button>
      <!-- Libraries -->
      <script src="https://unpkg.com/docx@5.0.2/build/index.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/1.3.8/FileSaver.js"></script>
      <!-- Libraries -->
      <script src="./Scripts/app.js"></script>
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
    <script>
      var stuID = <?php echo json_encode($stuID);?>;
      var caseID = <?php echo json_encode($caseID);?>;
      function loadVar() {
        
        $.ajax({
          type: "POST",
          url: 'Scripts/report.php',
          data: {
            "caseID": caseID
          },
          dataType: 'json',
          cache: false,
          success: function(data){
            var o1_name = data[0];
            var o2_name = data[1];
            var s1_name = data[2];
            var s2_name = data[3];
            var s3_name = data[4];
            var st_o1_slider1 = data[5];
            var st_o1_slider2 = data[6];
            var st_o1_slider3 = data[7];
            var st_o1_slider_txt_1 = data[8];
            var st_o1_slider_txt_2 = data[9];
            var st_o1_slider_txt_3 = data[10];
            var st_o1_radio1 = data[11];
            var st_o1_radio2 = data[12];
            var st_o1_radio3 = data[13];
            var lt_o1_slider1 = data[14];
            var lt_o1_slider2 = data[15];
            var lt_o1_slider3 = data[16];
            var lt_o1_slider_txt_1 = data[17];
            var lt_o1_slider_txt_2 = data[18];
            var lt_o1_slider_txt_3 = data[19];
            var lt_o1_radio1 = data[20];
            var lt_o1_radio2 = data[21];
            var lt_o1_radio3 = data[22];
            var st_o2_slider1 = data[23];
            var st_o2_slider2 = data[24];
            var st_o2_slider3 = data[25];
            var st_o2_slider_txt_1 = data[26];
            var st_o2_slider_txt_2 = data[27];
            var st_o2_slider_txt_3 = data[28];
            var st_o2_radio1 = data[29];
            var st_o2_radio2 = data[30];
            var st_o2_radio3 = data[31];
            var lt_o2_slider1 = data[32];
            var lt_o2_slider2 = data[33];
            var lt_o2_slider3 = data[34];
            var lt_o2_slider_txt_1 = data[35];
            var lt_o2_slider_txt_2 = data[36];
            var lt_o2_slider_txt_3 = data[37];
            var lt_o2_radio1 = data[38];
            var lt_o2_radio2 = data[39];
            var lt_o2_radio3 = data[40];

            //code here
            alert(o1_name);

            //code end

          },
          error: function(xhr, status, error){
          console.error(xhr);
          }
          });
      }
    </script>
  </body>
</html>