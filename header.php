<?php session_start();
$_SESSION["name"] = $_SESSION["firstName"] . " " . $_SESSION["lastName"];
?>
<nav class="navbar navbar-light navbar-expand-xxl bg-light fixed-top shadow-sm p-3 mb-5 bg-body rounded">
  <div class="container-fluid">


    <a class="navbar-brand fs-3 fw-bolder">Ethics Dashboard</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
          Ethics Dashboard
        </h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="navbar-nav justify-content-end ">

        <a href="home.php" class="btn justify-content-end btn-sm" role="button">Home</a>


        <a href="dashboard.php" class="btn justify-content-end btn-sm" role="button">Dashboard</a>

        <div class="dropdown">
          <a class="btn dropdown-toggle btn-sm" href="utilitarianism.php" role="button" id="dropdownMenuLink" aria-expanded="false">
            Utilitarianism
          </a>

          <ul class="dropdown-menu justify-content-end" aria-labelledby="dropdown-util">
            <li>
              <a class="dropdown-item" href="utilitarianism.php">Options</a>
            </li>
            <li>
              <a class="dropdown-item" href="utilitarianism-2.php">Stakeholder analysis
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="utilitarianism-3.php">Option 1 analysis
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="utilitarianism-4.php">Option 2 analysis
              </a>
            </li>
            <li id="util-3rd-option">
              <a class="dropdown-item" href="utilitarianism-3rd-option.php">Option 3 analysis
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="utilitarianism-5.php">Conclusion
              </a>
            </li>
          </ul>
        </div>


        <a href="#" class="btn justify-content-end btn-sm" role="button">Deontology</a>


        <a href="#" class="btn justify-content-start btn-sm" role="button">Virtue Ethics</a>

        <a href="#" class="btn justify-content-end btn-sm" role="button">Care Ethics</a>

        <a href="progress.php" class="btn justify-content-end btn-sm" role="button">My Progress</a>
        <a href="#" class="btn justify-content-end btn-sm" role="button"><img src="login-icon.png" height="20"> <?php echo $_SESSION["name"]; ?></a>
        <a href="Login/logout.php" id="logoutbtn" class="btn justify-content-end btn-outline-primary btn-sm" role="button">Log out</a>

      </div>
    </div>
  </div>
</nav>
</a>