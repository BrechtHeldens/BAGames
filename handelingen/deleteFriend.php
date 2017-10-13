<?php
  /* -----------------------------------------------------------
    GEEN LAYOUT GEVEN, DEZE PAGINA GAAT DE GEBRUIKER NIET ZIEN
  */

  include 'connect.php';
  session_start();

  $friend = $_GET["vriendid"];

  $formule = "select * from tblfriendlist where gebruikersid = '".$_SESSION['gebruikersid']."' and vriendid = '".$friend."'";
  $voerUit = $mysqli->query($formule);
  $check = $voerUit->fetch_assoc();

  if ($check["gebruikersid"] == null) {
    $formule = "update tblfriendlist set vrienden = '0' where gebruikersid = '".$friend."' and vriendid = '".$_SESSION['gebruikersid']."'";
    $voerUit = $mysqli->query($formule);
  } else {
    $formule = "update tblfriendlist set vrienden = '0' where gebruikersid = '".$_SESSION['gebruikersid']."' and vriendid = '".$friend."'";
    $voerUit = $mysqli->query($formule);
  }

  header("Location: ../pages/friends.php");
  die;
?>
