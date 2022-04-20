<?php session_start(); 

if(empty($_SESSION['adminFirstName'])){
    header("Location: Login/login.html");
    die();
  } 
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
    <title>Document</title>
  </head>

  <body>
    <!-- Replace with header without buttons -->
    <div id="header">
      <nav
        class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-body rounded"
      >
        <div class="container-fluid">
          <a class="navbar-brand fs-3 fw-bolder">Ethics Dashboard</a>
          <div class="navbar-nav justify-content-end ">
          <a href="#" class="btn justify-content-end btn-sm" role="button" style="margin-right:10px;"><img src="/EBoard/login-icon.png" height="20"> <?php echo $_SESSION["name"]; ?></a>
          <a href="admin_page.php" class="btn justify-content-end btn-outline-primary btn-sm" role="button" style="margin-right:10px;">Go Back</a>
              <a href="/EBoard/Login/logout.php" id="logoutbtn" class="btn justify-content-end btn-outline-primary btn-sm" role="button">Log out</a>
</div>
        </div>
      </nav>
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
    </body>
</html>

<?php
  $mysqli = mysqli_connect("localhost", "root", "", "herrycoo_Ethic_Dashboard" );

  //For server
  //$mysqli = mysqli_connect("69.172.204.200","herrycoo_yhu","hY592836711@","herrycoo_Ethic_Dashboard");

  $sql = "SELECT s.f_name,s.l_name , s.stuID, s.email ,s.password FROM students s";
  $res = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
  $output =  '<center><table border = "1 px" id = "myTable"><tr><th>First Name</th><th>Last Name</th><th>Student Number</th><th>Email</th><th>Password</th></tr>';
  if (mysqli_num_rows($res) > 0) {
    
    
    while($row = mysqli_fetch_assoc($res)){
        $output .= '<form name = "checkCases" id = "checkCases" action = "/EBoard/Login/authenticate-admin.php" method = "post" ><tr onclick="getValue(this)">
        <td id="1">'.$row["f_name"].'</td>
        <td id="2">'.$row["l_name"].'</td>
        <td id="3">'.$row["stuID"].'</td>
        <td><input type="email" id="email" name = "email" class="form-control form-control-lg col-10 mx-auto" value = "'.$row["email"].'"></td>
        <td><input type="password" id="password" name = "password" class="form-control form-control-lg col-10 mx-auto" value = "'.$row["password"].'"></td>
        <td><button type="submit"  class="login-btn btn btn-dark mx-auto">Check the Case</button></td>
        </tr></form>';
    
      
    }
  }
$output .= '</table></center>'; 
  echo $output;
?>


<style>


table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  
}
th, td {
    padding: 5px;
}
</style>

<script>
 var ta_counter = 0;

  function getValue(x)
{
 ta_counter++;

email =  document.getElementById("myTable").rows[x.rowIndex].cells[3].children[0].value;
password =  document.getElementById("myTable").rows[x.rowIndex].cells[4].children[0].value;

 //window.alert("Email:" + email);
 //window.alert("Password:" + password);

document.getElementById("checkCases").submit();

  localStorage.setItem("email" , email);
   localStorage.setItem("password" , password);
   localStorage.setItem("ta_counter" , ta_counter);


}


  </script>