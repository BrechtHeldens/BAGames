<!DOCTYPE html>
<?php include "../handelingen/connect.php"; session_start();include 'header.php';?>
<html>
  <head>
    <title>BAGames - SHOP</title>
    <!-- CSS HIER -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
  </head>

  <body>

    <center><h1>Shop</h1></center>
    <center><p>Welkom in de shop, ...</p></center>

    <center><h4>Kies uw game</h4></center>

    <div class="row">

    <?php

      $row = $mysqli->query("SELECT * FROM tblspellen");

      while($col = $row->fetch_assoc()){

        echo '<div class="col col-sm-2">
        <h5><a href="winkel.php?spel='.$col["spelid"].'">'.$col["spelnaam"].'</a></h5>
        <p>'.$col["beschrijving"].'</p>
        </div>';

      }

    ?>

    </div class="row">

    <p>Ga terug naar <a href="../index.php">de startpagina</a>.</p>

    <?php

      if($_SESSION["gebruikerstype"] == 1){
      echo "<div class='row'><h1><a href='../handelingen/toevoegen.php'>Voeg een beloning toe</a></h1></div>";
    } ?>

  </body>
</html>
