<?php
  /* -----------------------------------------------------------
    GEEN LAYOUT GEVEN, DEZE PAGINA GAAT DE GEBRUIKER NIET ZIEN
  */

  include 'connect.php';
  session_start();

  $friend = $_GET["vriendid"];

  $formule = "select * from tblfriendlist where gebruikersid = '".$_SESSION['gebruikersid']."' and vriendid = '".$friend."'";
  $voerUit = $mysqli->query($formule);
  $isset = $voerUit->fetch_assoc();

  if ($isset["gebruikersid"] == null) {
    $formule = "insert into tblfriendlist(gebruikersid, vriendid, vriendschapid) values('".$_SESSION['gebruikersid']."', '".$friend."', null)";
    $voerUit = $mysqli->query($formule);
    echo "doesn't ";
  }

  echo "exist";

  header("Location: ../pages/friends.php");
  die;
?>
