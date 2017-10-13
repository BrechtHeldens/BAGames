<html>

<?php
include '../handelingen/connect.php';
?>

  <head>
    <title>BA Games</title>

    <!--css-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <!--js-->
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/bootstrap.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

  </head>

  <body style="background-color: #537399;">

    <!--Header-->
    <div id="headerback">
      <div id="headerlogo"></div>
      <!--Navbar-->
      <div class="navbar navbar-inverse">

        <div class="container-fluid">

          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>

          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">	<!--Responsive als navbar te breed is-->
            <ul class= "nav navbar-nav"  id="myNavbar">

              <li ><a href="../index.php" id="headerHover">⌂</a></li>

              <li ><a href="../pages/games.php" id="headerHover">GAMES</a></li>

              <?php
              if ($_SESSION['gebruikersid'] != 0) {

              echo '
              <li ><a href="../pages/winkelmenu.php" id="headerHover">SHOP</a></li>';

              }

              if ($_SESSION['gebruikersid'] != 0) {
              ?>

              <li class="dropdown" >
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="headerHover">PROFILE <span class="caret"></span></a>	<!--Pijltje omlaag-->
                <ul class="navbar-inverse dropdown-menu">

                  <li ><a href="../pages/profiel.php" id="headerHover">My profile</a></li>

                  <li ><a href="../pages/friends.php" id="headerHover">Friends</a></li>

                </ul>
              </li>

              <?php
              }

              if ($_SESSION['gebruikersid'] == 0) {

              echo '<li ><a href="../pages/inloggen.php" id="headerHover">LOG IN</a></li>';

            } else {

              echo '<li ><a href="../pages/uitloggen.php" id="headerHover">LOG UIT</a></li>';

            }

            ?>


            </div>
          </div>
        </div>
      </div>

  </body>
</html>
