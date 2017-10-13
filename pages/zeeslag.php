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

  //Zeeslag

echo "<h1>Zeeslag</h1>";

echo '<li><a href="maakLobby.php">Maak een lobby</a></li>';
echo '<li><a href="joinLobby.php">join een lobby</a></li>';
echo "<li><a href='alleLobby.php'>Alle lobby's</a></li>";
echo '<li><a href="leaderboard.php">Leaderboard</a></li>';
echo '<li><a href="items.php">Mijn items</a></li>';



?>

</body>
</html>
