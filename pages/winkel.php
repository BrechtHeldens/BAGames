<!DOCTYPE html>
<?php
  include "../handelingen/connect.php";
  session_start();
  include 'header.php';
  $spelid = $_GET["spel"];
  $bestaat = "false";

  if($spelid <= 0 || $spelid/$spelid != 1){
    //Fout in URL
    echo "
    <center>
      <h1>Error</h1>
    </center>
    <center>
      <h4>Er is een fout opgetreden, <a href='../index.php'>ga terug naar de homepage</a></h4>
    </center>";
  }
  else
  {

    //Correcte URL - Check of het id bestaat
    $qry = "SELECT * FROM tblspellen WHERE spelid = '".$spelid."';";
    $row = $mysqli->query($qry);
    if($col = $row->fetch_assoc()){
      //Spel is gevonden
      $bestaat = "true";
    } else {
      //Spel is onbekend
      echo "
      <center>
        <h1>Error</h1>
      </center>
      <center>
        <h4>Er is een fout opgetreden, <a href='../index.php'>ga terug naar de homepage</a></h4>
      </center>";
    }
  }
?>

<html>
  <head>
    <title></title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  </head>

  <body>

    <?php

      if($bestaat == "true"){

        $qry = "SELECT * FROM tblspellen WHERE spelid = '".$spelid."';";
        $row = $mysqli->query($qry);
        $col = $row->fetch_assoc();

        echo "
        <center>
          <h1>Winkel - ".$col["spelnaam"]."</h1>
        </center>";

      $aantal = 0;

      $qry = "SELECT * FROM tblbeloningen WHERE spelid = '".$spelid."';";
      $row = $mysqli->query($qry);

      while($col = $row->fetch_assoc()){

        if($aantal % 3 == 0){
          echo "<div class='row'>";
        }

        $aantal++;
        echo "<div class='col col-xs-4'>
        <h3>".$col["prijs"]."</h3>
        <h5>".$col["beloningnaam"]."</h5>
        <a href='../handelingen/transaction.php?beloning=".$col["beloningid"]."'><button class='btn btn-primary pull-right'>Koop nu</button></a>
        </div>";

        if($aantal % 3 == 0){
          echo "</div>";
        }
      }

    }

    ?>

  </body>
</html>
