<?php
  /* -----------------------------------------------------------
    GEEN LAYOUT GEVEN, DEZE PAGINA GAAT DE GEBRUIKER NIET ZIEN
  */

  include 'connect.php';
  session_start();

  $friend = $_GET["vriendid"];

  $formule = "update tblfriendlist set vrienden = '1' where gebruikersid = '".$_SESSION['gebruikersid']."' and vriendid = '".$friend."'";
  $voerUit = $mysqli->query($formule);

  header("Location: ../pages/friends.php");
  die;
?>
