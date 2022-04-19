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
  
    $txt = "";
  
    if (isset($_POST['agg-submit'])) {
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $txt = filter_input(INPUT_POST, "course-of-action-txt");
      }
      
      $sql = "UPDATE util SET course_of_action_txt= ? WHERE caseID= ?";
      $save_sql = $db_connection->prepare($sql);
      $save_sql->bind_param("si", $txt, $caseID);
      $save_sql->execute();
      
      
      if ($db_connection->query($sql) === TRUE) {
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
      var b,
        c,
        d,
        e,
        f = 0,
        g = 0,
        h = 0,
        i = 0,
        j = 0,
        k = 0,
        l = 0,
        m = 0,
        opt_3_st_slider = 0,
        opt_3_lt_slider = 0,
        opt_3_st_high_radio = 0,
        opt_3_st_low_radio = 0,
        opt_3_lt_high_radio = 0,
        opt_3_lt_low_radio = 0,
        opt_counter = 0;

      $(document).ready(function () {

        admin_counter = localStorage.getItem("admin_counter");
     if(admin_counter < 1)
     {
       //Buttons for the feedback popups
document.getElementById("util-5-fb-btn").innerText = "View the comments";


//save buttons for all the feedbacks
document.getElementById("save-util-5-fb").style.display = "none";

     }

        document.getElementById("agg-st-o1-slider").disabled = true;
        document.getElementById("agg-st-o1-slider").style.background = "grey";
        document.getElementById("short-term-1").style.color = "grey";

        document.getElementById("agg-st-o2-slider").disabled = true;
        document.getElementById("agg-st-o2-slider").style.background = "grey";
        document.getElementById("short-term-2").style.color = "grey";

        document.getElementById("agg-st-o3-slider").disabled = true;
        document.getElementById("agg-st-o3-slider").style.background = "grey";
        document.getElementById("short-term-3").style.color = "grey";

        document.getElementById("agg-lt-o1-slider").disabled = true;
        document.getElementById("agg-lt-o1-slider").style.background = "grey";
        document.getElementById("long-term-1").style.color = "grey";

        document.getElementById("agg-lt-o2-slider").disabled = true;
        document.getElementById("agg-lt-o2-slider").style.background = "grey";
        document.getElementById("long-term-2").style.color = "grey";

        document.getElementById("agg-lt-o3-slider").disabled = true;
        document.getElementById("agg-lt-o3-slider").style.background = "grey";
        document.getElementById("long-term-3").style.color = "grey";

        b = localStorage.getItem("myValue");
        c = localStorage.getItem("myValue2");
        d = localStorage.getItem("myValue3");
        e = localStorage.getItem("myValue4");
        opt_3_st_slider = localStorage.getItem("myValue5");
        opt_3_lt_slider = localStorage.getItem("myValue6");
        f = localStorage.getItem("myValueHighRadioButton-ST-1");
        g = localStorage.getItem("myValueLowRadioButton-ST-1");
        h = localStorage.getItem("myValueHighRadioButton-LT-1");
        i = localStorage.getItem("myValueLowRadioButton-LT-1");
        j = localStorage.getItem("myValueHighRadioButton-ST-2");
        k = localStorage.getItem("myValueLowRadioButton-ST-2");
        l = localStorage.getItem("myValueHighRadioButton-LT-2");
        m = localStorage.getItem("myValueLowRadioButton-LT-2");
        opt_3_st_high_radio = localStorage.getItem(
          "myValueHighRadioButton-ST-3"
        );
        opt_3_st_low_radio = localStorage.getItem("myValueLowRadioButton-ST-3");
        opt_3_lt_high_radio = localStorage.getItem(
          "myValueHighRadioButton-LT-3"
        );
        opt_3_lt_low_radio = localStorage.getItem("myValueLowRadioButton-LT-3");

        opt_counter = localStorage.getItem("options_counter");

        document.getElementById("agg-st-o1-slider").value = b;
        document.getElementById("agg-lt-o1-slider").value = c;
        document.getElementById("agg-st-o2-slider").value = d;
        document.getElementById("agg-lt-o2-slider").value = e;
        document.getElementById("agg-st-o3-slider").value = opt_3_st_slider;
        document.getElementById("agg-lt-o3-slider").value = opt_3_lt_slider;

        document.getElementById("agg-st-o1-slider-txt").value =
          "Higher: " + f + "                             " + "Lower: " + g;

        document.getElementById("agg-lt-o1-slider-txt").value =
          "Higher: " + h + "                             " + "Lower: " + i;

        document.getElementById("agg-st-o2-slider-txt").value =
          "Higher: " + j + "                                " + "Lower: " + k;

        document.getElementById("agg-lt-o2-slider-txt").value =
          "Higher: " + l + "                                " + "Lower: " + m;

        document.getElementById("agg-st-o3-slider-txt").value =
          "Higher: " +
          opt_3_st_high_radio +
          "                                " +
          "Lower: " +
          opt_3_st_low_radio;

        document.getElementById("agg-lt-o3-slider-txt").value =
          "Higher: " +
          opt_3_lt_high_radio +
          "                                " +
          "Lower: " +
          opt_3_lt_low_radio;
        var resetValue = 0;
        localStorage.setItem("myValue", resetValue);
        localStorage.setItem("myValue2", resetValue);
        localStorage.setItem("myValue3", resetValue);
        localStorage.setItem("myValue4", resetValue);
        localStorage.setItem("myValueHighRadioButton-ST-1", resetValue);
        localStorage.setItem("myValueLowRadioButton-ST-1", resetValue);
        localStorage.setItem("myValueHighRadioButton-LT-1", resetValue);
        localStorage.setItem("myValueLowRadioButton-LT-1", resetValue);
        localStorage.setItem("myValueHighRadioButton-ST-2", resetValue);
        localStorage.setItem("myValueLowRadioButton-ST-2", resetValue);
        localStorage.setItem("myValueHighRadioButton-LT-2", resetValue);
        localStorage.setItem("myValueLowRadioButton-LT-2", resetValue);

        if (opt_counter < 3) {
          document.getElementById("option-3").style.display = "none";
          document.getElementById("option-3-st").style.display = "none";
          document.getElementById("option-3-lt").style.display = "none";
          document.getElementById("pag-option-3").style.display = "none";
          document.getElementById("pag-prev-1").style.display = "none";
        } else {
          document.getElementById("pag-prev-2").style.display = "none";
        }

        $(".dropdown").hover(function () {
          var dropdownMenu = $(this).children(".dropdown-menu");
          if (dropdownMenu.is(":visible")) {
            dropdownMenu.parent().toggleClass("open");
          }
        });
      });
    </script>
  </head>
  <body onload="load();">
    <!-- Load Header -->
    <div id="header">
      <script>
        $(function () {
          $("#header").load("header.php");
        });
      </script>
    </div>
    <form action="utilitarianism-5.php" method="POST">
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <div class="row p-2">
              <div class="col-lg">
                <h5 class="pb-2">
                  The last thing to consider is the type of pleasures contributing
                  to the greatest happiness. It isn’t just how many stakeholders
                  experience higher pleasures – you have to judge how much the
                  higher pleasure should be worth in your final analysis.
                </h5>
              </div>
            </div>
          </div>
        </div>
        <br />
        <div class="card">
          <div class="card-body">
            <h4 class="p-2">
              <b><center>OPTION 1</center></b>
            </h4>

            <div class="row p-2">
              <h4 class="p-2">
                <center>Aggregate of Short-term outcomes:</center>
              </h4>
              <div class="col-lg p-2">
                <div class="border">
                  <h6 class="pt-2" id="short-term-1">
                    Pleasure
                    <input
                      type="range"
                      min="1"
                      max="100"
                      value="50"
                      class="slider"
                      id="agg-st-o1-slider"
                      name="agg-st-o1-slider"
                      disabled
                    />
                    Pain
                  </h6>
                </div>
              </div>
              <div class="col-lg p-2">
                <div class="util-3-text">
                  <input
                    type="text"
                    id="agg-st-o1-slider-txt"
                    name="agg-st-o1-slider-txt"
                    class="text-class"
                    placeholder="Higher Lower"
                    disabled
                  />
                </div>
              </div>
            </div>
            <div class="row p-2">
              <h4 class="p-2">
                <center>Aggregate of Long-term outcomes:</center>
              </h4>
              <div class="col-lg p-2">
                <div class="border">
                  <h6 class="pt-2" id="long-term-1">
                    Pleasure
                    <input
                      type="range"
                      min="1"
                      max="100"
                      value="50"
                      class="slider"
                      id="agg-lt-o1-slider"
                      name="agg-lt-o1-slider"
                      disabled
                    />
                    Pain
                  </h6>
                </div>
              </div>
              <div class="col-lg p-2">
                <div class="util-3-text">
                  <input
                    type="text"
                    id="agg-lt-o1-slider-txt"
                    name="agg-lt-o1-slider-txt"
                    class="text-class"
                    placeholder="Higher Lower"
                    disabled
                  />
                </div>
              </div>
            </div>
            <br />
            <h4 class="p-2">
              <b><center>OPTION 2</center></b>
            </h4>

            <div class="row p-2">
              <h4 class="p-2">
                <center>Aggregate of Short-term outcomes:</center>
              </h4>
              <div class="col-lg p-2">
                <div class="border">
                  <h6 class="pt-2" id="short-term-2">
                    Pleasure
                    <input
                      type="range"
                      min="1"
                      max="100"
                      value="50"
                      class="slider"
                      id="agg-st-o2-slider"
                      name="agg-st-o2-slider"
                      disabled
                    />
                    Pain
                  </h6>
                </div>
              </div>
              <div class="col-lg p-2">
                <div class="util-3-text">
                  <input
                    type="text"
                    id="agg-st-o2-slider-txt"
                    name="agg-st-o2-slider-txt"
                    class="text-class"
                    placeholder="Higher Lower"
                    disabled
                  />
                </div>
              </div>
            </div>
            <div class="row p-2">
              <h4 class="p-2">
                <center>Aggregate of Long-term outcomes:</center>
              </h4>
              <div class="col-lg p-2">
                <div class="border">
                  <h6 class="pt-2" id="long-term-2">
                    Pleasure
                    <input
                      type="range"
                      min="1"
                      max="100"
                      value="50"
                      class="slider"
                      id="agg-lt-o2-slider"
                      name="agg-lt-o2-slider"
                      disabled
                    />
                    Pain
                  </h6>
                </div>
              </div>
              <div class="col-lg p-2">
                <div class="util-3-text">
                  <input
                    type="text"
                    id="agg-lt-o2-slider-txt"
                    name="agg-lt-o2-slider-txt"
                    class="text-class"
                    placeholder="Higher Lower"
                    disabled
                  />
                </div>
              </div>
            </div>
            <br />
            <h4 class="p-2" id="option-3">
              <b><center>OPTION 3</center></b>
            </h4>

            <div class="row p-2" id="option-3-st">
              <h4 class="p-2">
                <center>Aggregate of Short-term outcomes:</center>
              </h4>
              <div class="col-lg p-2">
                <div class="border">
                  <h6 class="pt-2" id="short-term-3">
                    Pleasure
                    <input
                      type="range"
                      min="1"
                      max="100"
                      value="50"
                      class="slider"
                      id="agg-st-o3-slider"
                      name="agg-st-o3-slider"
                      disabled
                    />
                    Pain
                  </h6>
                </div>
              </div>
              <div class="col-lg p-2">
                <div class="util-3-text">
                  <input
                    type="text"
                    id="agg-st-o3-slider-txt"
                    name="agg-st-o3-slider-txt"
                    class="text-class"
                    placeholder="Higher Lower"
                    disabled
                  />
                </div>
              </div>
            </div>
            <div class="row p-2" id="option-3-lt">
              <h4 class="p-2">
                <center>Aggregate of Long-term outcomes:</center>
              </h4>
              <div class="col-lg p-2">
                <div class="border">
                  <h6 class="pt-2" id="long-term-3">
                    Pleasure
                    <input
                      type="range"
                      min="1"
                      max="100"
                      value="50"
                      class="slider"
                      id="agg-lt-o3-slider"
                      name="agg-lt-o3-slider"
                      disabled
                    />
                    Pain
                  </h6>
                </div>
              </div>
              <div class="col-lg p-2">
                <div class="util-3-text">
                  <input
                    type="text"
                    id="agg-lt-o3-slider-txt"
                    name="agg-lt-o3-slider-txt"
                    class="text-class"
                    placeholder="Higher Lower"
                    disabled
                  />
                </div>
              </div>
            </div>

            <hr style="color: black; height: 2px" />
            <div class="row p-2">
              <div class="col-lg p-2">
                <center>
                  <h4 class="p-2">
                    ENTER THE CORRECT ETHICAL DECISION / COURSE OF ACTION
                  </h4>
                </center>
              </div>

              <h5 class="p-2">
                <textarea
                  name="course-of-action-txt"
                  id="course-of-action-txt"
                  cols="10"
                  rows="7"
                  placeholder="Although Option 1 produces pleasures in the short-term , they are lower pleasures.

  Option 2 results in less overall pain and higher pleasures to the stakeholders most impacted by the issue.

  Option 2 will produce the greatest happiness and is therefore the right option."
                ></textarea>
              </h5>
              
              <div class="row justify-content-center"> 
                <input
                  type="submit"
                  value="Save"
                  onclick="unhook()"
                  name="agg-submit"
                  id="agg-submit"
                  class="stakeholders-btn"
                />
<!-- Button trigger modal -->
<button
      type="button"
      class="stakeholders-btn"
      data-bs-toggle="modal"
      data-bs-target="#exampleModal"
      id = "util-5-fb-btn"
      name = "util-5-fb-btn"
      style="margin-left:10px; background-color: blue;"
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
            <textarea rows="7" cols="10" id="util-5-fb" name="util-5-fb">
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
            <button type="button" class="btn btn-primary" id="save-util-5-fb">Save changes</button>
          </div>
        </div>
      </div>
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
        <li class="page-item" id="pag-prev-1">
          <a
            class="page-link"
            href="utilitarianism-3rd-option.html"
            aria-label="Previous"
          >
            <span aria-hidden="true">&laquo;</span>
            <span class="sr-only">Previous</span>
          </a>
        </li>
        <li class="page-item" id="pag-prev-2">
          <a
            class="page-link"
            href="utilitarianism-4.html"
            aria-label="Previous"
          >
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
        <li class="page-item">
          <a class="page-link" href="utilitarianism-4.php">Option-2</a>
        </li>
        <li class="page-item" id="pag-option-3">
          <a class="page-link" href="utilitarianism-3rd-option.html"
            >Option-3</a
          >
        </li>
        <li class="page-item active">
          <a class="page-link" href="utilitarianism-5.php">Conclusion</a>
        </li>

        <li class="page-item" id="pag-next-2">
          <a class="page-link" href="#" aria-label="Next">
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
      function load() {
        $.ajax({
          type: "POST",
          url: 'Scripts/get_util5.php',
          data: {
            "caseID": caseID
          },
          dataType: 'json',
          cache: false,
          success: function(data){
            var txt = data[0];
            document.getElementById('course-of-action-txt').innerHTML = txt;
          },
          error: function(xhr, status, error){
          console.error(xhr);
          }
          });
      }
    </script>
  </body>
</html>
