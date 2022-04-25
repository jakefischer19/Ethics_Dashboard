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



$sto2slider1 = "";
$sto2slider2 = "";
$sto2slider3 = "";
$sto2slider4 = "";
$sto2slider5 = "";
$sto2slider6 = "";
$sto2slidertxt1 = "";
$sto2slidertxt2 = "";
$sto2slidertxt3 = "";
$sto2slidertxt4 = "";
$sto2slidertxt5 = "";
$sto2slidertxt6 = "";
$sto2radio1 = "";
$sto2radio2 = "";
$sto2radio3 = "";
$sto2radio4 = "";
$sto2radio5 = "";
$sto2radio6 = "";
$lto2slider1 = "";
$lto2slider2 = "";
$lto2slider3 = "";
$lto2slider4 = "";
$lto2slider5 = "";
$lto2slider6 = "";
$lto2slidertxt1 = "";
$lto2slidertxt2 = "";
$lto2slidertxt3 = "";
$lto2slidertxt4 = "";
$lto2slidertxt5 = "";
$lto2slidertxt6 = "";
$lto2radio1 = "";
$lto2radio2 = "";
$lto2radio3 = "";
$lto2radio4 = "";
$lto2radio5 = "";
$lto2radio6 = "";

if (isset($_POST['st-o2-submit'])) {
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sto2slider1 = filter_input(INPUT_POST, "st-o2-slider-1");
    $sto2slider2 = filter_input(INPUT_POST, "st-o2-slider-2");
    $sto2slider3 = filter_input(INPUT_POST, "st-o2-slider-3");
    $sto2slider4 = filter_input(INPUT_POST, "st-o2-slider-4");
    $sto2slider5 = filter_input(INPUT_POST, "st-o2-slider-5");
    $sto2slider6 = filter_input(INPUT_POST, "st-o2-slider-6");
    $sto2slidertxt1 = filter_input(INPUT_POST, "st-o2-slider-txt-1");
    $sto2slidertxt2 = filter_input(INPUT_POST, "st-o2-slider-txt-2");
    $sto2slidertxt3 = filter_input(INPUT_POST, "st-o2-slider-txt-3");
    $sto2slidertxt4 = filter_input(INPUT_POST, "st-o2-slider-txt-4");
    $sto2slidertxt5 = filter_input(INPUT_POST, "st-o2-slider-txt-5");
    $sto2slidertxt6 = filter_input(INPUT_POST, "st-o2-slider-txt-6");
    $sto2radio1 = filter_input(INPUT_POST, "st-o2-radio-1");
    $sto2radio2 = filter_input(INPUT_POST, "st-o2-radio-2");
    $sto2radio3 = filter_input(INPUT_POST, "st-o2-radio-3");
    $sto2radio4 = filter_input(INPUT_POST, "st-o2-radio-4");
    $sto2radio5 = filter_input(INPUT_POST, "st-o2-radio-5");
    $sto2radio6 = filter_input(INPUT_POST, "st-o2-radio-6");
    $lto2slider1 = filter_input(INPUT_POST, "lt-o2-slider-1");
    $lto2slider2 = filter_input(INPUT_POST, "lt-o2-slider-2");
    $lto2slider3 = filter_input(INPUT_POST, "lt-o2-slider-3");
    $lto2slider4 = filter_input(INPUT_POST, "lt-o2-slider-4");
    $lto2slider5 = filter_input(INPUT_POST, "lt-o2-slider-5");
    $lto2slider6 = filter_input(INPUT_POST, "lt-o2-slider-6");
    $lto2slidertxt1 = filter_input(INPUT_POST, "lt-o2-slider-txt-1");
    $lto2slidertxt2 = filter_input(INPUT_POST, "lt-o2-slider-txt-2");
    $lto2slidertxt3 = filter_input(INPUT_POST, "lt-o2-slider-txt-3");
    $lto2slidertxt4 = filter_input(INPUT_POST, "lt-o2-slider-txt-4");
    $lto2slidertxt5 = filter_input(INPUT_POST, "lt-o2-slider-txt-5");
    $lto2slidertxt6 = filter_input(INPUT_POST, "lt-o2-slider-txt-6");
    $lto2radio1 = filter_input(INPUT_POST, "lt-o2-radio-1");
    $lto2radio2 = filter_input(INPUT_POST, "lt-o2-radio-2");
    $lto2radio3 = filter_input(INPUT_POST, "lt-o2-radio-3");
    $lto2radio4 = filter_input(INPUT_POST, "lt-o2-radio-4");
    $lto2radio5 = filter_input(INPUT_POST, "lt-o2-radio-5");
    $lto2radio6 = filter_input(INPUT_POST, "lt-o2-radio-6");
  }

  $sql = "UPDATE util 
          SET st_o2_slider1= ?, st_o2_slider2= ?, st_o2_slider3= ?, st_o2_slider4= ?, st_o2_slider5= ?, st_o2_slider6= ?,
              st_o2_slider_txt_1= ?, st_o2_slider_txt_2= ?, st_o2_slider_txt_3= ?, st_o2_slider_txt_4= ?, st_o2_slider_txt_5= ?, st_o2_slider_txt_6= ?, 
              st_o2_radio1= ?, st_o2_radio2= ?, st_o2_radio3= ?, st_o2_radio4= ?, st_o2_radio5= ?, st_o2_radio6= ?,
              lt_o2_slider1= ?, lt_o2_slider2= ?, lt_o2_slider3= ?, lt_o2_slider4= ?, lt_o2_slider5= ?, lt_o2_slider6= ?,
              lt_o2_slider_txt_1= ?, lt_o2_slider_txt_2= ?, lt_o2_slider_txt_3= ?,  lt_o2_slider_txt_4= ?, lt_o2_slider_txt_5= ?, lt_o2_slider_txt_6= ?, 
              lt_o2_radio1= ?, lt_o2_radio2= ?, lt_o2_radio3= ?, lt_o2_radio4= ?, lt_o2_radio5= ?, lt_o2_radio6= ?  
          WHERE caseID= ?";
  $save_sql = $db_connection->prepare($sql);
  $save_sql->bind_param(
    "iiiiiissssssssssssiiiiiissssssssssssi",
    $sto2slider1,
    $sto2slider2,
    $sto2slider3,
    $sto2slider4,
    $sto2slider5,
    $sto2slider6,
    $sto2slidertxt1,
    $sto2slidertxt2,
    $sto2slidertxt3,
    $sto2slidertxt4,
    $sto2slidertxt5,
    $sto2slidertxt6,
    $sto2radio1,
    $sto2radio2,
    $sto2radio3,
    $sto2radio4,
    $sto2radio5,
    $sto2radio6,
    $lto2slider1,
    $lto2slider2,
    $lto2slider3,
    $lto2slider4,
    $lto2slider5,
    $lto2slider6,
    $lto2slidertxt1,
    $lto2slidertxt2,
    $lto2slidertxt3,
    $lto2slidertxt4,
    $lto2slidertxt5,
    $lto2slidertxt6,
    $lto2radio1,
    $lto2radio2,
    $lto2radio3,
    $lto2radio4,
    $lto2radio5,
    $lto2radio6,
    $caseID
  );
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
    var counter = "";

    $(document).ready(function() {

      opt_counter = localStorage.getItem("options_counter");

      counter = localStorage.getItem("stakeholders_counter");
      ta_counter = localStorage.getItem("ta_counter");

      if (ta_counter >= 1) {
        //disabling radio buttons for a ta

        //short-term
        document.getElementById("st-o2-radio-1").disabled = true;
        document.getElementById("st-o2-radio-2").disabled = true;
        document.getElementById("st-o2-radio-3").disabled = true;
        document.getElementById("st-o2-radio-4").disabled = true;
        document.getElementById("st-o2-radio-5").disabled = true;
        document.getElementById("st-o2-radio-6").disabled = true;
        document.getElementById("st-o2-radio-7").disabled = true;
        document.getElementById("st-o2-radio-8").disabled = true;
        document.getElementById("st-o2-radio-9").disabled = true;
        document.getElementById("st-o2-radio-10").disabled = true;
        document.getElementById("st-o2-radio-11").disabled = true;
        document.getElementById("st-o2-radio-12").disabled = true;

        //long-term
        document.getElementById("lt-o2-radio-1").disabled = true;
        document.getElementById("lt-o2-radio-2").disabled = true;
        document.getElementById("lt-o2-radio-3").disabled = true;
        document.getElementById("lt-o2-radio-4").disabled = true;
        document.getElementById("lt-o2-radio-5").disabled = true;
        document.getElementById("lt-o2-radio-6").disabled = true;
        document.getElementById("lt-o2-radio-7").disabled = true;
        document.getElementById("lt-o2-radio-8").disabled = true;
        document.getElementById("lt-o2-radio-9").disabled = true;
        document.getElementById("lt-o2-radio-10").disabled = true;
        document.getElementById("lt-o2-radio-11").disabled = true;
        document.getElementById("lt-o2-radio-12").disabled = true;

        //disabling sliders for a ta

        //short-term
        document.getElementById("st-o2-slider-1").disabled = true;
        document.getElementById("st-o2-slider-2").disabled = true;
        document.getElementById("st-o2-slider-3").disabled = true;
        document.getElementById("st-o2-slider-4").disabled = true;
        document.getElementById("st-o2-slider-5").disabled = true;
        document.getElementById("st-o2-slider-6").disabled = true;

        //long-term
        document.getElementById("lt-o2-slider-1").disabled = true;
        document.getElementById("lt-o2-slider-2").disabled = true;
        document.getElementById("lt-o2-slider-3").disabled = true;
        document.getElementById("lt-o2-slider-4").disabled = true;
        document.getElementById("lt-o2-slider-5").disabled = true;
        document.getElementById("lt-o2-slider-6").disabled = true;

        //disabling textboxes for a ta

        //short-term
        document.getElementById("st-o2-slider-txt-1").disabled = true;
        document.getElementById("st-o2-slider-txt-2").disabled = true;
        document.getElementById("st-o2-slider-txt-3").disabled = true;
        document.getElementById("st-o2-slider-txt-4").disabled = true;
        document.getElementById("st-o2-slider-txt-5").disabled = true;
        document.getElementById("st-o2-slider-txt-6").disabled = true;

        //long-term
        document.getElementById("lt-o2-slider-txt-1").disabled = true;
        document.getElementById("lt-o2-slider-txt-2").disabled = true;
        document.getElementById("lt-o2-slider-txt-3").disabled = true;
        document.getElementById("lt-o2-slider-txt-4").disabled = true;
        document.getElementById("lt-o2-slider-txt-5").disabled = true;
        document.getElementById("lt-o2-slider-txt-6").disabled = true;
      }


      b = localStorage.getItem("myValue");
      c = localStorage.getItem("myValue2");

      document.getElementById("o1-st-agg-slider").value = b;
      document.getElementById("o1-lt-agg-slider").value = c;


      //o2-st-agg-slider is the slider for Aggregation of short-term outcomes for option 1
      document.getElementById("o1-st-agg-slider").disabled = true;

      //o2-lt-agg-slider is the slider for Aggregation of long-term outcomes for option 1
      document.getElementById("o1-lt-agg-slider").disabled = true;

      //o2-st-agg-slider is the slider for Aggregation of short-term outcomes for option 2
      document.getElementById("o2-st-agg-slider").disabled = true;

      //o2-lt-agg-slider is the slider for Aggregation of long-term outcomes for option 2
      document.getElementById("o2-lt-agg-slider").disabled = true;

      document.getElementById("o3-st-agg-slider").disabled = true;
      document.getElementById("o3-st-agg-slider").style.background = "grey";
      document.getElementById("short-term-3").style.color = "grey";
      document.getElementById("short-term-slider-3").style.color = "grey";

      document.getElementById("o3-lt-agg-slider").disabled = true;
      document.getElementById("o3-lt-agg-slider").style.background = "grey";
      document.getElementById("long-term-3").style.color = "grey";
      document.getElementById("long-term-slider-3").style.color = "grey";
      document.getElementById("option-3").style.color = "grey";
      // Hiding the sliders for st-o2-stakeholder-4 , st-o2-stakeholder-5 and st-o2-stakeholder-6 initially
      //If st-o2-stakeholder-4 ,st-o2-stakeholder-5 and st-o2-stakeholder-6 value is present in database , need to change the value of the two slider displays to != "none";
      // if (counter <= 3) {
      //   document.getElementById("st-o2-stakeholder-4").style.display = "none";
      //   document.getElementById("st-o2-stakeholder-5").style.display = "none";
      //   document.getElementById("st-o2-stakeholder-6").style.display = "none";

      //   document.getElementById("lt-o2-stakeholder-4").style.display = "none";
      //   document.getElementById("lt-o2-stakeholder-5").style.display = "none";
      //   document.getElementById("lt-o2-stakeholder-6").style.display = "none";
      // } else if (counter == 4) {
      //   document.getElementById("st-o2-stakeholder-5").style.display = "none";
      //   document.getElementById("st-o2-stakeholder-6").style.display = "none";

      //   document.getElementById("lt-o2-stakeholder-5").style.display = "none";
      //   document.getElementById("lt-o2-stakeholder-6").style.display = "none";
      // } else if (counter == 5) {
      //   document.getElementById("st-o2-stakeholder-6").style.display = "none";

      //   document.getElementById("lt-o2-stakeholder-6").style.display = "none";
      // }

      // if (opt_counter < 3) {
      //   document.getElementById("agg-option-3").style.display = "none";
      //   document.getElementById("agg-option-3-sliders").style.display =
      //     "none";
      //   document.getElementById("pag-option-3").style.display = "none";
      //   document.getElementById("pag-next-1").style.display = "none";
      // } else {
      //   document.getElementById("pag-next-2").style.display = "none";
      // }

      $(".dropdown").hover(function() {
        var dropdownMenu = $(this).children(".dropdown-menu");
        if (dropdownMenu.is(":visible")) {
          dropdownMenu.parent().toggleClass("open");
        }
      });
    });
  </script>
  <script>
    var hook = true;
    window.onbeforeunload = function() {
      if (hook) {
        return "Did you save your stuff?";
      }
    };

    function unhook() {
      hook = false;
    }
    var stAvg = 0,
      ltAvg = 0,
      stName = 0,
      stName2 = 0,
      stName3 = 0,
      stName4 = 0,
      stName5 = 0,
      stName6 = 0,
      ltName = 0,
      ltName2 = 0,
      ltName3 = 0,
      ltName4 = 0,
      ltName5 = 0,
      ltName6 = 0,
      send = 0,
      send2 = 0,
      send3 = 0,
      send4 = 0,
      stCountHighRBT = 0,
      stCountLowRBT = 0,
      stSendHighRadioButton = 0,
      stSendLowRadioButton = 0,
      ltCountHighRBT = 0,
      ltCountLowRBT = 0,
      ltSendHighRadioButton = 0,
      ltSendLowRadioButton = 0;

    //st-o2-slider-1 is the slider for Stakeholder-1
    function stGetValue() {
      stName = document.getElementById("st-o2-slider-1").value;
      stAvg = (+stName + +stName2 + +stName3) / 3;
      document.getElementById("o2-st-agg-slider").value = stAvg;
    }
    //st-o2-slider-2 is the slider for Stakeholder-2
    function stGetValue2() {
      stName2 = document.getElementById("st-o2-slider-2").value;
      stAvg = (+stName + +stName2 + +stName3) / 3;
      document.getElementById("o2-st-agg-slider").value = stAvg;
    }
    //st-o2-slider-3 is the slider for Stakeholder-3
    function stGetValue3() {
      stName3 = document.getElementById("st-o2-slider-3").value;
      stAvg = (+stName + +stName2 + +stName3) / 3;
      document.getElementById("o2-st-agg-slider").value = stAvg;
    }
    //st-o2-slider-4 is the slider for Stakeholder-4
    function stGetValue4() {
      stName4 = document.getElementById("st-o2-slider-4").value;
      stAvg = (+stName + +stName2 + +stName3 + +stName4) / 4;
      document.getElementById("o2-st-agg-slider").value = stAvg;
    }

    //st-o2-slider-5 is the slider for Stakeholder-5
    function stGetValue5() {
      stName5 = document.getElementById("st-o2-slider-5").value;
      stAvg = (+stName + +stName2 + +stName3 + +stName4 + +stName5) / 5;
      document.getElementById("o2-st-agg-slider").value = stAvg;
    }

    //st-o2-slider-6 is the slider for Stakeholder-6
    function stGetValue6() {
      stName6 = document.getElementById("st-o2-slider-6").value;
      stAvg =
        (+stName + +stName2 + +stName3 + +stName4 + +stName5 + +stName6) / 6;
      document.getElementById("o2-st-agg-slider").value = stAvg;
    }

    function ltGetValue() {
      ltName = document.getElementById("lt-o2-slider-1").value;
      ltAvg = (+ltName + +ltName2 + +ltName3) / 3;
      document.getElementById("o2-lt-agg-slider").value = ltAvg;
    }

    //lt-o2-slider-2 is the slider for Stakeholder-2
    function ltGetValue2() {
      ltName2 = document.getElementById("lt-o2-slider-2").value;
      ltAvg = (+ltName + +ltName2 + +ltName3) / 3;
      document.getElementById("o2-lt-agg-slider").value = ltAvg;
    }
    //lt-o2-slider-3 is the slider for Stakeholder-3
    function ltGetValue3() {
      ltName3 = document.getElementById("lt-o2-slider-3").value;
      ltAvg = (+ltName + +ltName2 + +ltName3) / 3;
      document.getElementById("o2-lt-agg-slider").value = ltAvg;
    }
    //lt-o2-slider-4 is the slider for Stakeholder-4
    function ltGetValue4() {
      ltName4 = document.getElementById("lt-o2-slider-4").value;
      ltAvg = (+ltName + +ltName2 + +ltName3 + +ltName4) / 4;
      document.getElementById("o2-lt-agg-slider").value = ltAvg;
    }

    //lt-o2-slider-5 is the slider for Stakeholder-5
    function ltGetValue5() {
      ltName5 = document.getElementById("lt-o2-slider-5").value;
      ltAvg = (+ltName + +ltName2 + +ltName3 + +ltName4 + +ltName5) / 5;
      document.getElementById("o2-lt-agg-slider").value = ltAvg;
    }

    //lt-o2-slider-6 is the slider for Stakeholder-6
    function ltGetValue6() {
      ltName6 = document.getElementById("lt-o2-slider-6").value;
      ltAvg =
        (+ltName + +ltName2 + +ltName3 + +ltName4 + +ltName5 + +ltName6) / 6;
      document.getElementById("o2-lt-agg-slider").value = ltAvg;
    }

    function valueSender() {
      if (opt_counter < 3) {
        send = b;
        send2 = c;
        send3 = stAvg;
        send4 = ltAvg;

        localStorage.setItem("myValue", send);
        localStorage.setItem("myValue2", send2);
        localStorage.setItem("myValue3", send3);
        localStorage.setItem("myValue4", send4);

        //     window.location.href = "utilitarianism-5.html";
      } else {
        send = b;
        send2 = c;
        send3 = stAvg;
        send4 = ltAvg;

        localStorage.setItem("myValue", send);
        localStorage.setItem("myValue2", send2);
        localStorage.setItem("myValue3", send3);
        localStorage.setItem("myValue4", send4);

        //window.location.href = "utilitarianism-3rd-option.html";
      }
    }

    function stCountHigh() {
      stCountHighRBT++;
    }

    function stCountLow() {
      stCountLowRBT++;
    }

    function ltCountHigh() {
      ltCountHighRBT++;
    }

    function ltCountLow() {
      ltCountLowRBT++;
    }

    function stValueSenderRadioButtonHigh() {
      stSendHighRadioButton = stCountHighRBT;
      localStorage.setItem(
        "myValueHighRadioButton-ST-2",
        stSendHighRadioButton
      );
      //window.location.href = "utilitarianism-5.html";
    }

    function stValueSenderRadioButtonLow() {
      stSendLowRadioButton = stCountLowRBT;
      localStorage.setItem(
        "myValueLowRadioButton-ST-2",
        stSendLowRadioButton
      );
      // window.location.href = "utilitarianism-5.html";
    }

    function ltValueSenderRadioButtonHigh() {
      ltSendHighRadioButton = ltCountHighRBT;
      localStorage.setItem(
        "myValueHighRadioButton-LT-2",
        ltSendHighRadioButton
      );
      // window.location.href = "utilitarianism-5.html";
    }

    function ltValueSenderRadioButtonLow() {
      ltSendLowRadioButton = ltCountLowRBT;
      localStorage.setItem(
        "myValueLowRadioButton-LT-2",
        ltSendLowRadioButton
      );
      // window.location.href = "utilitarianism-5.html";
    }
  </script>
