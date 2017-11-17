<?php
include '../handelingen/connect.php';
session_start();

if (!isset($_SESSION["gebruikersid"])) {
  $_SESSION["gebruikersid"] = 0;
}

?>

<html>

<head>
  <title>BA Games</title>

  <!--css-->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">

  <!--js-->
  <script src="../js/bootstrap.js"></script>
  <script src="../js/jquery-3.2.1.js"></script>

</head>

<body>

  <?php
  include 'header.php';

  //Games

  $sql = "select * from tblspellen where online=1";
  $resultaat = $mysqli->query($sql);

  echo '
  <div class="container-fluid">
    <p id="bagamestitel">Ba Games</p>';

    $teller = 0;
    while ($row = $resultaat->fetch_assoc()) {

      if ($teller % 3 == 0){
        echo '<div class="row">';
      }

      echo '
      <div class="col-xs-4" id="gameframe">

        <center>
          <p id="gametitel">
            <a href='.$row['beginpagina'].'>'.$row['spelnaam'].'</a>
          </p>

          <a href='.$row['beginpagina'].'><img src="../images/'.$row['afbeelding'].'" id="gamefoto"></a>
        </center>

      </div>';


      if ($teller % 3 == 2){
        echo '</div>';
      }

      $teller++;
    }

    if ($teller % 3 != 2){
      echo '</div>';
    }

    if (isset($_SESSION['gebruikerstype'])) {

      if ($_SESSION['gebruikerstype'] == 1) {
        echo '
        <div class="row">
          <br>
          <div class="col-xs-12">
            <center>
              <a href="offline.php"><button>Offline halen</button></a>
            </center>
          </div>';

        }
      }

      print "<center><a href='feedback.php'><button>Klik hier om feedback in te dienen</button></a></center>";

      echo '</div>';

      ?>

  </body>
</html>
