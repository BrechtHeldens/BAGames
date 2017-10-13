<?php
  include 'connect.php';
  session_start();

  if (!isset($_GET["gebruikersnaam"])) {
    $_GET["gebruikersnaam"] = "";
  }
  $gebruikersnaam = $_GET["gebruikersnaam"];

?>
<html>
  <head>
  </head>

  <body>

    <?php
      $chatVriend = $_GET["vriendschapid"];

      $formule = "insert into tblchat(vriendschapid, verzenderid, bericht) values ('".$chatVriend."', '".$_SESSION['gebruikersid']."', '".$_POST['bericht']."')";
      $voerUit = $mysqli->query($formule);

      header("Location: ../pages/chat.php?vriendschapid=".$chatVriend);
      die();
    ?>

  </body>
</html>