</head>
<style></style>

<body onload="load();">
  <!-- Load Header -->
  <div id="header">
    <script>
      $(function() {
        $("#header").load("header.php");
      });
    </script>
  </div>
  <form action="utilitarianism-4.php" method="POST">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <div class="row p-2">
            <div class="col-lg">
              <h5 class="pb-2">
                The Greatest Happiness Principle, actions are right if they
                promote happiness (pleasure) and wrong if they promote
                unhappiness (pain). Consider the relative stakeholder pleasures
                or pains for the options you identified. Identify the pleasures
                as higher or lower by ticking the box.
              </h5>
            </div>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body" style="height: 650px; overflow-y: auto">
          <h4 class="p-2">
            <center>
              OPTION 2 -
              <span class="option2-title" id="option2-title" style="color: grey">
                I can betray the company...</span>
            </center>
          </h4>
          <hr style="color: black; height: 2px" />
          <h4 class="p-2">
            <b>
              <center>Short-term consequences</center>
            </b>
          </h4>
          <br />
          <div class="row p-2" id="st-o2-stakeholder-1">
            <h4 class="p-2">STAKEHOLDER-1</h4>
            <h5>
              <span class="stakeholders-name" id="st-stakeholders-name-1" name="st-stakeholders-name-1" style="color: grey; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 50ch">The engineer asked to design the VW defeat...</span>
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input type="range" min="1" max="100" value="0" class="slider" id="st-o2-slider-1" name="st-o2-slider-1" onchange="stGetValue()" />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input type="text" id="st-o2-slider-txt-1" name="st-o2-slider-txt-1" class="text-class" placeholder="Explain the selection" />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input type="radio" name="st-o2-radio-1" id="st-o2-radio-1" value="High" onclick="stCountHigh()" />&emsp; <label>Low</label>
                <input type="radio" name="st-o2-radio-1" id="st-o2-radio-2" value="Low" onclick="stCountLow()" />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="st-o2-stakeholder-2">
            <h4 class="pb-2">STAKEHOLDER-2</h4>
            <h5>
              <span class="stakeholders-name" id="st-stakeholders-name-2" name="st-stakeholders-name-2" style="color: grey; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 50ch">The decision makers at VW who asked...</span>
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input type="range" min="1" max="100" value="0" class="slider" id="st-o2-slider-2" name="st-o2-slider-2" onchange="stGetValue2()" />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input type="text" id="st-o2-slider-txt-2" name="st-o2-slider-txt-2" class="text-class" placeholder="Explain the selection" />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input type="radio" name="st-o2-radio-2" id="st-o2-radio-3" value="High" onclick="stCountHigh()" />&emsp; <label>Low</label>
                <input type="radio" name="st-o2-radio-2" id="st-o2-radio-4" value="Low" onclick="stCountLow()" />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="st-o2-stakeholder-3">
            <h4 class="pb-2">STAKEHOLDER-3</h4>
            <h5>
              <span class="stakeholders-name" id="st-stakeholders-name-3" name="st-stakeholders-name-3" style="color: grey; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 50ch">Consumers...</span>
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input type="range" min="1" max="100" value="0" class="slider" id="st-o2-slider-3" name="st-o2-slider-3" onchange="stGetValue3()" />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input type="text" id="st-o2-slider-txt-3" name="st-o2-slider-txt-3" class="text-class" placeholder="Explain the selection" />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input type="radio" name="st-o2-radio-3" id="st-o2-radio-5" value="High" onclick="stCountHigh()" />&emsp; <label>Low</label>
                <input type="radio" name="st-o2-radio-3" id="st-o2-radio-6" value="Low" onclick="stCountLow()" />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="st-o2-stakeholder-4">
            <h4 class="pb-2">STAKEHOLDER-4</h4>
            <h5>
              <span class="stakeholders-name" id="st-stakeholders-name-4" name="st-stakeholders-name-4" style="color: grey; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 50ch">VW Owners/Shareholders...</span>
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input type="range" min="1" max="100" value="0" class="slider" id="st-o2-slider-4" name="st-o2-slider-4" onchange="stGetValue4()" />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input type="text" id="st-o2-slider-txt-4" name="st-o2-slider-txt-4" class="text-class" placeholder="Explain the selection" />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input type="radio" name="st-o2-radio-4" id="st-o2-radio-7" value="High" onclick="stCountHigh()" />&emsp; <label>Low</label>
                <input type="radio" name="st-o2-radio-4" id="st-o2-radio-8" value="Low" onclick="stCountLow()" />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="st-o2-stakeholder-5">
            <h4 class="pb-2">STAKEHOLDER-5</h4>
            <h5>
              <span class="stakeholders-name" id="st-stakeholders-name-5" name="st-stakeholders-name-5" style="color: grey; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 50ch">Stakeholder-5</span>
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input type="range" min="1" max="100" value="0" class="slider" id="st-o2-slider-5" name="st-o2-slider-5" onchange="stGetValue5()" />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input type="text" id="st-o2-slider-txt-5" name="st-o2-slider-txt-5" class="text-class" placeholder="Explain the selection" />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input type="radio" name="st-o2-radio-5" id="st-o2-radio-9" value="High" onclick="stCountHigh()" />&emsp; <label>Low</label>
                <input type="radio" name="st-o2-radio-5" id="st-o2-radio-10" value="Low" onclick="stCountLow()" />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="st-o2-stakeholder-6">
            <h4 class="pb-2">STAKEHOLDER-6</h4>
            <h5>
              <span class="stakeholders-name" id="st-stakeholders-name-6" name="st-stakeholders-name-6" style="color: grey; display: inline-block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 50ch">Stakeholder-6</span>
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input type="range" min="1" max="100" value="0" class="slider" id="st-o2-slider-6" name="st-o2-slider-6" onchange="stGetValue6()" />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input type="text" id="st-o2-slider-txt-6" name="st-o2-slider-txt-6" class="text-class" placeholder="Explain the selection" />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input type="radio" name="st-o2-radio-6" id="st-o2-radio-11" value="High" onclick="stCountHigh()" />&emsp; <label>Low</label>
                <input type="radio" name="st-o2-radio-6" id="st-o2-radio-12" value="Low" onclick="stCountLow()" />
              </h5>
            </div>
          </div>
          <hr style="color: black; height: 2px" />
          <h4 class="p-2">
            <b>
              <center>Long-term consequences</center>
            </b>
          </h4>
          <br />
          <div class="row p-2" id="lt-o2-stakeholder-1">
            <h4 class="p-2">STAKEHOLDER-1</h4>
            <h5>
              <span class="stakeholders-name" id="lt-stakeholders-name-1" name="lt-stakeholders-name-1">The engineer asked to design the VW defeat...</span>
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input type="range" min="1" max="100" value="0" class="slider" id="lt-o2-slider-1" name="lt-o2-slider-1" onchange="ltGetValue()" />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input type="text" id="lt-o2-slider-txt-1" name="lt-o2-slider-txt-1" class="text-class" placeholder="Explain the selection" />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input type="radio" name="lt-o2-radio-1" id="lt-o2-radio-1" value="High" onclick="ltCountHigh()" />&emsp; <label>Low</label>
                <input type="radio" name="lt-o2-radio-1" id="lt-o2-radio-2" value="Low" onclick="ltCountLow()" />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="lt-o2-stakeholder-2">
            <h4 class="pb-2">STAKEHOLDER-2</h4>
            <h5>
              <span class="stakeholders-name" id="lt-stakeholders-name-2" name="lt-stakeholders-name-2">The decision makers at VW who asked...</span>
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input type="range" min="1" max="100" value="0" class="slider" id="lt-o2-slider-2" name="lt-o2-slider-2" onchange="ltGetValue2()" />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input type="text" id="lt-o2-slider-txt-2" name="lt-o2-slider-txt-2" class="text-class" placeholder="Explain the selection" />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input type="radio" name="lt-o2-radio-2" id="lt-o2-radio-3" value="High" onclick="ltCountHigh()" />&emsp; <label>Low</label>
                <input type="radio" name="lt-o2-radio-2" id="lt-o2-radio-4" value="Low" onclick="ltCountLow()" />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="lt-o2-stakeholder-3">
            <h4 class="pb-2">STAKEHOLDER-3</h4>
            <h5>
              <span class="stakeholders-name" id="lt-stakeholders-name-3" name="lt-stakeholders-name-3">Consumers...</span>
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input type="range" min="1" max="100" value="0" class="slider" id="lt-o2-slider-3" name="lt-o2-slider-3" onchange="ltGetValue3()" />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input type="text" id="lt-o2-slider-txt-3" name="lt-o2-slider-txt-3" class="text-class" placeholder="Explain the selection" />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input type="radio" name="lt-o2-radio-3" id="lt-o2-radio-5" value="High" onclick="ltCountHigh()" />&emsp; <label>Low</label>
                <input type="radio" name="lt-o2-radio-3" id="lt-o2-radio-6" value="Low" onclick="ltCountLow()" />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="lt-o2-stakeholder-4">
            <h4 class="pb-2">STAKEHOLDER-4</h4>
            <h5>
              <span class="stakeholders-name" id="lt-stakeholders-name-4" name="lt-stakeholders-name-4">VW Owners/Shareholders...</span>
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input type="range" min="1" max="100" value="0" class="slider" id="lt-o2-slider-4" name="lt-o2-slider-4" onchange="ltGetValue4()" />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input type="text" id="lt-o2-slider-txt-4" name="lt-o2-slider-txt-4" class="text-class" placeholder="Explain the selection" />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input type="radio" name="lt-o2-radio-4" id="lt-o2-radio-7" value="High" onclick="ltCountHigh()" />&emsp; <label>Low</label>
                <input type="radio" name="lt-o2-radio-4" id="lt-o2-radio-8" value="Low" onclick="ltCountLow()" />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="lt-o2-stakeholder-5">
            <h4 class="pb-2">STAKEHOLDER-5</h4>
            <h5>
              <span class="stakeholders-name" id="lt-stakeholders-name-5" name="lt-stakeholders-name-5">Stakeholder-5</span>
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input type="range" min="1" max="100" value="0" class="slider" id="lt-o2-slider-5" name="lt-o2-slider-5" onchange="ltGetValue5()" />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input type="text" id="lt-o2-slider-txt-5" name="lt-o2-slider-txt-5" class="text-class" placeholder="Explain the selection" />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input type="radio" name="lt-o2-radio-5" id="lt-o2-radio-9" value="High" onclick="ltCountHigh()" />&emsp; <label>Low</label>
                <input type="radio" name="lt-o2-radio-5" id="lt-o2-radio-10" value="Low" onclick="ltCountLow()" />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="lt-o2-stakeholder-6">
            <h4 class="pb-2">STAKEHOLDER-6</h4>
            <h5>
              <span class="stakeholders-name" id="lt-stakeholders-name-6" name="lt-stakeholders-name-6">Stakeholder-6</span>
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input type="range" min="1" max="100" value="0" class="slider" id="lt-o2-slider-6" name="lt-o2-slider-6" onchange="ltGetValue6()" />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input type="text" id="lt-o2-slider-txt-6" name="lt-o2-slider-txt-6" class="text-class" placeholder="Explain the selection" />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input type="radio" name="lt-o2-radio-6" id="lt-o2-radio-11" value="High" onclick="ltCountHigh()" />&emsp; <label>Low</label>
                <input type="radio" name="lt-o2-radio-6" id="lt-o2-radio-12" value="Low" onclick="ltCountLow()" />
              </h5>
            </div>
          </div>
          <hr style="color: black; height: 2px" />
          <div class="row p-2">
            <div class="col-lg p-2">
              <center>
                <h4 class="p-2">OPTION 1 AGGREGATE</h4>
              </center>
            </div>
          </div>
          <div class="row p-2">
            <div class="col-lg p-2">
              <h5 class="p-2" id="short-term">Short-term Outcomes:</h5>
              <h6 class="pt-2" id="short-term-slider">
                Pleasure
                <input type="range" min="1" max="100" value="0" class="slider" id="o1-st-agg-slider" name="o1-st-agg-slider" />
                Pain
              </h6>
            </div>
            <div class="col-lg p-2">
              <h5 class="p-2" id="long-term">Long-term Outcomes:</h5>
              <h6 class="pt-2" id="long-term-slider">
                Pleasure
                <input type="range" min="1" max="100" value="0" class="slider" id="o1-lt-agg-slider" name="o1-lt-agg-slider" />
                Pain
              </h6>
            </div>
          </div>
          <div class="row p-2">
            <div class="col-lg p-2">
              <center>
                <h4 class="p-2" id="option-2">OPTION 2 AGGREGATE</h4>
              </center>
            </div>
          </div>
          <div class="row p-2">
            <div class="col-lg p-2">
              <h5 class="p-2" id="short-term-2">Short-term outcomes:</h5>
              <h6 class="pt-2" id="short-term-slider-2">
                Pleasure
                <input type="range" min="1" max="100" value="0" class="slider" id="o2-st-agg-slider" name="o2-st-agg-slider" />
                Pain
              </h6>
            </div>
            <div class="col-lg p-2">
              <h5 class="p-2" id="long-term-2">Long-term Outcomes:</h5>
              <h6 class="pt-2" id="long-term-slider-2">
                Pleasure
                <input type="range" min="1" max="100" value="0" class="slider" id="o2-lt-agg-slider" name="o2-lt-agg-slider" />
                Pain
              </h6>
            </div>
          </div>
          <div class="row p-2" id="agg-option-3">
            <div class="col-lg p-2">
              <center>
                <h4 class="p-2" id="option-3">OPTION 3 AGGREGATE</h4>
              </center>
            </div>
          </div>
          <div class="row p-2" id="agg-option-3-sliders">
            <div class="col-lg p-2">
              <h5 class="p-2" id="short-term-3">Short-term outcomes:</h5>
              <h6 class="pt-2" id="short-term-slider-3">
                Pleasure
                <input type="range" min="1" max="100" value="0" class="slider" id="o3-st-agg-slider" name="o3-st-agg-slider" />
                Pain
              </h6>
            </div>
            <div class="col-lg p-2">
              <h5 class="p-2" id="long-term-3">Long-term Outcomes:</h5>
              <h6 class="pt-2" id="long-term-slider-3">
                Pleasure
                <input type="range" min="1" max="100" value="0" class="slider" id="o3-lt-agg-slider" name="o3-lt-agg-slider" />
                Pain
              </h6>
            </div>
          </div>
          <br />
        </div>
      </div>
      <div class="row justify-content-center">
        <input type="submit" value="Save" id="st-o2-submit" name="st-o2-submit" class="stakeholders-btn mt-4" onclick="stValueSenderRadioButtonHigh();stValueSenderRadioButtonLow();ltValueSenderRadioButtonHigh();ltValueSenderRadioButtonLow();valueSender();unhook()" />
      </div>
    </div>
  </form>
  <br />
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item">
        <a class="page-link" href="utilitarianism-3.html" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">Previous</span>
        </a>
      </li>

      <li class="page-item">
        <a class="page-link" href="utilitarianism.php">Options</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="utilitarianism-2.php">Stakeholders</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="utilitarianism-3.php">Option-1</a>
      </li>
      <li class="page-item active">
        <a class="page-link" href="utilitarianism-4.php">Option-2</a>
      </li>
      <li class="page-item" id="pag-option-3">
        <a class="page-link" href="utilitarianism-3rd-option.php">Option-3</a>
      </li>
      <li class="page-item">
        <a class="page-link" href="utilitarianism-5.php">Conclusion</a>
      </li>

      <li class="page-item" id="pag-next-1">
        <a class="page-link" href="utilitarianism-3rd-option.html" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
          <span class="sr-only">Next</span>
        </a>
      </li>
    </ul>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo26oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script>
    var stuID = <?php echo json_encode($stuID); ?>;
    var caseID = <?php echo json_encode($caseID); ?>;

    function load() {

      $.ajax({
        type: "POST",
        url: 'Scripts/get_util4.php',
        data: {
          "caseID": caseID
        },
        dataType: 'json',
        cache: false,
        success: function(data) {
          var o1_name = data[0];
          var o2_name = data[1];
          var o3_name = data[2];
          var s1_name = data[3];
          var s2_name = data[4];
          var s3_name = data[5];
          var s4_name = data[6];
          var s5_name = data[7];
          var s6_name = data[8];
          var st_o2_slider1 = data[9];
          var st_o2_slider2 = data[10];
          var st_o2_slider3 = data[11];
          var st_o2_slider4 = data[12];
          var st_o2_slider5 = data[13];
          var st_o2_slider6 = data[14];
          var st_o2_slider_txt_1 = data[15];
          var st_o2_slider_txt_2 = data[16];
          var st_o2_slider_txt_3 = data[17];
          var st_o2_slider_txt_4 = data[18];
          var st_o2_slider_txt_5 = data[19];
          var st_o2_slider_txt_6 = data[20];
          var st_o2_radio1 = data[21];
          var st_o2_radio2 = data[22];
          var st_o2_radio3 = data[23];
          var st_o2_radio4 = data[24];
          var st_o2_radio5 = data[25];
          var st_o2_radio6 = data[26];
          var lt_o2_slider1 = data[27];
          var lt_o2_slider2 = data[28];
          var lt_o2_slider3 = data[29];
          var lt_o2_slider4 = data[30];
          var lt_o2_slider5 = data[31];
          var lt_o2_slider6 = data[32];
          var lt_o2_slider_txt_1 = data[33];
          var lt_o2_slider_txt_2 = data[34];
          var lt_o2_slider_txt_3 = data[35];
          var lt_o2_slider_txt_4 = data[36];
          var lt_o2_slider_txt_5 = data[37];
          var lt_o2_slider_txt_6 = data[38];
          var lt_o2_radio1 = data[39];
          var lt_o2_radio2 = data[40];
          var lt_o2_radio3 = data[41];
          var lt_o2_radio4 = data[42];
          var lt_o2_radio5 = data[43];
          var lt_o2_radio6 = data[44];

          document.getElementById('option2-title').innerHTML = o2_name;

          document.getElementById('st-stakeholders-name-1').innerHTML = s1_name;
          document.getElementById('lt-stakeholders-name-1').innerHTML = s1_name;
          document.getElementById('st-stakeholders-name-2').innerHTML = s2_name;
          document.getElementById('lt-stakeholders-name-2').innerHTML = s2_name;
          document.getElementById('st-stakeholders-name-3').innerHTML = s3_name;
          document.getElementById('lt-stakeholders-name-3').innerHTML = s3_name;
          document.getElementById('st-stakeholders-name-4').innerHTML = s4_name;
          document.getElementById('lt-stakeholders-name-4').innerHTML = s4_name;
          document.getElementById('st-stakeholders-name-5').innerHTML = s5_name;
          document.getElementById('lt-stakeholders-name-5').innerHTML = s5_name;
          document.getElementById('st-stakeholders-name-6').innerHTML = s6_name;
          document.getElementById('lt-stakeholders-name-6').innerHTML = s6_name;
          document.getElementById("st-o2-slider-1").value = st_o2_slider1;
          document.getElementById('st-o2-slider-2').value = st_o2_slider2;
          document.getElementById('st-o2-slider-3').value = st_o2_slider3;
          document.getElementById("st-o2-slider-4").value = st_o2_slider4;
          document.getElementById('st-o2-slider-5').value = st_o2_slider5;
          document.getElementById('st-o2-slider-6').value = st_o2_slider6;
          document.getElementById('st-o2-slider-txt-1').value = st_o2_slider_txt_1;
          document.getElementById('st-o2-slider-txt-2').value = st_o2_slider_txt_2;
          document.getElementById('st-o2-slider-txt-3').value = st_o2_slider_txt_3;
          document.getElementById('st-o2-slider-txt-4').value = st_o2_slider_txt_4;
          document.getElementById('st-o2-slider-txt-5').value = st_o2_slider_txt_5;
          document.getElementById('st-o2-slider-txt-6').value = st_o2_slider_txt_6;
          if (st_o2_radio1 == "High") {
            document.getElementById('st-o2-radio-1').checked = true;
          } else {
            document.getElementById('st-o2-radio-2').checked = true;
          }
          if (st_o2_radio2 == "High") {
            document.getElementById('st-o2-radio-3').checked = true;
          } else {
            document.getElementById('st-o2-radio-4').checked = true;
          }
          if (st_o2_radio3 == "High") {
            document.getElementById('st-o2-radio-5').checked = true;
          } else {
            document.getElementById('st-o2-radio-6').checked = true;
          }
          if (st_o2_radio4 == "High") {
            document.getElementById('st-o2-radio-7').checked = true;
          } else {
            document.getElementById('st-o2-radio-8').checked = true;
          }
          if (st_o2_radio5 == "High") {
            document.getElementById('st-o2-radio-9').checked = true;
          } else {
            document.getElementById('st-o2-radio-10').checked = true;
          }
          if (st_o2_radio6 == "High") {
            document.getElementById('st-o2-radio-11').checked = true;
          } else {
            document.getElementById('st-o2-radio-12').checked = true;
          }
          document.getElementById('lt-o2-slider-1').value = lt_o2_slider1;
          document.getElementById('lt-o2-slider-2').value = lt_o2_slider2;
          document.getElementById('lt-o2-slider-3').value = lt_o2_slider3;
          document.getElementById('lt-o2-slider-4').value = lt_o2_slider4;
          document.getElementById('lt-o2-slider-5').value = lt_o2_slider5;
          document.getElementById('lt-o2-slider-6').value = lt_o2_slider6;
          document.getElementById('lt-o2-slider-txt-1').value = lt_o2_slider_txt_1;
          document.getElementById('lt-o2-slider-txt-2').value = lt_o2_slider_txt_2;
          document.getElementById('lt-o2-slider-txt-3').value = lt_o2_slider_txt_3;
          document.getElementById('lt-o2-slider-txt-4').value = lt_o2_slider_txt_4;
          document.getElementById('lt-o2-slider-txt-5').value = lt_o2_slider_txt_5;
          document.getElementById('lt-o2-slider-txt-6').value = lt_o2_slider_txt_6;
          if (lt_o2_radio1 == "High") {
            document.getElementById('lt-o2-radio-1').checked = true;
          } else {
            document.getElementById('lt-o2-radio-2').checked = true;
          }
          if (lt_o2_radio2 == "High") {
            document.getElementById('lt-o2-radio-3').checked = true;
          } else {
            document.getElementById('lt-o2-radio-4').checked = true;
          }
          if (lt_o2_radio3 == "High") {
            document.getElementById('lt-o2-radio-5').checked = true;
          } else {
            document.getElementById('lt-o2-radio-6').checked = true;
          }
          if (lt_o2_radio4 == "High") {
            document.getElementById('lt-o2-radio-7').checked = true;
          } else {
            document.getElementById('lt-o2-radio-8').checked = true;
          }
          if (lt_o2_radio5 == "High") {
            document.getElementById('lt-o2-radio-9').checked = true;
          } else {
            document.getElementById('lt-o2-radio-10').checked = true;
          }
          if (lt_o2_radio6 == "High") {
            document.getElementById('lt-o2-radio-11').checked = true;
          } else {
            document.getElementById('lt-o2-radio-12').checked = true;
          }
        },
        error: function(xhr, status, error) {
          console.error(xhr);
        }
      });
    }
  </script>
</body>

</html>