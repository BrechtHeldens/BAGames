<?php
include "../handelingen/connect.php";
session_start();
include "header.php"
?>

<html>
  <head>
    <title>profiel</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
  </head>
  <body>
    <?php
    if ($_SESSION["gebruikersid"] != 0) {

      $sql = "select * from tblgebruikers where gebruikersid = '".$_SESSION['gebruikersid']."'";
      $resultaat = $mysqli->query($sql);
      $row = $resultaat->fetch_assoc();

      echo "<center><h1>Profiel</h1></center>

      <center>
        <table>
          <tr colspan='2' id ='header'>
            <th colspan='2'>Gebruikersnaam</th>
          </tr>

          <tr>
            <td colspan='2'>".$row['gebruikersnaam']."</td>
          </tr>

          <br>

          <tr>
            <th>Voornaam</th>
            <th>Naam</th>
          </tr>

          <tr>
            <td>".$row['voornaam']."</td>
            <td>".$row['naam']."</td>
          </tr>

          <br>

          <tr>
            <th>bio</th>
            <th>credits</th>
            <th>Aanpassen</th>
          </tr>

          <tr>
            <td>".$row['bio']."</td>
            <td>".$row['credits']."</td>
            <td><a href=../pages/profielaanpassen.php?bijwerken=".$row['gebruikersid'].">Bijwerken</a></td>
          </tr>
        </table>
      </center>

      <center><h1>Wins and Losses</h1></center>";


      $sql = "select * from tblscores where gebruikersid = '".$_SESSION['gebruikersid']."'";
      $resultaat = $mysqli->query($sql);
      $row = $resultaat->fetch_assoc();
      $Losses = $row['aantalspellen'] -$row['score'];
      echo "
      <center>
        <table>
          <tr colspan='2' id ='header'>
            <th >Aantal games</th>
            <th>Wins</th>
            <th>Losses</th>
          </tr>

          <tr>
            <td>".$row['aantalspellen']."</td>
            <td>".$row['score']."</td>
            <td>".$Losses."</td>
          </tr>
        </table>
      </center>";
    }
    ?>
  </body>
</html>
