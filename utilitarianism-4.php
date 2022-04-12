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
      /* var b, c;
      var op2 = "";
      var st1,
        st2,
        st3,
        st4,
        st5,
        st6,*/
      var counter,
        opt_counter = "";
      $(document).ready(function () {
        counter = localStorage.getItem("stakeholders_counter");
        opt_counter = localStorage.getItem("options_counter");

        b = localStorage.getItem("myValue");
        c = localStorage.getItem("myValue2");

        document.getElementById("o1-st-agg-slider").value = b;
        document.getElementById("o1-lt-agg-slider").value = c;
        //   window.alert(counter);
        /*
        op2 = localStorage.getItem("title2");
        document.getElementById("title-span").textContent = op2;


        st1 = localStorage.getItem("stake-1-value");
        st2 = localStorage.getItem("stake-2-value");
        st3 = localStorage.getItem("stake-3-value");
        st4 = localStorage.getItem("stake-4-value");
        st5 = localStorage.getItem("stake-5-value");
        st6 = localStorage.getItem("stake-6-value");
     
        document.getElementById("st-stakeholders-name-1").textContent = st1;
        document.getElementById("st-stakeholders-name-2").textContent = st2;
        document.getElementById("st-stakeholders-name-3").textContent = st3;
        document.getElementById("st-stakeholders-name-4").textContent = st4;
        document.getElementById("st-stakeholders-name-5").textContent = st5;
        document.getElementById("st-stakeholders-name-6").textContent = st6;

        document.getElementById("lt-stakeholders-name-1").textContent = st1;
        document.getElementById("lt-stakeholders-name-2").textContent = st2;
        document.getElementById("lt-stakeholders-name-3").textContent = st3;
        document.getElementById("lt-stakeholders-name-4").textContent = st4;
        document.getElementById("lt-stakeholders-name-5").textContent = st5;
        document.getElementById("lt-stakeholders-name-6").textContent = st6;

         var resetValue = 0;
         var resetValue2 = "OPTION 2";

         localStorage.setItem("myValue", resetValue);
          localStorage.setItem("myValue2", resetValue);
          localStorage.setItem("title2", resetValue2);
*/

        //o1-st-agg-slider is the slider for Aggregation of short-term outcomes for option 1
        document.getElementById("o1-st-agg-slider").disabled = true;

        //o1-lt-agg-slider is the slider for Aggregation of long-term outcomes for option 1
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
        if (counter <= 3) {
          document.getElementById("st-o2-stakeholder-4").style.display = "none";
          document.getElementById("st-o2-stakeholder-5").style.display = "none";
          document.getElementById("st-o2-stakeholder-6").style.display = "none";

          document.getElementById("lt-o2-stakeholder-4").style.display = "none";
          document.getElementById("lt-o2-stakeholder-5").style.display = "none";
          document.getElementById("lt-o2-stakeholder-6").style.display = "none";
        } else if (counter == 4) {
          document.getElementById("st-o2-stakeholder-5").style.display = "none";
          document.getElementById("st-o2-stakeholder-6").style.display = "none";

          document.getElementById("lt-o2-stakeholder-5").style.display = "none";
          document.getElementById("lt-o2-stakeholder-6").style.display = "none";
        } else if (counter == 5) {
          document.getElementById("st-o2-stakeholder-6").style.display = "none";

          document.getElementById("lt-o2-stakeholder-6").style.display = "none";
        }

        if (opt_counter < 3) {
          document.getElementById("agg-option-3").style.display = "none";
          document.getElementById("agg-option-3-sliders").style.display =
            "none";
          document.getElementById("pag-option-3").style.display = "none";
          document.getElementById("pag-next-1").style.display = "none";
        } else {
          document.getElementById("pag-next-2").style.display = "none";
        }

        $(".dropdown").hover(function () {
          var dropdownMenu = $(this).children(".dropdown-menu");
          if (dropdownMenu.is(":visible")) {
            dropdownMenu.parent().toggleClass("open");
          }
        });
      });
    </script>
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
        <div class="card-body">
          <h4 class="p-2">
            <center>
              OPTION 2 -<span class="title-span" id="title-span">
                I can betray the company...</span
              >
            </center>
          </h4>
          <hr style="color: black; height: 2px" />
          <h4 class="p-2">
            <b><center>Short-term consequences</center></b>
          </h4>
          <br />
          <div class="row p-2" id="st-o2-stakeholder-1">
            <h4 class="p-2">STAKEHOLDER-1</h4>
            <h5>
              <span
                class="stakeholders-name"
                id="st-stakeholders-name-1"
                name="st-stakeholders-name-1"
                >The engineer asked to design the VW defeat...</span
              >
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input
                    type="range"
                    min="1"
                    max="100"
                    value="0"
                    class="slider"
                    id="st-o2-slider-1"
                    name="st-o2-slider-1"
                    onchange="stGetValue()"
                  />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input
                  type="text"
                  id="st-o2-slider-txt-1"
                  name="st-o2-slider-txt-1"
                  class="text-class"
                  placeholder="Explain the selection"
                />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input
                  type="radio"
                  name="st-o2-radio-1"
                  id="st-o2-radio-1"
                  value="High"
                  onclick="stCountHigh()"
                />&emsp; <label>Low</label>
                <input
                  type="radio"
                  name="st-o2-radio-1"
                  id="st-o2-radio-2"
                  value="Low"
                  onclick="stCountLow()"
                />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="st-o2-stakeholder-2">
            <h4 class="pb-2">STAKEHOLDER-2</h4>
            <h5>
              <span
                class="stakeholders-name"
                id="st-stakeholders-name-2"
                name="st-stakeholders-name-2"
                >The decision makers at VW who asked...</span
              >
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input
                    type="range"
                    min="1"
                    max="100"
                    value="0"
                    class="slider"
                    id="st-o2-slider-2"
                    name="st-o2-slider-2"
                    onchange="stGetValue2()"
                  />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input
                  type="text"
                  id="st-o2-slider-txt-2"
                  name="st-o2-slider-txt-2"
                  class="text-class"
                  placeholder="Explain the selection"
                />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input
                  type="radio"
                  name="st-o2-radio-2"
                  id="st-o2-radio-3"
                  value="High"
                  onclick="stCountHigh()"
                />&emsp; <label>Low</label>
                <input
                  type="radio"
                  name="st-o2-radio-2"
                  id="st-o2-radio-4"
                  value="Low"
                  onclick="stCountLow()"
                />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="st-o2-stakeholder-3">
            <h4 class="pb-2">STAKEHOLDER-3</h4>
            <h5>
              <span
                class="stakeholders-name"
                id="st-stakeholders-name-3"
                name="st-stakeholders-name-3"
                >Consumers...</span
              >
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input
                    type="range"
                    min="1"
                    max="100"
                    value="0"
                    class="slider"
                    id="st-o2-slider-3"
                    name="st-o2-slider-3"
                    onchange="stGetValue3()"
                  />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input
                  type="text"
                  id="st-o2-slider-txt-3"
                  name="st-o2-slider-txt-3"
                  class="text-class"
                  placeholder="Explain the selection"
                />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input
                  type="radio"
                  name="st-o2-radio-3"
                  id="st-o2-radio-5"
                  value="High"
                  onclick="stCountHigh()"
                />&emsp; <label>Low</label>
                <input
                  type="radio"
                  name="st-o2-radio-3"
                  id="st-o2-radio-6"
                  value="Low"
                  onclick="stCountLow()"
                />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="st-o2-stakeholder-4">
            <h4 class="pb-2">STAKEHOLDER-4</h4>
            <h5>
              <span
                class="stakeholders-name"
                id="st-stakeholders-name-4"
                name="st-stakeholders-name-4"
                >VW Owners/Shareholders...</span
              >
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input
                    type="range"
                    min="1"
                    max="100"
                    value="0"
                    class="slider"
                    id="st-o2-slider-4"
                    name="st-o2-slider-4"
                    onchange="stGetValue4()"
                  />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input
                  type="text"
                  id="st-o2-slider-txt-4"
                  name="st-o2-slider-txt-4"
                  class="text-class"
                  placeholder="Explain the selection"
                />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input
                  type="radio"
                  name="st-o2-radio-4"
                  id="st-o2-radio-7"
                  value="High"
                  onclick="stCountHigh()"
                />&emsp; <label>Low</label>
                <input
                  type="radio"
                  name="st-o2-radio-4"
                  id="st-o2-radio-8"
                  value="Low"
                  onclick="stCountLow()"
                />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="st-o2-stakeholder-5">
            <h4 class="pb-2">STAKEHOLDER-5</h4>
            <h5>
              <span
                class="stakeholders-name"
                id="st-stakeholders-name-5"
                name="st-stakeholders-name-5"
                >Stakeholder-5</span
              >
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input
                    type="range"
                    min="1"
                    max="100"
                    value="0"
                    class="slider"
                    id="st-o2-slider-5"
                    name="st-o2-slider-5"
                    onchange="stGetValue5()"
                  />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input
                  type="text"
                  id="st-o2-slider-txt-5"
                  name="st-o2-slider-txt-5"
                  class="text-class"
                  placeholder="Explain the selection"
                />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input
                  type="radio"
                  name="st-o2-radio-5"
                  id="st-o2-radio-9"
                  value="High"
                  onclick="stCountHigh()"
                />&emsp; <label>Low</label>
                <input
                  type="radio"
                  name="st-o2-radio-5"
                  id="st-o2-radio-10"
                  value="Low"
                  onclick="stCountLow()"
                />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="st-o2-stakeholder-6">
            <h4 class="pb-2">STAKEHOLDER-6</h4>
            <h5>
              <span
                class="stakeholders-name"
                id="st-stakeholders-name-6"
                name="st-stakeholders-name-6"
                >Stakeholder-6</span
              >
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input
                    type="range"
                    min="1"
                    max="100"
                    value="0"
                    class="slider"
                    id="st-o2-slider-6"
                    name="st-o2-slider-6"
                    onchange="stGetValue6()"
                  />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input
                  type="text"
                  id="st-o2-slider-txt-6"
                  name="st-o2-slider-txt-6"
                  class="text-class"
                  placeholder="Explain the selection"
                />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input
                  type="radio"
                  name="st-o2-radio-6"
                  id="st-o2-radio-11"
                  value="High"
                  onclick="stCountHigh()"
                />&emsp; <label>Low</label>
                <input
                  type="radio"
                  name="st-o2-radio-6"
                  id="st-o2-radio-12"
                  value="Low"
                  onclick="stCountLow()"
                />
              </h5>
            </div>
          </div>
          <hr style="color: black; height: 2px" />
          <h4 class="p-2">
            <b><center>Long-term consequences</center></b>
          </h4>
          <br />
          <div class="row p-2" id="lt-o2-stakeholder-1">
            <h4 class="p-2">STAKEHOLDER-1</h4>
            <h5>
              <span
                class="stakeholders-name"
                id="lt-stakeholders-name-1"
                name="lt-stakeholders-name-1"
                >The engineer asked to design the VW defeat...</span
              >
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input
                    type="range"
                    min="1"
                    max="100"
                    value="0"
                    class="slider"
                    id="lt-o2-slider-1"
                    name="lt-o2-slider-1"
                    onchange="ltGetValue()"
                  />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input
                  type="text"
                  id="lt-o2-slider-txt-1"
                  name="lt-o2-slider-txt-1"
                  class="text-class"
                  placeholder="Explain the selection"
                />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input
                  type="radio"
                  name="lt-o2-radio-1"
                  id="lt-o2-radio-1"
                  value="High"
                  onclick="ltCountHigh()"
                />&emsp; <label>Low</label>
                <input
                  type="radio"
                  name="lt-o2-radio-1"
                  id="lt-o2-radio-2"
                  value="Low"
                  onclick="ltCountLow()"
                />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="lt-o2-stakeholder-2">
            <h4 class="pb-2">STAKEHOLDER-2</h4>
            <h5>
              <span
                class="stakeholders-name"
                id="lt-stakeholders-name-2"
                name="lt-stakeholders-name-2"
                >The decision makers at VW who asked...</span
              >
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input
                    type="range"
                    min="1"
                    max="100"
                    value="0"
                    class="slider"
                    id="lt-o2-slider-2"
                    name="lt-o2-slider-2"
                    onchange="ltGetValue2()"
                  />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input
                  type="text"
                  id="lt-o2-slider-txt-2"
                  name="lt-o2-slider-txt-2"
                  class="text-class"
                  placeholder="Explain the selection"
                />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input
                  type="radio"
                  name="lt-o2-radio-2"
                  id="lt-o2-radio-3"
                  value="High"
                  onclick="ltCountHigh()"
                />&emsp; <label>Low</label>
                <input
                  type="radio"
                  name="lt-o2-radio-2"
                  id="lt-o2-radio-4"
                  value="Low"
                  onclick="ltCountLow()"
                />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="lt-o2-stakeholder-3">
            <h4 class="pb-2">STAKEHOLDER-3</h4>
            <h5>
              <span
                class="stakeholders-name"
                id="lt-stakeholders-name-3"
                name="lt-stakeholders-name-3"
                >Consumers...</span
              >
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input
                    type="range"
                    min="1"
                    max="100"
                    value="0"
                    class="slider"
                    id="lt-o2-slider-3"
                    name="lt-o2-slider-3"
                    onchange="ltGetValue3()"
                  />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input
                  type="text"
                  id="lt-o2-slider-txt-3"
                  name="lt-o2-slider-txt-3"
                  class="text-class"
                  placeholder="Explain the selection"
                />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input
                  type="radio"
                  name="lt-o2-radio-3"
                  id="lt-o2-radio-5"
                  value="High"
                  onclick="ltCountHigh()"
                />&emsp; <label>Low</label>
                <input
                  type="radio"
                  name="lt-o2-radio-3"
                  id="lt-o2-radio-6"
                  value="Low"
                  onclick="ltCountLow()"
                />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="lt-o2-stakeholder-4">
            <h4 class="pb-2">STAKEHOLDER-4</h4>
            <h5>
              <span
                class="stakeholders-name"
                id="lt-stakeholders-name-4"
                name="lt-stakeholders-name-4"
                >VW Owners/Shareholders...</span
              >
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input
                    type="range"
                    min="1"
                    max="100"
                    value="0"
                    class="slider"
                    id="lt-o2-slider-4"
                    name="lt-o2-slider-4"
                    onchange="ltGetValue4()"
                  />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input
                  type="text"
                  id="lt-o2-slider-txt-4"
                  name="lt-o2-slider-txt-4"
                  class="text-class"
                  placeholder="Explain the selection"
                />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input
                  type="radio"
                  name="lt-o2-radio-4"
                  id="lt-o2-radio-7"
                  value="High"
                  onclick="ltCountHigh()"
                />&emsp; <label>Low</label>
                <input
                  type="radio"
                  name="lt-o2-radio-4"
                  id="lt-o2-radio-8"
                  value="Low"
                  onclick="ltCountLow()"
                />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="lt-o2-stakeholder-5">
            <h4 class="pb-2">STAKEHOLDER-5</h4>
            <h5>
              <span
                class="stakeholders-name"
                id="lt-stakeholders-name-5"
                name="lt-stakeholders-name-5"
                >Stakeholder-5</span
              >
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input
                    type="range"
                    min="1"
                    max="100"
                    value="0"
                    class="slider"
                    id="lt-o2-slider-5"
                    name="lt-o2-slider-5"
                    onchange="ltGetValue5()"
                  />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input
                  type="text"
                  id="lt-o2-slider-txt-5"
                  name="lt-o2-slider-txt-5"
                  class="text-class"
                  placeholder="Explain the selection"
                />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input
                  type="radio"
                  name="lt-o2-radio-5"
                  id="lt-o2-radio-9"
                  value="High"
                  onclick="ltCountHigh()"
                />&emsp; <label>Low</label>
                <input
                  type="radio"
                  name="lt-o2-radio-5"
                  id="lt-o2-radio-10"
                  value="Low"
                  onclick="ltCountLow()"
                />
              </h5>
            </div>
          </div>
          <div class="row p-2" id="lt-o2-stakeholder-6">
            <h4 class="pb-2">STAKEHOLDER-6</h4>
            <h5>
              <span
                class="stakeholders-name"
                id="lt-stakeholders-name-6"
                name="lt-stakeholders-name-6"
                >Stakeholder-6</span
              >
            </h5>

            <div class="col-lg p-2">
              <div class="border">
                <h6 class="pt-2">
                  Pleasure
                  <input
                    type="range"
                    min="1"
                    max="100"
                    value="0"
                    class="slider"
                    id="lt-o2-slider-6"
                    name="lt-o2-slider-6"
                    onchange="ltGetValue6()"
                  />
                  Pain
                </h6>
              </div>
            </div>
            <div class="col-lg p-2">
              <div class="util-3-text">
                <input
                  type="text"
                  id="lt-o2-slider-txt-6"
                  name="lt-o2-slider-txt-6"
                  class="text-class"
                  placeholder="Explain the selection"
                />
              </div>
              <h5 class="p-2">
                Pleasure:&ensp;<label>High</label>
                <input
                  type="radio"
                  name="lt-o2-radio-6"
                  id="lt-o2-radio-11"
                  value="High"
                  onclick="ltCountHigh()"
                />&emsp; <label>Low</label>
                <input
                  type="radio"
                  name="lt-o2-radio-6"
                  id="lt-o2-radio-12"
                  value="Low"
                  onclick="ltCountLow()"
                />
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
                <input
                  type="range"
                  min="1"
                  max="100"
                  value="0"
                  class="slider"
                  id="o1-st-agg-slider"
                  name="o1-st-agg-slider"
                />
                Pain
              </h6>
            </div>
            <div class="col-lg p-2">
              <h5 class="p-2" id="long-term">Long-term Outcomes:</h5>
              <h6 class="pt-2" id="long-term-slider">
                Pleasure
                <input
                  type="range"
                  min="1"
                  max="100"
                  value="0"
                  class="slider"
                  id="o1-lt-agg-slider"
                  name="o1-lt-agg-slider"
                />
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
                <input
                  type="range"
                  min="1"
                  max="100"
                  value="0"
                  class="slider"
                  id="o2-st-agg-slider"
                  name="o2-st-agg-slider"
                />
                Pain
              </h6>
            </div>
            <div class="col-lg p-2">
              <h5 class="p-2" id="long-term-2">Long-term Outcomes:</h5>
              <h6 class="pt-2" id="long-term-slider-2">
                Pleasure
                <input
                  type="range"
                  min="1"
                  max="100"
                  value="0"
                  class="slider"
                  id="o2-lt-agg-slider"
                  name="o2-lt-agg-slider"
                />
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
                <input
                  type="range"
                  min="1"
                  max="100"
                  value="0"
                  class="slider"
                  id="o3-st-agg-slider"
                  name="o3-st-agg-slider"
                />
                Pain
              </h6>
            </div>
            <div class="col-lg p-2">
              <h5 class="p-2" id="long-term-3">Long-term Outcomes:</h5>
              <h6 class="pt-2" id="long-term-slider-3">
                Pleasure
                <input
                  type="range"
                  min="1"
                  max="100"
                  value="0"
                  class="slider"
                  id="o3-lt-agg-slider"
                  name="o3-lt-agg-slider"
                />
                Pain
              </h6>
            </div>
          </div>
          <br />
          <div class="row justify-content-center">
            <input
              type="submit"
              value="Save"
              id="st-o2-submit"
              name="st-o2-submit"
              class="stakeholders-btn"
              onclick="stValueSenderRadioButtonHigh();stValueSenderRadioButtonLow();ltValueSenderRadioButtonHigh();ltValueSenderRadioButtonLow();valueSender();unhook()"
            />
          </div>
        </div>
      </div>
    </div>
    <br />
    <br />
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a
            class="page-link"
            href="utilitarianism-3.html"
            aria-label="Previous"
          >
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>

        <li class="page-item">
          <a class="page-link" href="utilitarianism.html">Options</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="utilitarianism-2.html">Stakeholders</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="utilitarianism-3.html">Option-1</a>
        </li>
        <li class="page-item active">
          <a class="page-link" href="utilitarianism-4.html">Option-2</a>
        </li>
        <li class="page-item" id="pag-option-3">
          <a class="page-link" href="utilitarianism-3rd-option.html"
            >Option-3</a
          >
        </li>
        <li class="page-item">
          <a class="page-link" href="utilitarianism-5.html">Conclusion</a>
        </li>

        <li class="page-item" id="pag-next-1">
          <a
            class="page-link"
            href="utilitarianism-3rd-option.html"
            aria-label="Next"
          >
            <span aria-hidden="true">&raquo;</span>
            <span class="sr-only">Next</span>
          </a>
        </li>
        <li class="page-item" id="pag-next-2">
          <a class="page-link" href="utilitarianism-5.html" aria-label="Next">
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
  </body>
</html>
