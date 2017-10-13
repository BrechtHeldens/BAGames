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
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/bootstrap.js"></script>

  </head>

  <body>

    <?php

    include 'header.php';

    echo "<h1>Leaderboard</h1>";

    $sql = "select * from tblscores where spelid";
    $resultaat = $mysqli->query($sql);

    echo '
    <center>
      <table>
        <tr>
          <th>Gebruikersnaam</th>
          <th>Voornaam</th>
          <th>Naam</th>
          <th>Bio</th>
          <th>Credits</th>
        </tr>';

        while ($row = $resultaat->fetch_assoc()) {

          echo "
          <tr>
            <td>".$row['gebruikersnaam']."</td>
            <td>".$row['voornaam']."</td>
            <td>".$row['naam']."</td>
            <td>".$row['bio']."</td>
            <td>".$row['credits']."</td>

          </tr>";

        }

        echo " </table></center>";

  ?>
